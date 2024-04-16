<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{

public  function index(){
    return view('vendeur.dashVendeur');
}
    public function indexAjouterProduit() {
        $categories = Category::all();
        return view('vendeur.ajouterProduit', compact('categories'));
    }



    public function ajouterProduit(Request $request)
    {

        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'categorie' => 'required|exists:categories,id',
            'img' => 'image|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->file('img')) {
            $file = $request->file('img');

            @unlink(public_path('/images/Produit/' . $validatedData['image']));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/images/Produit'), $filename);
            $validatedData['image'] = $filename;
        }


        $product = new Product();
        $product->titre = $validatedData['titre'];
        $product->prix = $validatedData['prix'];
        $product->description = $validatedData['description'];
        $product->image = $validatedData['image'];
        $product->user_id = auth()->user()->id;
        $product->categorie_id = $validatedData['categorie'];
        $product->save();


        return redirect()->back()->with('success', 'Produit ajouté avec succès.');
    }


    public function afficherTousProduits()
    {
        $products = Product::where('user_id', auth()->user()->id)->get();

        return view('vendeur.gestion_produit', compact('products'));
    }

    public function indexUpdate(){
        return view('vendeur.modifierProduit');
    }


    public function modifierProduit(Request $request, $id)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'categorie' => 'required|exists:categories,id',
            'img' => 'image|max:2048', // Vérifie si le fichier est une image
            'description' => 'nullable|string',
        ]);

        // Récupérer le produit à mettre à jour
        $product = Product::findOrFail($id);

        // Mettre à jour les champs du produit
        $product->titre = $validatedData['titre'];
        $product->prix = $validatedData['prix'];
        $product->description = $validatedData['description'];
        $product->categorie_id = $validatedData['categorie'];

        // Gérer la mise à jour de l'image si une nouvelle image est fournie
        if ($request->file('img')) {
            $file = $request->file('img');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/images/Produit'), $filename);
            $product->image = $filename;
        }

        // Enregistrer les modifications du produit
        $product->save();

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Produit mis à jour avec succès.');
    }







}
