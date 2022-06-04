<?php

namespace App\Http\Controllers;

use App\Models\Prints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;

class PrintsController extends Controller
{
    /**
     * @var array $productos Almacena todos los productos que tengan el mismo id que las prints
     * @return view Devuelve la vista 'prints' con la variable $prints
     */
    public function ver()
    {
        //Recupero los productos que sean prints ordenados por imagen
        $productos=Producto::join("prints","prints.producto_id", "=", "productos.id")->orderby('productos.imagen')->get();
        return view('prints',array('productos' => $productos));
    }
    /**
     * @param mixed $img
     * @var array $prints Almacena todas los productos y prints que tengan la misma imagen
     * @return view Devuelve la vista 'print' con la variable $prints
     */
    public function verPrint($img)
    {   
        //Almaceno los datos de productos y prints unidos por el id cuando coincida la imagen
        $prints = Producto::join("prints","prints.producto_id", "=", "productos.id")->where('productos.imagen', '=', $img)->orderby('productos.imagen')->get();
        return view('print', array('prints' => $prints));
    }
}
