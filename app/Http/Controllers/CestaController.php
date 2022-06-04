<?php

namespace App\Http\Controllers;

use App\Models\Diseno;
use App\Models\Pedido;
use App\Models\Personalizados;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CestaController extends Controller
{
    /**
     * @param mixed $img
     * @param Request $request
     * @var string $color Almacena el request del select de color
     * @var string $talla Almacena el request del select de talla
     * @var array $imagen Almacena el id de todos los productos que coincidan con la imagen
     * @var string $error Almacena el mensaje de error
     * @var array $producto Almacena todos os productos que tienen el mismo color y talla que el nombre de la imagen
     * @var array $stock Almacena el stock del producto que coincida con talla, color, imagen e id
     * @var array $compruebaCesta Almacena el prodcuto en la cesta del usuario
     * @var int $cantidad Almacena la cantidad de productos pedidos
     * @return back Devuelve a la página interior, a puede devlver con error
     */
    public function anadirCamiseta($img, Request $request)
    {
        //valido los datos del formulario
        $request->validate([
            'color' => ['required', Rule::notIn('seleccionar')],
            'talla' => ['required', Rule::notIn('seleccionar')],
        ]);
        //Las almaceno en variables
        $color = $request->input('color');
        $talla = $request->input('talla');
        //Selecciono todos los id que coincida la imagen
        $imagen = DB::select("select id from productos where imagen = ?", [$img]);
        //Creo una variable que me almacene los errores
        $error = "";
        //Recorro la coleccion de imagen
        foreach ($imagen as $id) {
            //Almaceno todos los productos en los que el color, talla coincidan
            $producto = DB::select("select producto_id from camisetas where color = ? AND talla = ? AND producto_id =? ", [$color, $talla, $id->id]);
            //Almaceno el stock cuando el color, talla e id coincidan
            $stock = Producto::join("camisetas", "camisetas.producto_id", "=", "productos.id")->select('stock')->where('camisetas.color', $color)->where('camisetas.talla', $talla)->where('camisetas.producto_id', $id->id)->get();
            //Entra en el bucle si producto no está vacio, si no, almacena un error
            if (!empty($producto[0]->producto_id)) {
                //Almaceno los datos de la cesta que coincidan con el id de usuario y el id de producto
                $compruebaCesta = DB::select("select user_id, producto_id, cantidad from cesta where user_id = ? AND producto_id = ?", [auth()->id(), $producto[0]->producto_id]);
                if ($compruebaCesta) {
                    //Si es true almacena la cantidad mas 1
                    $cantidad = $compruebaCesta[0]->cantidad + 1;
                    //Si el stock es mayor que 0 inserta en la cesta el nuevo producto
                    if ($cantidad <= $stock[0]->stock) {
                        DB::update("update cesta set cantidad= ? where user_id = ? AND producto_id = ?", [$cantidad, auth()->id(), $producto[0]->producto_id]);
                    } else $error = "No hay suficiente stock";
                //Si el stock es mayor que 0 inserta en la cesta el nuevo producto
                } elseif ($stock[0]->stock > 0) {
                    DB::insert('insert into cesta (user_id, producto_id, cantidad) values (?, ?, 1)', [auth()->id(), $producto[0]->producto_id]);
                } else $error = "No hay suficiente stock";
            }
        }
        //Si el error está vacio vuelve a la página anterior, si no al volver manda el mensaje de error
        if ($error == "") {
            return back();
        } else return back()->with('error', $error);
    }
    /**
     * @param mixed $img
     * @param Request $request
     * @var string $tamano Almacena el requets del select de tamano
     * @var array $imagen Almacena el id de todos los productos que coincidan con la imagen
     * @var string $error Almacena el mensaje de error
     * @var array $producto Almacena todos os productos que tienen el mismo color y talla que el nombre de la imagen
     * @var array $stock Almacena el stock del producto que coincida con el tamaño, imagen e id
     * @var array $compruebaCesta Almacena el prodcuto en la cesta del usuario
     * @var int $cantidad Almacena la cantidad de productos pedidos
     * @return back Devuelve a la página interior, la puede devlver con error
     */
    public function anadirPrint($img, Request $request)
    {
        //valido los datos del formulario
        $request->validate([
            'tamano' => ['required', Rule::notIn('seleccionar')],
        ]);
        //Las almaceno en variables
        $tamano = $request->input('tamano');
        //Selecciono todos los id que coincida la imagen y el id de producto
        $imagen = DB::select("select id from productos where imagen = ?", [$img]);
        //Creo una variable que me almacene los errores
        $error = "";
        //Recorro la coleccion de imagen
        foreach ($imagen as $id) {
            //Almaceno todos los productos en los que el tamaño e id coincidan
            $producto = DB::select("select producto_id from prints where tamano = ? AND producto_id = ?", [$tamano, $id->id]);
            //Almaceno el stock en los que el tamaño e id coincidan
            $stock = Producto::join("prints", "prints.producto_id", "=", "productos.id")->select('stock')->where('prints.tamano', $tamano)->where('prints.producto_id', $id->id)->get();
            if (!empty($producto[0]->producto_id)) {
                //Almaceno los datos de la cesta que coincidan con el id de usuario y el id de producto
                $compruebaCesta = DB::select("select user_id, producto_id, cantidad from cesta where user_id = ? AND producto_id = ?", [auth()->id(), $producto[0]->producto_id]);
                if ($compruebaCesta) {
                    //Si es true almacena la cantidad mas 1
                    $cantidad = $compruebaCesta[0]->cantidad + 1;
                    //Si el stock es mayor que 0 inserta en la cesta el nuevo producto
                    if ($cantidad <= $stock[0]->stock) {
                        DB::update("update cesta set cantidad= ? where user_id = ? AND producto_id = ?", [$cantidad, auth()->id(), $producto[0]->producto_id]);
                    } else $error = "No hay suficiente stock";
                //Si el stock es mayor que 0 inserta en la cesta el nuevo producto
                } elseif ($stock[0]->stock > 0) {
                    DB::insert('insert into cesta (user_id, producto_id, cantidad) values (?, ?, 1)', [auth()->id(), $producto[0]->producto_id]);
                } else $error = "No hay suficiente stock";
            }
        }
        //Si el error está vacio vuelve a la página anterior, si no al volver manda el mensaje de error
        if ($error == "") {
            return back();
        } else return back()->with('error', $error);
    }
    /**
     * @param mixed $id
     * @param Request $requets
     * @var array $accesorio Almacena el valor del requets del input 'accesorio'
     * @var array $arrayAccesorio Almacena e valor de $accesorio dividido en dos arrays
     * @var array $ojos Almacena el valor del requets del input 'ojos'
     * @var array $arrayOjos Almacena e valor de $ojos dividido en dos arrays
     * @var array $pelo Almacena el valor del requets del input 'pelo'
     * @var array $arrayPelo Almacena e valor de $pelo dividido en dos arrays
     * @var array $piel Almacena el valor del requets del input 'piel'
     * @var array $arrayPiel Almacena e valor de $piel dividido en dos arrays
     * @var array $capaAccesorio Almacena el id de la capa que coincida con $arrayAccesorio[0] y $arrayAccesorio[1]
     * @var array $capaOjos Almacena el id de la capa que coincida con $arrayOjos[0] y $arrayOjos[1]
     * @var array $capaPelo Almacena el id de la capa que coincida con $arrayPelo[0] y $arrayPelo[1]
     * @var array $capaPiel Almacena el id de la capa que coincida con $arrayPiel[0] y $arrayPiel[1]
     * @var array $personalizado Añade los datos de las capas a la base de datos
     * @var int $producto Recupera el id de el ultimo personalizado almacenado en la  base de datos
     * @return redirect Devuelve a la ruta de la Home
     */
    public function anadirDiseno($id, Request $request)
    {
        //Recupero las capas de el diseño
        $accesorio = $request->input('accesorio');
        $arrayAccesorio = explode("/", $accesorio);
        $ojos = $request->input('ojos');
        $arrayOjos= explode("/", $ojos);
        $pelo = $request->input('pelo');
        $arrayPelo = explode("/", $pelo);
        $piel = $request->input('piel');
        $arrayPiel = explode("/", $piel);
        if($request->has('camiseta')){
                $camiseta=$request->input('camiseta');
                $datos= explode(",", $camiseta[0]);
        }elseif($request->has('lamina')){
                $lamina=$request->input('lamina');
                $datos= explode(",", $lamina[0]);
        }
        //Recupero el id de la capa cuando coincida el diseño, el tipo y el nombre
        $capaAccesorio = DB::select("select id from capas where diseno_id = ? AND tipo = ? AND nombre = ?", [$id, $arrayAccesorio[0], $arrayAccesorio[1]]);
        $capaOjos = DB::select("select id from capas where diseno_id = ? AND tipo = ? AND nombre = ?", [$id, $arrayOjos[0], $arrayOjos[1]]);
        $capaPelo = DB::select("select id from capas where diseno_id = ? AND tipo = ? AND nombre = ?", [$id, $arrayPelo[0], $arrayPelo[1]]);
        $capaPiel = DB::select("select id from capas where diseno_id = ? AND tipo = ? AND nombre = ?", [$id, $arrayPiel[0], $arrayPiel[1]]);
        //Creo un nuevo Personalizado y le meto los datos
        $personalizado = new Personalizados();
        $personalizado->diseno_id = $id;
        $personalizado->user_id = auth()->id();
        if($datos[0]=="Camiseta"){
            $personalizado->talla = $datos[1];
            $personalizado->color = $datos[2];
            $personalizado->precio = $datos[3];
        }else{
            $personalizado->tamano = $datos[1];
            $personalizado->precio = $datos[2];
        }
        $personalizado->save();
        $personalizado->capas()->attach($capaAccesorio[0]->id);
        $personalizado->capas()->attach($capaOjos[0]->id);
        $personalizado->capas()->attach($capaPelo[0]->id);
        $personalizado->capas()->attach($capaPiel[0]->id);
        //Recupero el id del ultimo personalizado creado
        $producto = DB::select("select MAX(id) id from personalizados where diseno_id = ? AND user_id = ?", [$id, auth()->id()]);
        //Lo añado a la cesta
        DB::insert('insert into cesta (user_id, personalizado_id, cantidad) values (?, ?, 1)', [auth()->id(), $producto[0]->id]);
        return redirect('home');
    }
    /**
     * @param mixed $id
     * @var array $productos Recupera los productos de la cesta
     * @var array $disenos Recupera los diseños personalizados de la cesta
     * @var int $contP Cuenta todos los productos de la variable $productos
     * @var int $contD Cuenta todos los diseños personalizados de la variable $diseños
     * @var int $cont Suma las variables $contP y $contD
     * @return view Devuelve la vista 'cesta' con la variable $productos y $disenos
     */
    public function ver($id)
    {
        //Recupero los datos de producto con la cesta
        $productos = Producto::join("cesta", "cesta.producto_id", "=", "productos.id")->get();
        //Recupero los datos de Personalizados con el diseño y la cesta
        $disenos = Personalizados::join('disenos', 'disenos.id', '=', 'personalizados.diseno_id')->join("cesta", "cesta.personalizado_id", "=", "personalizados.id")->get();
        //Hago un count para saber cuantas entradas tienen entre ambas colecciones
        $contP = $productos->count();
        $contD = $disenos->count();
        $cont = $contP + $contD;
        //Si el contador es 0 te manda de vuelta al inicio, si no devuelve la cesta
        if($cont==0){
            return redirect('home');
        }else{
        return view('cesta', ['productos' => $productos], ['disenos' => $disenos]);
        }
    }
    /**
     * @param mixed $id
     * @var $producto Recupera el prodcuto de la cesta que tiene el mismo id
     * @return back Devuelve la página anterior
     */
    public function borrar($id)
    {   
        //Recupera la cesta cuando coincida con el id y lo borra
        $producto = DB::table("cesta")->where('id', '=', $id);
        $producto->delete();
        return back();
    }
    /**
     * @var array $pedidos Crea un nuevo pedido
     * @var array $productos Recupera los productos de la cesta del usuario
     * @var array $personalizado Recupera los diseños de la cesta del usuario
     * @var array $cesta Recupera los datos de la cesta
     * @return redirect Redirige a la ruta Pago
     */
    public function pagar($id, Request $request)
    {
        //Crea un nuevo pedido y le mete los datos del request
        $pedidos = new Pedido();
        $pedidos->user_id = auth()->id();
        $pedidos->total = $request->input('total');
        $pedidos->save();
        //Recupera los datos de la cesta cuando corresponda a un pedido
        $productos = DB::table('cesta')->where('producto_id', '!=', null)->get();
        //Recupera los datos de la cesta cuando corresponda a personalizado
        $personalizado = DB::table('cesta')->where('personalizado_id', '!=', null)->get();
        //Recorre personalizados y almacena en pedido un array colos datos para el attach
        foreach ($personalizado as $per) {
            $pedido = [
                'pedido_id' => $pedidos->id,
                'personalizados_id' => $per->personalizado_id,
                'cantidad' => $per->cantidad
            ];
            $pedidos->personalizado()->attach(['pedido' => $pedido]);
        }
        //Recorre productos y almacena en pedido un array colos datos para el attach
        foreach ($productos as $producto) {
            $pedido = [
                'pedido_id' => $pedidos->id,
                'producto_id' => $producto->producto_id,
                'cantidad' => $producto->cantidad
            ];
            $pedidos->producto()->attach(['pedido' => $pedido]);
        }
        //Recorro productos y le resto al stock la cantidad que habia en la cesta
        foreach ($productos as $producto) {
            $prod = Producto::find($producto->producto_id);
            $stock = DB::table('productos')->select('stock')->where('id', '=', $prod->id)->get();
            $restar = $producto->cantidad;
            $stockTotal = $stock[0]->stock - $restar;
            $prod->stock = $stockTotal;
            //Guarda la informacion
            $prod->save();
        }
        //Borro la cesta del usuario
        $cesta = DB::table('cesta')->where('user_id', '=', auth()->id());
        $cesta->delete();
        return redirect()->route('pago');
    }
}
