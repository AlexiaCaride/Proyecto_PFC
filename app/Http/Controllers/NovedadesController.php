<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Novedad;
use Illuminate\Support\Facades\Auth;

class NovedadesController extends Controller
{
    /**
     * @param array $datos Recupera las novedades en grupos de 3
     * @return view Devuelve la vista 'novedades' con la variable $datos
     */
    public function ver()
    {
        //Recupero las novedades en grupos de 3
        $datos = DB::table('novedades')->orderBy('created_at', 'desc')->paginate(4);
        return view('novedades', ['datos' => $datos]);
    }
    /**
     * @param array $noticia busca la noticia con el mismo id
     * @return view Devuelve la vista 'noticia' con la variable $noticia
     */
    public function noticia($id){
        //Almaceno los datos de la noticia selecinada
        $noticia = Novedad::find($id);
        return view('noticia',array('noticia' => $noticia));
    }
    /**
     * @return view Devuelve la vista 'anadir'
     */
    public function anadir()
    {
        return view('anadir');
    }
    /**
     * @param array $novedades Crea una nueva Novedad
     * @param date $actu Almacena la fecha actual
     * @param array $id_novedad Recupera la última Novedad escrita
     * @param array $novedad Renombra la imgan de la última notica escrita
     * @return view Devuelve la vista 'datosAnadir'
     */
    public function anadido(Request $request){
        $request->validate([
            'titulo' => ['required', 'string', 'max:30'],
            'editor1' => ['required', 'string', 'max:10000'],
        ]);
        //Crea un nuevo novedades
        $novedades = new Novedad;
        //Guarda la fecha, el titulo y el contenido en variables
        $actu= Carbon::now();
        $novedades->titulo= $request->input('titulo');
        $novedades->descripcion= $request->input('editor1');
        $novedades->ruta="";
        $novedades->imagen="";
        $novedades->user_id=auth()->id();
        $novedades->created_at=$actu->toDateTimeString();
        //Guarda el novedades
        $novedades->save();
        //Recupero la ultima novedad escrita, renombro la imagen y actualizo la novedad
        $id_novedades = DB::select('select MAX(id) id from novedades where user_id=?', [Auth::user()->id]);
        rename(public_path('novedades/' . Auth::user()->id . 'novedades' . '.jpeg'), public_path('novedades/' . $id_novedades[0]->id . '_' . Auth::user()->id . '.jpeg'));
        $novedad = Novedad::find($id_novedades[0]->id);
        $novedad->imagen = $id_novedades[0]->id . '_' . Auth::user()->id . '.jpeg';
        $novedad->ruta = 'public/' . $id_novedades[0]->id . '_' . Auth::user()->id . '.jpeg';
        $novedad->save();
        return view('datosAnadir');
    }
    public function upload(Request $request)
    {
        //Mueve la imagen a la ruta
        $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('novedades'), Auth::user()->id . 'novedades' . '.jpeg');

        return response()->json('okey');
    }
}