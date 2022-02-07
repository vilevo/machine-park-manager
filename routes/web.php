<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\EnginController;
use App\Http\Controllers\EnginCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PanneController;
use App\Http\Controllers\HuileController;
use App\Http\Controllers\StatistiqueController;
use Illuminate\Support\Facades\Route;

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

Route::get('/engins-categorires', [EnginCategoryController::class, 'index'])
    ->name('engins_categorires.get');

Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth'])->name('dashboard');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

//users
Route::get('/utilisateurs', [UserController::class, 'index'])
    ->middleware(['auth'])->name('utilisateurs.get');

Route::post('/utilisateurs', [UserController::class, 'create'])
    ->middleware(['auth'])->name('utilisateurs.create');

//engins
Route::get('/engins', [EnginController::class, 'index'])
    ->middleware(['auth'])->name('engins.get');
Route::post('/engins', [EnginController::class, 'create'])
    ->middleware(['auth'])->name('engins.create');
Route::post('/engins/search', [EnginController::class, 'recherche'])
    ->middleware(['auth'])->name('engins.search');

//Pannes
Route::get('/pannes', [PanneController::class, 'index'])
    ->middleware(['auth'])->name('pannes.get');
Route::post('/pannes', [PanneController::class, 'create'])
    ->middleware(['auth'])->name('pannes.create');
Route::get('/pannes/{engin}', [PanneController::class, 'show'])
    ->middleware(['auth'])->name('pannes.show');
Route::get('/pannes/reparer/{panne}', [PanneController::class, 'reparer_panne'])
    ->middleware(['auth'])->name('pannes.reparer');

//Pannes
Route::get('/huiles', [HuileController::class, 'index'])
    ->middleware(['auth'])->name('huiles.get');
Route::post('/huiles', [HuileController::class, 'create'])
    ->middleware(['auth'])->name('huiles.create');

//Statistiques
Route::get('/statistiques', [StatistiqueController::class, 'get'])
    ->middleware(['auth'])->name('statistique.get');


Route::get('/test', function () {
    return view('admin');
})->name('test');

require __DIR__ . '/auth.php';
