<?php

namespace App\Http\Controllers;

use App\Models\Diseno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class DisenosController extends Controller
{
    /**
     * @var array $disenos Recupera los diseños de la base de datos
     * @return view Devuelve la vista 'disenos' con la variable $disenos
     */
    public function ver()
    {
        //Recupero los diseños
        $disenos = DB::table('disenos')->get();
        return view('disenos', ['disenos' => $disenos]);
    }
    /**
     * @param mixed $id
     * @var array $diseno Recupera el diseno que tenga el mismo id
     * @var array $capas Recupera las capas del diseño
     * @return view Devuelve la vista 'personalizar' con las variables $diseno y $capa
     */
    public function personalizar($id)
    {
        //Busco el diseño que tenga el mismo id
        $diseno = Diseno::find($id);
        //Recupero las capas que pertenezcan al diseño anterior
        $capas = DB::table('capas')->where('diseno_id', '=', $id)->get();
        return view('personalizar', ['capas' => $capas], ['diseno' => $diseno]);
    }
    /**
     * @param mixed $id
     * @param Request $request
     * @var string $accesorio recupera el request del input
     * @var string $ojos recupera el request del input
     * @var string $pelo recupera el request del input
     * @var string $piel recupera el request del input
     * @return redirect Redirige a Paso2 con las variables $id, $accesorio, $ojos, $pelo y $piel a modo de array
     */
    public function resultado($id, Request $request)
    {
        //Recupero los request y los mando como un solo array
        $accesorio = $request->input('accesorio');
        $ojos = $request->input('ojos');
        $pelo = $request->input('pelo');
        $piel = $request->input('piel');
        return redirect()->route('paso2', ['id' => $id, 'accesorio' => $accesorio, 'ojos' => $ojos, 'pelo' => $pelo, 'piel' => $piel]);
    }
    /**
     * @param mixed $id
     * @param Request $request
     * @var string $accesorio recupera el requets del array
     * @var string $ojos recupera el request del array
     * @var string $pelo recupera el request del array
     * @var string $piel recupera el request del array
     * @return view Devuelve la vista 'personalizacion_paso2' con las variables $id, $accesorio, $ojos, $pelo y $piel
     */
    public function datosPaso2($id, Request $request)
    {
        $accesorio = $request->only('accesorio');
        $ojos = $request->only('ojos');
        $pelo = $request->only('pelo');
        $piel = $request->only('piel');
        return view('personalizacion_paso2', ['id' => $id, 'accesorio' => $accesorio, 'ojos' => $ojos, 'pelo' => $pelo, 'piel' => $piel]);
    }
    /**
     * @param mixed $id
     * @param Request $request
     * @var string $accesorio recupera el requets del input
     * @var string $ojos recupera el request del input
     * @var string $pelo recupera el request del input
     * @var string $piel recupera el request del input
     * @var array $producto Alamcena la información del formulario con el request
     * @return redirect redirige la ruta Paso3 con las variables $id, $accesorio, $ojos, $pelo, $piel y $producto
     */
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
    /**
     * @param mixed $id
     * @param Request $request
     * @var string $accesorio recupera el requets del array
     * @var string $ojos recupera el request del array
     * @var string $pelo recupera el request del array
     * @var string $piel recupera el request del array
     * @var array $producto recupera el request del array
     * @return view Devuelve la vista 'personalizacion_paso3' con las variables $id, $accesorio, $ojos, $pelo, $piel y producto
     */
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
