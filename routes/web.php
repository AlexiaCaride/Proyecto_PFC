<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\CamisetasController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\TazasController;
use App\Http\Controllers\PrintsController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\NovedadesController;
use App\Http\Controllers\DisenosController;
use App\Http\Middleware\LocaleCookieMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CestaController;

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

//Ruta que llama a la cookie del idioma para activar el cambio de idioma de la página
Route::middleware(LocaleCookieMiddleware::class)->group(function(){


//Require del Auth para que funcione
    require __DIR__.'/auth.php';

//RUTAS DEL INDEX
//Ruta que lleva al index de la página
Route::get('/', [TiendaController::class, 'index']);
//Ruta que lleva al index de la página despues de registrarse
Route::get('/home', [TiendaController::class, 'index']);

//Ruta para el multiidioma.
Route::get('/locale/{locale}',function($locale){
    return redirect()->back()->withCookie('locale',$locale);
});

//RUTAS DE LAS SECIONES DE LA TIENDA
Route::get('/tienda',function(){
    return view("tienda");
});
//Ruta que lleva a la seccion camisetas
Route::get('/tienda/camisetas',[CamisetasController::class, 'ver']);
//Ruta que lleva al articulo de la seccion camisetas
Route::get('/tienda/camisetas/{img}',[CamisetasController::class, 'verCamiseta']);
//Ruta que añade al carrito la camiseta
Route::post('/tienda/camisetas/{img}',[CestaController::class, 'anadirCamiseta'])->middleware('auth');
//Ruta que lleva a la seccion prints
Route::get('/tienda/prints',[PrintsController::class, 'ver']);
//Ruta que lleva al articulo de la seccion prints
Route::get('/tienda/prints/{img}',[PrintsController::class, 'verPrint']);
//Ruta que añade  al carrito el print
Route::post('/tienda/prints/{img}',[CestaController::class, 'anadirPrint'])->middleware('auth');

//RUTAS DE NOTICIAS
//Ruta que lleva a las novedades de la tienda
Route::get('/noticias',[NovedadesController::class, 'ver']);
//Ruta que lleva a la noticia selecionada
Route::get('/noticias/{id}',[NovedadesController::class, 'noticia']);

//RUTAS DE ADMINISTRADORES
//Ruta paa escribir el articulo
Route::get('/escribir',[NovedadesController::class, 'anadir'])->middleware('auth')->middleware('admin');
Route::post('/escribir', [NovedadesController::class, 'anadido'])->middleware('auth')->middleware('admin');
//Ruta para subir la foto de la noticia
Route::post('upload',[NovedadesController::class,'upload']);
//Ruta para administrar los usuarios
Route::get('/administrar/usuarios',[AdminController::class, 'borrar'])->middleware('auth')->middleware('admin');
//Ruta para borrar un usuario
Route::get('/administrar/usuarios/{id}', [AdminController::class, 'borrado'])->middleware('auth')->middleware('admin');
//Ruta para administrar productos
Route::get('/administrar/productos',[AdminController::class, 'anadir'])->middleware('auth')->middleware('admin');
//Ruta que añade stock al producto
Route::post('/administrar/productos/{id}', [AdminController::class, 'anadido'])->middleware('auth')->middleware('admin');

//RUTAS DE USUARIOS
//Ruta para ver el perfil del usuario
Route::get('/perfil/{id}',[PerfilController::class, 'ver'])->middleware('auth');
//Ruta que abre el editor de perfil
Route::get('/perfil/editar/{id}',[PerfilController::class, 'editar'])->middleware('auth');
Route::post('/perfil/editar/{id}',[PerfilController::class, 'editado'])->middleware('auth');

//RUTAS DE DISEÑOS
//Ruta con la lista de diseños que se pueden personalizar
Route::get('/crear',[DisenosController::class, 'ver']);
//Ruta del editor de diseños
Route::get('/crear/{id}',[DisenosController::class, 'personalizar'])->middleware('auth');
//Ruta que muestra el resultado de el diseño personalizado
Route::post('/crear/{id}',[DisenosController::class, 'resultado'])->middleware('auth');
//Ruta que añade el diseño al carrito
Route::post('/crear/anadir/{id}',[CestaController::class, 'anadirDiseno'])->middleware('auth');

//RUTAS DE LA CESTA
//Ruta que muestra la cesta
Route::get('/cesta/{id}',[CestaController::class, 'ver'])->middleware('auth');
//Ruta que paga el pedido
Route::post('/cesta/{id}',[CestaController::class, 'pagar'])->middleware('auth');
//Ruta que borra articulos de la cesta
Route::get('/cesta/borrar/{id}',[CestaController::class, 'borrar'])->middleware('auth');

//RUTAS DEL PIE DE PAGINA
//Ruta que abre el cuestionario de contacto
Route::get('/contacto',[ContactoController::class, 'contacto']);
//Ruta que envia el mensaje
Route::post('/contacto',[ContactoController::class, 'depurar']);
//Ruta que abre la vista 'nosotros'
Route::get('/nosotros',function(){
    return view('nosotros');
});

//RUTAS DE REGISTRO
//Ruta que abre el registro de perfil
Route::get('/registro',function(){
    return view('registro');
})->middleware('auth');
//Ruta que envia el formulario
Route::post('/registro',[PerfilController::class, 'crear'])->middleware('auth');
});