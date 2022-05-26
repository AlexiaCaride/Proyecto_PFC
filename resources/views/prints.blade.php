@extends('layouts.master')
@section('titulo')
    Prints
@endsection
@section('corpo')
    @php
    //Creo una variable vacia que guarde el valor de camiseta para que solo se enseñe una vez la imagen
    $imagen = '';
    @endphp
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            @foreach ($productos as $producto)
                @if ($producto->imagen != $imagen)
                    @php
                        $imagen = $producto->imagen;
                    @endphp
                    <div class="col-4 col-lg-4 col-sm-6">
                        <div class="card text-center m-4 border-0" style="width: 18rem;">
                            <img src="{{ URL::asset('imagenes/' . $producto->imagen . '.png') }}" class="card-img-top">
                            <div class="card-body">
                                <a href="/tienda/prints/{{ $producto->imagen }}"
                                    class="btn text-white rounded-pill px-5 py-0 fs-5 bg-primary">{{ $producto->precio }}€</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection