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
            'img' => 'image|max:2048', // Vérifie si le fichier est une image
            'description' => 'nullable|string',
        ]);

        if ($request->file('img')) {
            $file = $request->file('img');
            // Supprimer l'ancienne image s'il en existe une
            @unlink(public_path('/images/Produit/' . $validatedData['image']));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/images/Produit'), $filename);
            $validatedData['image'] = $filename;
        }


        $product = new Product();
        $product->titre = $validatedData['titre'];
        $product->prix = $validatedData['prix'];
        $product->description = $validatedData['description'];
        $product->image = $validatedData['image']; // Nom de l'image
        $product->user_id = auth()->user()->id; // Vous pouvez ajuster cela selon votre logique d'authentification
        $product->categorie_id = $validatedData['categorie'];
        $product->save();


        return redirect()->back()->with('success', 'Produit ajouté avec succès.');
    }


    public function afficherTousProduits()
    {
        $products = Product::where('user_id', auth()->user()->id)->get();

        return view('vendeur.gestion_produit', compact('products'));
    }

  




}
