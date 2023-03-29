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

//=========================================================
// ROUTE => TASKS
//=========================================================
/**
 * Route permettant d'afficher la liste des taches
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
 * Route permettant d'afficher une tache en particulier
 * Méthode HTTP : GET
 * Chemin : http://localhost:8000/api/task/{id}
 * Controller : TaskController
 * Méthode : show()
 * Nom de la route :
 */
Route::get('/task/{id}', [
    TaskController::class,
    'show'
])->where('id', '[0-9]+');


//=========================================================
// ROUTE => CATEGORIES
//=========================================================
/**
 * Route permettant d'afficher la liste des catégories
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
 * Route permettant d'afficher une catégorie précise
 * Méthode HTTP : GET
 * Chemin : http://localhost:8000/api/category/{id}
 * Controller : CategoryController
 * Méthode : show()
 * Nom de la route :
 */
Route::get('/category/{id}', [
    CategoryController::class,
    'show'
])->where('id', '[0-9]+');


//=========================================================
// ROUTE => TAGS
//=========================================================
/**
 * Route permettant d'afficher la liste des tags
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
 * Route permettant d'afficher un tag précis
 * Méthode HTTP : GET
 * Chemin : http://localhost:8000/api/tag/{id}
 * Controller : TagController
 * Méthode : show()
 * Nom de la route :
 */
Route::get('/tag/{id}', [
    TagController::class,
    'show'
])->where('id', '[0-9]+');
