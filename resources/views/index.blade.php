@extends('layouts.master')
@section('titulo')
Inicio
@endsection
@section('corpo')
<div class="container">
<h1>Articulos de la tienda</h1>

<img src="{{URL::asset('imagenes/03102021.jpg')}}" class="img-fluid" style="width: 200px"><br>

<p>Fila con camisetas</p>
<p>Fila con tazas</p>
<p>Fila con prints</p>
</div>
@endsection