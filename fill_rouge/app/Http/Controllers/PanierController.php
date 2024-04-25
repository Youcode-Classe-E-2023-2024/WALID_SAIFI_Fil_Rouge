<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Panier;
use App\Models\Product;

class PanierController extends Controller
{

    public function ajouterProduit(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantite' => 'required|integer|min:1',
        ]);

        $userId = Auth::id();
        $productId = $request->input('product_id');
        $quantite = $request->input('quantite');

        $product = Product::findOrFail($productId);

        if ($quantite > $product->nombre) {
            return redirect()->back()->with('quantite', 'La quantité demandée est supérieure au stock disponible.');
        }

        $prixTotal = $product->prix * $quantite;

        $panier = new Panier();
        $panier->product_id = $productId;
        $panier->user_id = $userId;
        $panier->quantite = $quantite;
        $panier->prix_total = $prixTotal;

        $panier->save();

        return redirect()->back()->with('success', 'Produit ajouté au panier avec succès!');
    }

    public function supprimerProduitPanier($productId)
    {

        $panierItem = Panier::where('product_id', $productId)
            ->where('user_id', auth()->id())
            ->firstOrFail();


        $panierItem->delete();

        return response()->json(['message' => 'Le produit a été supprimé du panier avec succès.'], 200);

    }



    public function acheter()
    {
        $userId = Auth::id();


        $panier = Panier::where('user_id', $userId)->get();


        foreach ($panier as $item) {
            $achat = new Achat();
            $achat->user_id = $userId;
            $achat->product_id = $item->product_id;
            $achat->adresse = 'Votre adresse';
            $achat->num_telephone = 'Votre numéro de téléphone';
            $achat->prix_total = $item->prix_total;
            $achat->save();
        }


        Panier::where('user_id', $userId)->delete();

        return redirect()->route('confirmation')->with('success', 'Achat effectué avec succès!');
    }


    public function IndexvalidationAchat()
    {

        return view('validerAchat');
    }


    public function validerAchat(Request $request)
    {
        $user = Auth::user();

        // Récupérer les données du formulaire
        $email = $request->input('adresse');
        $telephone = $request->input('telephone');

        // Récupérer les éléments du panier de l'utilisateur
        $panierItems = $user->panier()->get();

        // 1. Vider le panier de l'utilisateur connecté
        $user->panier()->delete();

        // 2. Ajouter les informations de l'achat à la table `achats`
        foreach ($panierItems as $item) {
            $achat = new Achat();
            $achat->user_id = $user->id; // Utiliser l'id de l'utilisateur actuel
            $achat->product_id = $item->product_id;
            $achat->adresse = $email;
            $achat->num_telephone = $telephone;
            $achat->prix_total = $item->prix_total;
            $achat->save(); // Utilisation de la méthode save
        }

        // 3. Décrémenter le nombre de produits dans la table `products`
        foreach ($panierItems as $item) {
            $product = Product::find($item->product_id);
            $quantityToDecrement = min($product->nombre, $item->quantite); // Prend le minimum entre la quantité disponible et la quantité demandée
            $product->decrement('nombre', $quantityToDecrement); // Décrémente jusqu'à 0 ou jusqu'à la quantité disponible
        }


        return redirect()->route('index.produit')->with('success', 'Achat validé avec succès.');
    }






}
