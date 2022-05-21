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
            'asunto' => 'required|string|max:100',
            'mensaje' => 'required|string|max:500',
        ]);
        //Creo un nuemo mensaje d econtacto
            $mensaje = new Contactos;
            $mensaje->user_id = auth()->id();
            $mensaje->asunto = $request->asunto;
            $mensaje->mensaje = $request->mensaje;
            $mensaje->save();
            
            return view('datosContacto');
    }
}
