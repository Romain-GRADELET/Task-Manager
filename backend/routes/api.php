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
/**
 *--------------------------------------------------------------------------
 * Route permettant d'afficher la liste des taches
 *--------------------------------------------------------------------------
 * Méthode HTTP : GET
 * Chemin : http://localhost:8000/api/categories
 * Controller : TaskController
 * Méthode : findAll()
 * Nom de la route : task-list
 */
Route::get('/categories', [
    TaskController::class,
    'findAll'
])->name('task-list');

/**
 *--------------------------------------------------------------------------
 * Route permettant d'afficher une tache en particulier
 *--------------------------------------------------------------------------
 * Méthode HTTP : GET
 * Chemin : http://localhost:8000/api/task/{id}
 * Controller : TaskController
 * Méthode : show()
 * Nom de la route : task-find
 */
Route::get('/task/{id}', [
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
])->name('task-update');

/**
 *--------------------------------------------------------------------------
 * Route permettant de modifier une tache
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
])->name('task-delete');

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
])->name('categories-find');

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
Route::post('/tasks', [
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
])->name('category-update');

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
])->name('category-delete');


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
Route::get('/tag/list', [
    TagController::class,
    'findAll'
])->name('tags-list');

/**
 *--------------------------------------------------------------------------
 * Route permettant d'afficher un tag précis
 *--------------------------------------------------------------------------
 * Méthode HTTP : GET
 * Chemin : http://localhost:8000/api/tag/{id}
 * Controller : TagController
 * Méthode : find()
 * Nom de la route :
 */
Route::get('/tag/{id}', [
    TagController::class,
    'find'
])->where('id', '[0-9]+');
