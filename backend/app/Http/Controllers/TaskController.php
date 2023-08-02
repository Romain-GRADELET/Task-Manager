<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Task;

class TaskController extends Controller
{
    // Méthode de lecture de toutes les taches
    public function findAll ()
    {
        return Task::all()->load("category", "tags");
        // retourne les éléments aux formats JSON et le détail de la clé étrangère category
    }

    // Méthode de lecture d'une tache précise
    public function find ($id)
    {
        return Task::findOrFail($id)->load('category', "tags");

    }

    // Méthode d'ajout d'une tache
    public function add( Request $request )
    {
        // Grace a l'injection de dépendance on a désormais accès à $request
        // qui contient toutes les infos de la requete HTTP nous ayant conduit dans cette méthode
        // DOC : https://laravel.com/docs/master/requests#retrieving-input
        $title = $request->input( 'title');
        $categoryId = $request->input( 'category_id');

        // On créé une nouvelle instance du Model
        $newTask = new Task();

        // On définit ses propriétés
        // Ici pas de setter sur les modèles Eloquent, les propriétés sont "publiques"
        $newTask->title = $title;
        $newTask->category_id = $categoryId;

        // Je sauvegarde les changements en BDD
        $newTask->saveOrFail();

        // Je retourne la tache fraichement créée (automatiquement convertie en JSON encore une fois)
        //return $newTask;

        // Je peux également préciser à Laravel les détails de la réponse (Bonne pratique)
        // Pratique lorsque je veux indiquer un code retour HTTP spécifique
        //return response()->json($newTask, 201);

        // pour être user Friendly:
        // https://github.com/symfony/symfony/blob/6.3/src/Symfony/Component/HttpFoundation/Response.php
        return response()->json($newTask, response::HTTP_CREATED);
    }

    // Méthode de modification d'une tache
    public function update(Request $request, $id)
    {
        // Récupération du nouveau titre de la tache
        $title = $request->input( 'title' ); // Le 2e argument (valeur par defaut) est optionnel
        $categoryId = $request->input( 'category_id');

        // TODO bonus : Vérifier la validité des données reçues
        // DOC : https://laravel.com/docs/master/validation

        // Je récupère la tache existante à modifier
        $updateTask = Task::findOrFail($id);

        // Je modifie ses propriétés par les valeurs de la requête
        $updateTask->title = $title;
        $updateTask->category_id = $categoryId;

        // Je sauvegarde les changements en BDD
        $updateTask->saveOrFail();

        // Je retourne la tache fraichement modifiée (automatiquement convertie en JSON encore une fois)
        return response()->json($updateTask, response::HTTP_OK);

    }

    // Méthode de  suppression d'une tache
    public function delete($id)
    {
        // On récupère la tache par son id (erreur 404 si ça échoue)
        $deleteTask = Task::findOrFail( $id );

        // On la supprime (erreur 500 si ça échoue)
        $deleteTask->deleteOrFail();

        // On retourne rien du tout MAIS avec un code "204 No Content"
        return response( null, 204 );

    }

}
