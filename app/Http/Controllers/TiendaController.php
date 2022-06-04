<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class TiendaController extends Controller
{
    /**
     * @param array $camisetas Recupera todos los productos que sean camisetas
     * @param array $prints Recupera todos los productos que sean láminas
     * @return view Devuelve la vista 'index' con las variabls $cammisetas y $prints
     */
    public function index()
    {
        //Recupero los productos que coincidan con camisetas y con láminas
        $camisetas = Producto::join("camisetas", "camisetas.producto_id", "=", "productos.id")->orderby('productos.imagen')->get();
        $prints = Producto::join("prints", "prints.producto_id", "=", "productos.id")->orderby('productos.imagen')->get();
        //Si esta autenticado lleva a una ruta y si no a otra
        if (Auth::check()) {
            return view('index', array('camisetas' => $camisetas), array('prints' => $prints));
        } else return view('index', array('camisetas' => $camisetas), array('prints' => $prints));
    }
}
