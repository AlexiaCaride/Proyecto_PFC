<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index() {
        //Devuelve la vista
        return view('index');
    }
}
