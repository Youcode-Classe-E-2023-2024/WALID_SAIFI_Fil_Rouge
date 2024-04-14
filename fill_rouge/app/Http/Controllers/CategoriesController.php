<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('Admin.Gestion_categories', compact('categories'));
    }
    public function store(Request $request)
    {
        // Validation des données de la requête
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        // Création de la catégorie
        $category = Category::create([
            'name' => $request->name,
        ]);

        // Redirection avec un message de succès
        return redirect()->route('categories.index')->with('success', 'La catégorie a été ajoutée avec succès.');
    }
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'La catégorie a été supprimée avec succès.');
    }

}
