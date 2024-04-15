<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ajouterProduit(Request $request)
    {
        // Validation des données
        $request->validate([
            'titre' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'categorie' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation des images (optionnel)
            'description' => 'nullable|string', // La description est facultative
        ]);

        $produit = new Product();
        $produit->titre = $request->titre;
        $produit->prix = $request->prix;
        $produit->categorie_id = $request->categorie;
        $produit->description = $request->description;
        $produit->save();

        // Gestion des images (s'il y en a)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('chemin/vers/dossier'); // Spécifiez le chemin où vous souhaitez enregistrer l'image
                $produit->images()->create(['chemin' => $path]);
            }
        }

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Produit ajouté avec succès');
    }


}
