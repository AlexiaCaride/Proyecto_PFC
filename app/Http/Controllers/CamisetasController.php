<?php

namespace App\Http\Controllers;

use App\Models\Camiseta;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CamisetasController extends Controller
{
    public function ver(){
        //Almaceno todos los productos que sean camisetas odenado por imagen
        $productos =Producto::join("camisetas","camisetas.producto_id", "=", "productos.id")->orderby('productos.imagen')->get();
        return view('camisetas',array('productos' => $productos));
    }
    public function verCamiseta($img){
        //Almaceno los datos de productos y camisetas unidos por el id cuando coincida la imagen
        $camisetas = Producto::join("camisetas","camisetas.producto_id", "=", "productos.id")->where('productos.imagen', '=', $img)->orderby('productos.imagen')->get();
        return view('camiseta',array('camisetas' => $camisetas));
    }
}
