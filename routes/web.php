<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//users
Route::get('/utilisateurs', [UserController::class, 'get'])
    ->middleware(['auth'])->name('utilisateurs.get');

Route::post('/utilisateurs', [UserController::class, 'create'])
    ->middleware(['auth'])->name('utilisateurs.create');

Route::get('/test', function () {
    return view('admin');
})->name('test');

require __DIR__ . '/auth.php';
