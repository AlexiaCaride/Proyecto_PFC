<?php

namespace App\Http\Controllers;

use App\Models\Camiseta;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CamisetasController extends Controller
{
    /**
     * @var array $productos Almacena todos los productos que tengan el mismo id que las camisetas
     * @return view Devuelve la vista 'camiseta' con la variable $camisetas
     */
    public function ver(){
        //Almaceno todos los productos que sean camisetas odenado por imagen
        $productos =Producto::join("camisetas","camisetas.producto_id", "=", "productos.id")->orderby('productos.imagen')->get();
        return view('camisetas',array('productos' => $productos));
    }
    /**
     * @param mixed $img
     * @var array $camisetas Almacena todas los productos y camisetas que tengan la misma imagen
     * @return view Devuelve la vista 'camiseta' con la variable $camisetas
     */
    public function verCamiseta($img){
        //Almaceno los datos de productos y camisetas unidos por el id cuando coincida la imagen
        $camisetas = Producto::join("camisetas","camisetas.producto_id", "=", "productos.id")->where('productos.imagen', '=', $img)->orderby('productos.imagen')->get();
        return view('camiseta',array('camisetas' => $camisetas));
    }
}
