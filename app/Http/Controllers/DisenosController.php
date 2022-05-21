<?php

namespace App\Http\Controllers;

use App\Models\Diseno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class DisenosController extends Controller
{
    public function ver()
    {
        //Recupero los diseños
        $disenos = DB::table('disenos')->get();
        return view('disenos', ['disenos' => $disenos]);
    }

    public function personalizar($id)
    {
        //Busco el dinseño que tenga el mismo id
        $diseno=Diseno::find($id);
        //Recupero las capas que pertenezcan al diseño anterior
        $capas= DB::table('capas')->where('diseno_id','=',$id)->get();
        return view('personalizar', ['capas' => $capas],['diseno' => $diseno]);
    }

    public function resultado($id,Request $request)
    {
        //Valido el formulario
        $request->validate([
            'fondo' => ['required', Rule::notIn('fondo')],
            'imagen' => ['required', Rule::notIn('imagen')],
        ]);
        //Recupero los request y los mando como un solo array
        $ruta = $request->input('ruta');
        $fondo = $request->input('fondo');
        $imagen = $request->input('imagen');
        return view('resultado',['ruta'=>$ruta,'fondo'=>$fondo,'imagen'=>$imagen,'id'=>$id]);
    }
}
