<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Méthode de lecture de toutes les catégories
    public function findAll()
    {
        return Category::all();
    }

    // Méthode de lecture d'une catégorie précise
    public function find($id)
    {
        return Category::findOrFail($id);
    }

    // Méthode d'ajout d'une catégorie
    public function add(Request $request)
    {
        // Grace a l'injection de dépendance on a désormais accès à $request
        // qui contient toutes les infos de la requete HTTP nous ayant conduit dans cette méthode
        $name = $request->input('name');

        // On créé une nouvelle instance du Model
        $newCategory = new Category();

        // On définit ses propriétés
        // Ici pas de setter sur les modèles Eloquent, les propriétés sont "publiques"
        $newCategory->name = $name;

        // Je sauvegarde les changements en BDD
        $newCategory->save();

        // Je retourne la tache fraichement créée (automatiquement convertie en JSON encore une fois)
        return $newCategory;
    }

    // Méthode de modification d'une catégorie
    public function update(Request $request, $id)
    {
        $name = $request->input('name');

        $updateCategory = Category::find($id);

        $updateCategory->name = $name;

        $updateCategory->save();

        return $updateCategory;

    }

    // Méthode pour la suppression d'une catégorie
    public function delete(Request $request, $id)
    {
        $deleteCategory = Category::find($id);

        $deleteCategory->delete();

        return $deleteCategory;
    }

}
