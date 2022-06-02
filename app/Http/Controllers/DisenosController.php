<?php

namespace App\Http\Controllers;

use App\Models\Diseno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
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
        $diseno = Diseno::find($id);
        //Recupero las capas que pertenezcan al diseño anterior
        $capas = DB::table('capas')->where('diseno_id', '=', $id)->get();
        return view('personalizar', ['capas' => $capas], ['diseno' => $diseno]);
    }

    public function resultado($id, Request $request)
    {
        //Recupero los request y los mando como un solo array
        $accesorio = $request->input('accesorio');
        $ojos = $request->input('ojos');
        $pelo = $request->input('pelo');
        $piel = $request->input('piel');
        return redirect()->route('paso2', ['id' => $id, 'accesorio' => $accesorio, 'ojos' => $ojos, 'pelo' => $pelo, 'piel' => $piel]);
    }
    public function datosPaso2($id, Request $request)
    {
        $accesorio = $request->only('accesorio');
        $ojos = $request->only('ojos');
        $pelo = $request->only('pelo');
        $piel = $request->only('piel');
        return view('personalizacion_paso2', ['id' => $id, 'accesorio' => $accesorio, 'ojos' => $ojos, 'pelo' => $pelo, 'piel' => $piel]);
    }
    public function paso2($id, Request $request)
    {
        //Recupero los request y los mando como un solo array
        $accesorio = $request->input('accesorio');
        $ojos = $request->input('ojos');
        $pelo = $request->input('pelo');
        $piel = $request->input('piel');
        $producto = [];
        if ($request->tamano != 'seleccionar') {
            $request->validate([
                'tamano' => ['required', Rule::notIn('seleccionar')],
            ]);
            if ($request->tamano == "A5") {
                $producto = [$request->tamano, 5, 'Lámina'];
            } elseif ($request->tamano == "A4") {
                $producto = [$request->tamano, 10, 'Lámina'];
            } else $producto = [$request->tamano, 15, 'Lámina'];
        } else {
            $request->validate([
                'talla' => ['required', Rule::notIn('seleccionar')],
                'color' => ['required', Rule::notIn('seleccionar')],
            ]);
            $producto = [$request->talla, $request->color, 'Camiseta'];
        }
        return Redirect::route('paso3', ['id' => $id, 'accesorio' => $accesorio, 'ojos' => $ojos, 'pelo' => $pelo, 'piel' => $piel, 'producto' => $producto]);
    }
    public function datosPaso3($id, Request $request)
    {
        $producto = $request->only('producto');
        $accesorio = $request->only('accesorio');
        $ojos = $request->only('ojos');
        $pelo = $request->only('pelo');
        $piel = $request->only('piel');
        return view('personalizacion_paso3', ['id' => $id, 'accesorio' => $accesorio, 'ojos' => $ojos, 'pelo' => $pelo, 'piel' => $piel, 'producto' => $producto]);
    }
}
