<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Contactos;

class ContactoController extends Controller
{
    public function contacto()
    {
        return view('contacto');
    }
    public function depurar(Request $request)
    {
        //Valido el formulario
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'mensaje' => 'required|string|max:500',
        ]);
        //Creo un nuemo mensaje d econtacto
            $mensaje = new Contactos;
            $mensaje->user_id = auth()->id();
            $mensaje->nombre = $request->nombre;
            $mensaje->apellidos = $request->apellidos;
            $mensaje->email = $request->email;
            $mensaje->mensaje = $request->mensaje;
            $mensaje->save();
            
            return view('datosContacto');
    }
}
