<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function indexAjouterProduit() {
        $categories = Category::all();
        dd($categories);
        return view('ajouterProduit', compact('categories'));
    }


    public function ajouterProduit(Request $request)
    {
        // Validation des données
        $request->validate([
            'titre' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'categorie' => 'required|integer',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string', // La description est facultative
        ]);

        $produit = new Product();
        $produit->titre = $request->titre;
        $produit->prix = $request->prix;
        $produit->categorie_id = $request->id_categorie;
        $produit->description = $request->description;


        // Gérer le téléchargement de l'image si une nouvelle image est fournie
        if ($request->file('img')) {
            $file = $request->file('img');
            @unlink(public_path('/images/Produit' .  $produit ->image)); // delete previous photo
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/images/Produit'), $filename);
            $user['image'] = $filename;
        }
        $produit->save();
        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Produit ajouté avec succès');
    }


}
