<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiendaController;

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
//Ruta que lleva al index de la página
Route::get('/', [TiendaController::class, 'index']);
//Ruta que lleva al index de la página despues de registrarse
Route::get('/home', [TiendaController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Ruta que lleva a la seccion
Route::get('/tienda/camisetas');
//Ruta que lleva al articulo de la seccion
Route::get('/tienda/camisetas/{id}');

//Ruta que lleva a la seccion
Route::get('/tienda/tazas');
//Ruta que lleva al artiuclo de la seccion
Route::get('/tienda/tazas/{id}');

//Ruta que lleva a la seccion
Route::get('/tienda/prints');
//Ruta que lleva al articulo de la seccion
Route::get('/tienda/prints/{id}');

//Ruta que lleva a las novedades de la tienda
Route::get('/novedades');
//Ruta dentro del articulo de la novedad
Route::get('/novedades/{id}');
//Ruta paa escribir el articulo
Route::get('/novedades/escribir')->middleware('auth');

//Ruta para el perfil del usuario
Route::get('/perfil')->middleware('auth');
//Ruta con la lista de diseños que se pueden personalizar
Route::get('/crear');
//Ruta del editor de diseños
Route::get('/crear/{id}')->middleware('auth');
//Ruta con la cesta
Route::get('/cesta')->middleware('auth');

//Ruta de contacto
Route::get('/contacto')->middleware('auth');