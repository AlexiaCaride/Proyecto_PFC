<?php

namespace App\Http\Controllers;

use App\Models\Contactos;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function borrar(){
        //Funcion que almacena los usuarios y los divide en grupos de 10
        $usuarios=DB::table('users')->paginate(10);
        return view('adminUsuarios',['usuarios' => $usuarios]);
    }
    public function borrado($id){
        //Busca el usuario por el id
        $usuario = User::find($id);
        //Borra el usuario
        $usuario->delete();
        return view('borrado');
    }
    public function anadir(){
        //Funcion que almacena los pedidos y los divide ne grupos de 10
        $productos=DB::table('productos')->paginate(10);
        return view('anadirStock',['productos' => $productos]);
    }
    public function anadido($id, Request $request){
        //Busca el producto por el id
        $producto = Producto::find($id);
        //Almacena el stock de ese producto cuando coincide el id
        $stock =DB::table('productos')->select('stock')->where('id','=',$id)->get();
        //recupera la cantidad a añadir al stock
        $anadir=$request->input('anadir');
        //Suma el stock de producto y el valor a añadir
        $stockTotal=$anadir+$stock[0]->stock;
        //Guarda la fecha, el titulo y el contenido en variables
        $actu= Carbon::now();
        //Asigna el stock nuevo con la variable stockTotal
        $producto->stock=$stockTotal;
        $producto->updated_at=$actu->toDateTimeString();
        //Guarda la informacion
        $producto->save();
        return view('anadidoStock');
    }
    public function mensajes(){
        //Funcion que almacena los usuarios y los divide en grupos de 10
        $mensajes=DB::table('contactos')->paginate(10);
        return view('adminMensajes',['mensajes' => $mensajes]);
    }
    public function respondido($id){
        //Busca el usuario por el id
        $mensaje = Contactos::find($id);
        //Borra el usuario
        $mensaje->delete();
        return view('respondido');
    }
}
