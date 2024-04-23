<?php

namespace App\Http\Controllers;

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
        // Recherchez l'élément du panier associé au produit à supprimer
        $panierItem = Panier::where('product_id', $productId)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        // Supprimez l'élément du panier
        $panierItem->delete();

        // Redirigez l'utilisateur avec un message de succès
        return redirect()->back()->with('success', 'Le produit a été supprimé du panier avec succès.');
    }

}
