<?php

namespace App\Http\Controllers;

use App\Models\Perfils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class PerfilController extends Controller
{
    public function ver($id){
        //Recupera el perfil por el id
        $perfil=Perfils::find($id);
        return view('perfil',array('perfil' => $perfil));
    }

    public function crear(Request $request)
    {
        //Valido el formulario
        $request->validate([
            'nombre' => ['required', 'string', 'max:30'],
            'apellidos' => ['required', 'string', 'max:50'],
            'provincia' => ['required', Rule::notIn('provincia')],
            'ciudad' => ['required', 'string', 'max:50'],
            'direccion' => ['required', 'string', 'max:100'],
            'cPostal' => ['required', 'min:11111','max:99999','numeric'],
        ]);
        //Creo el nuevo perfil
        $perfil = new Perfils;
            $id= auth()->id();
            $fecha= Carbon::now();
            $perfil->user_id=$id;
            $perfil->nombre = $request->nombre;
            $perfil->apellidos = $request->apellidos;
            $perfil->provincia = $request->provincia;
            $perfil->ciudad = $request->ciudad;
            $perfil->direccion = $request->direccion;
            $perfil->cPostal = $request->cPostal;
            $perfil->created_at=$fecha->toDateTimeString();
            $perfil->save();
        
        return redirect('home');
    }
    public function editar($id){
        //Busco el perfil por el id
        $perfil=Perfils::find($id);
        return view('editarPerfil',array('perfil' => $perfil));
    }

    public function editado($id,Request $request)
    {
        //Valido el formulario de modificacion de perfil
        $request->validate([
            'nombre' => ['required', 'string', 'max:30'],
            'apellidos' => ['required', 'string', 'max:50'],
            'provincia' => ['required', Rule::notIn('provincia')],
            'ciudad' => ['required', 'string', 'max:50'],
            'direccion' => ['required', 'string', 'max:100'],
            'cPostal' => ['required','min:11111','max:99999','numeric'],
        ]);
        //Busco el erfil por el id y lo actualizo
            $perfil=Perfils::find($id);
            $actu= Carbon::now();
            $perfil->nombre = $request->nombre;
            $perfil->apellidos = $request->apellidos;
            $perfil->provincia = $request->provincia;
            $perfil->ciudad = $request->ciudad;
            $perfil->direccion = $request->direccion;
            $perfil->cPostal = $request->cPostal;
            $perfil->updated_at=$actu->toDateTimeString();
            $perfil->save();
        
        return view('perfilEditado');
    }
}
