<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tag;

class TagController extends Controller
{
    // Méthode permettant de lister l'ensemble des tags
    public function findAll()
    {
        return Tag::all();
    }

    // Méthode permettant de sélectionner un tag précis
    public function find($id)
    {
        return Tag::findOrFail($id);
    }

    // Méthode permettant d'ajouter un nouveau Tag
    public function add(Request $request)
    {
        $label = $request->input('label');

        $newTag = new Tag();

        $newTag->label = $label;

        $newTag->saveOrFail();

        return $newTag;
    }

    // Méthode permettant de modifier un Tag précis
    public function update(Request $request, $id)
    {
        $label = $request->input('label');

        $updateTag = Tag::findOrFail($id);

        $updateTag->label = $label;

        $updateTag->saveOrFail();

        return $updateTag;
    }

    // Méthode permettant de supprimer un Tag précis
    public function delete($id)
    {
        $deleteTag = Tag::findOrFail($id);

        $deleteTag->deleteOrFail();

        return response( null, 204 );
    }
}
