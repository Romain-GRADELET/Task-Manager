<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//==========================================================================
// ROUTE => TASKS
//==========================================================================
#region
/**
 *--------------------------------------------------------------------------
 * Route permettant d'afficher la liste des taches
 *--------------------------------------------------------------------------
 * Méthode HTTP : GET
 * Chemin : http://localhost:8000/api/tasks
 * Controller : TaskController
 * Méthode : findAll()
 * Nom de la route : task-list
 */
Route::get('/tasks', [
    TaskController::class,
    'findAll'
])->name('task-list');

/**
 *--------------------------------------------------------------------------
 * Route permettant d'afficher une tache en particulier
 *--------------------------------------------------------------------------
 * Méthode HTTP : GET
 * Chemin : http://localhost:8000/api/tasks/{id}
 * Controller : TaskController
 * Méthode : show()
 * Nom de la route : task-find
 */
Route::get('/tasks/{id}', [
    TaskController::class,
    'find'
])->whereNumber('id')->name('task-find');
//->whereNumber('id'); optionnel
//->where('id', '[0-9]+'); optionnel
//->name (task-find)

/**
 *--------------------------------------------------------------------------
 * Route permettant d'ajouter une tache
 *--------------------------------------------------------------------------
 * Méthode HTTP : POST
 * Chemin : http://localhost:8000/api/tasks
 * Controller : TaskController
 * Méthode : add()
 * Nom de la route : task-add
 */
Route::post('/tasks', [
    TaskController::class,
    'add'
])->name('task-add');

/**
 *--------------------------------------------------------------------------
 * Route permettant de modifier une tache
 *--------------------------------------------------------------------------
 * Méthode HTTP : PUT
 * Chemin : http://localhost:8000/api/tasks/{id}
 * Controller : TaskController
 * Méthode : update()
 * Nom de la route : task-update
 */
Route::put('/tasks/{id}', [
    TaskController::class,
    'update'
])->whereNumber('id')->name('task-update');

/**
 *--------------------------------------------------------------------------
 * Route permettant de supprimer une tache
 *--------------------------------------------------------------------------
 * Méthode HTTP : DELETE
 * Chemin : http://localhost:8000/api/tasks/{id}
 * Controller : TaskController
 * Méthode : delete()
 * Nom de la route : task-delete
 */
Route::delete('/tasks/{id}', [
    TaskController::class,
    'delete'
])->whereNumber('id')->name('task-delete');

#endregion
//==========================================================================
// ROUTE => CATEGORIES
//==========================================================================
/**
 *--------------------------------------------------------------------------
 * Route permettant d'afficher la liste des catégories
 *--------------------------------------------------------------------------
 * Méthode HTTP : GET
 * Chemin : http://localhost:8000/api/categories
 * Controller : CategoryController
 * Méthode : findAll()
 * Nom de la route : categories-list
 */
Route::get('/categories', [
    CategoryController::class,
    'findAll'
])->name('categories-list');

/**
 *--------------------------------------------------------------------------
 * Route permettant d'afficher une catégorie précise
 *--------------------------------------------------------------------------
 * Méthode HTTP : GET
 * Chemin : http://localhost:8000/api/category/{id}
 * Controller : CategoryController
 * Méthode : find()
 * Nom de la route :
 */
Route::get('/categories/{id}', [
    CategoryController::class,
    'find'
])->whereNumber('id')->name('categories-find');

/**
 *--------------------------------------------------------------------------
 * Route permettant d'ajouter une catégorie
 *--------------------------------------------------------------------------
 * Méthode HTTP : POST
 * Chemin : http://localhost:8000/api/catégories
 * Controller : CategoryController
 * Méthode : add()
 * Nom de la route : category-add
 */
Route::post('/categories', [
    CategoryController::class,
    'add'
])->name('category-add');

/**
 *--------------------------------------------------------------------------
 * Route permettant de modifier une catégorie
 *--------------------------------------------------------------------------
 * Méthode HTTP : PUT
 * Chemin : http://localhost:8000/api/categories/{id}
 * Controller : CategoryController
 * Méthode : update()
 * Nom de la route : category-update
 */
Route::put('/categories/{id}', [
    CategoryController::class,
    'update'
])->whereNumber('id')->name('category-update');

/**
 *--------------------------------------------------------------------------
 * Route permettant de modifier une tache
 *--------------------------------------------------------------------------
 * Méthode HTTP : DELETE
 * Chemin : http://localhost:8000/api/categories/{id}
 * Controller : CategoryController
 * Méthode : delete()
 * Nom de la route : category-delete
 */
Route::delete('/categories/{id}', [
    CategoryController::class,
    'delete'
])->whereNumber('id')->name('category-delete');


//==========================================================================
// ROUTE => TAGS
//==========================================================================
/**
 *--------------------------------------------------------------------------
 * Route permettant d'afficher la liste des tags
 *--------------------------------------------------------------------------
 * Méthode HTTP : GET
 * Chemin : http://localhost:8000/api/tags
 * Controller : TagController
 * Méthode : findAll()
 * Nom de la route : tags-list
 */
Route::get('/tags', [
    TagController::class,
    'findAll'
])->name('tags-list');

/**
 *--------------------------------------------------------------------------
 * Route permettant d'afficher un tag précis
 *--------------------------------------------------------------------------
 * Méthode HTTP : GET
 * Chemin : http://localhost:8000/api/tags/{id}
 * Controller : TagController
 * Méthode : find()
 * Nom de la route : tag-find
 */
Route::get('/tags/{id}', [
    TagController::class,
    'find'
])->whereNumber('id')->name('tag-find');

/**
 *--------------------------------------------------------------------------
 * Route permettant de créer un tag
 *--------------------------------------------------------------------------
 * Méthode HTTP : POST
 * Chemin : http://localhost:8000/api/tags/
 * Controller : TagController
 * Méthode : add()
 * Nom de la route : tag-add
 */
Route::post('/tags', [
    TagController::class,
    'add'
])->name('tag-add');

/**
 *--------------------------------------------------------------------------
 * Route permettant de modifier un tag précis
 *--------------------------------------------------------------------------
 * Méthode HTTP : PUT
 * Chemin : http://localhost:8000/api/tags/{id}
 * Controller : TagController
 * Méthode : update()
 * Nom de la route :
 */
Route::put('/tags/{id}',[
    TagController::class,
    'update'
])->whereNumber('id')->name('tag-update');

/**
 *--------------------------------------------------------------------------
 * Route permettant de supprimer un tag précis
 *--------------------------------------------------------------------------
 * Méthode HTTP : DELETE
 * Chemin : http://localhost:8000/api/tags/{id}
 * Controller : TagController
 * Méthode : delete()
 * Nom de la route :
 */
Route::delete('/tags/{id}', [
    TagController::class,
    'delete'
])->whereNumber('id')->name('tag-delete');
