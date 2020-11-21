<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend;

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

Auth::routes();
// Muestra todos los post en forma de tarjeta
Route::get('/', [PageController::class, 'bromas']);
// Cuando el usuario inicia sesión
Route::get('/home', [HomeController::class, 'index'])->name('home');
// CRUD de Autores
Route::resource('/autores', Backend\AutorController::class, ['parameters' => ['autores' => 'autor']])->middleware('auth')->except(['show']);
// CRUD de Categorías
Route::resource('/categorias', Backend\CategoriaController::class)->middleware('auth')->except(['show']);
// CRUD de Bromas
Route::resource('/bromas', Backend\BromaController::class)->middleware('auth')->except(['show']);