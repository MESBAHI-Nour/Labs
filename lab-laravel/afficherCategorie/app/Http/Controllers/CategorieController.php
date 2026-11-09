<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();

        return view('categories', compact('categories'));
    }

    public function ajouterCategorie()
    {
        return view('ajouterCategorie');
    }

    public function storeCategorie(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Categorie::create($validated);

        return redirect()->route('categories')->with('success', 'Catégorie ajoutée avec succès.');
    }

    public function editCategorie($id)
    {
        $categorie = Categorie::findOrFail($id);

        return view('editCategorie', compact('categorie'));
    }

    public function updateCategorie(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $categorie = Categorie::findOrFail($id);
        $categorie->update($validated);

        return redirect()->route('categories')->with('success', 'Catégorie mise à jour avec succès.');
    }

    public function deleteCategorie($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return redirect()->route('categories')->with('success', 'Catégorie supprimée avec succès.');
    }

}