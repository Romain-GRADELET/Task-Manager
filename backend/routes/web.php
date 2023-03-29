<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route de la page d'accueil
// Méthode HTTP : GET
// Chemin : http://localhost:8000/
// Controller : MonController
// Méthode : ma_methode()

// Route::get( '/', [
//     MonController::class, // FQCN du contrôleur à instancier
//     'ma_methode'          // Nom de la méthode ce contrôleur à executer
//   ] )->name('nom-de-la-route');;


/**
 * Route permettant d'afficher la liste des taches
 * Méthode HTTP : GET
 * Chemin : http://localhost:8000/api/tasks
 * Controller : TaskController
 * Méthode : findAll()
 * Nom de la route : task-list
 */
// Route::get('/api/tasks', [
//     TaskController::class,
//     'findAll'
// ])->name('task-list');



/**
 * Route permettant d'afficher la liste des taches
 * Méthode HTTP : GET
 * Chemin : http://localhost:8000/api/task/{id}
 * Controller : TaskController
 * Méthode : fnd()
 * Nom de la route : task-list
 */
// Route::get('/api/tasks', [
//     TaskController::class,
//     'find'
// ])->name('task-show');


//  Route::get('/', function () {
//      return view('welcome');
//  });
