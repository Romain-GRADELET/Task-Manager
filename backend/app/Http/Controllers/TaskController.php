<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // Méthode de lecture de toutes les taches
    public function findAll ()
    {
        return Task::all();
    }

    // Méthode de lecture d'une tache précise
    public function find ($id)
    {
        return Task::findOrFail($id);
    }

    // Méthode d'ajout d'une tache
    public function add( Request $request )
    {
        // Grace a l'injection de dépendance on a désormais accès à $request
        // qui contient toutes les infos de la requete HTTP nous ayant conduit dans cette méthode
        // DOC : https://laravel.com/docs/master/requests#retrieving-input
      $title = $request->input( 'title' );

      // On créé une nouvelle instance du Model
      $newTask = new Task();

      // On définit ses propriétés
      // Ici pas de setter sur les modèles Eloquent, les propriétés sont "publiques"
      $newTask->title = $title;

      // Je sauvegarde les changements en BDD
      $newTask->save();

      // Je retourne la tache fraichement créée (automatiquement convertie en JSON encore une fois)
      return $newTask;
    }

    // Méthode de modification d'une tache
    public function update(Request $request, $id)
    {
        $title = $request->input( 'title' );

        $updateTask = Task::find($id);

        $updateTask->title = $title;

        // Je sauvegarde les changements en BDD
        $updateTask->save();

        // Je retourne la tache fraichement créée (automatiquement convertie en JSON encore une fois)
        return $updateTask;

    }

    // Méthode de  suppression d'une tache
    public function delete(Request $request, $id)
    {
        $title = $request->input( 'title' );

        $deleteTask = Task::find($id);

        $deleteTask->title = $title;

        // Je sauvegarde les changements en BDD
        $deleteTask->delete();

        // Je retourne la tache fraichement créée (automatiquement convertie en JSON encore une fois)
        return $deleteTask;

    }

}
