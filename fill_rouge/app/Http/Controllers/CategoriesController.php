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


        $category = Category::create([
            'name' => $request->name,
        ]);


        return redirect()->route('categories.index')->with('success', 'La catégorie a été ajoutée avec succès.');
    }
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'La catégorie a été supprimée avec succès.');
    }

    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('Admin.update_categories', compact('category', 'categories'));
    }




    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->name,

        ]);
        return redirect()->route('categories.index')->with('success', 'La catégorie a été mise à jour avec succès.');
    }
}
