<?php

namespace App\Http\Controllers;

use App\Models\Prints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;

class PrintsController extends Controller
{
    public function ver()
    {
        //Recupero los productos que sean prints ordenados por imagen
        $productos=Producto::join("prints","prints.producto_id", "=", "productos.id")->orderby('productos.imagen')->get();
        return view('prints',array('productos' => $productos));
    }
    public function verPrint($img)
    {   
        //Almaceno los datos de productos y prints unidos por el id cuando coincida la imagen
        $prints = Producto::join("prints","prints.producto_id", "=", "productos.id")->where('productos.imagen', '=', $img)->orderby('productos.imagen')->get();
        return view('print', array('prints' => $prints));
    }
}
