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

        $request->validate([
            'titre' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'categorie' => 'required|integer',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $produit = new Product();
        $produit->titre = $request->titre;
        $produit->prix = $request->prix;
        $produit->id_categorie = $request->id_categorie;
        $produit->description = $request->description;



        if ($request->file('img')) {
            $file = $request->file('img');
            @unlink(public_path('/images/Produit' .  $produit ->image)); // delete previous photo
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/images/Produit'), $filename);
            $user['image'] = $filename;
        }
        $produit->save();

        return redirect()->back()->with('success', 'Produit ajouté avec succès');
    }

    public  function  indexGestion(){
      return view('vendeur.gestion_produit');
    }


}
