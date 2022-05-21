@extends('layouts.master')
@section('titulo')
    Tienda
@endsection
@section('corpo')
    <div class="container text-center my-5">
        <img class="img-fluid" src="{{ URL::asset('imagenes/CabeceraTienda.png') }}">
    </div>
    <div class="container mt-5">
        <div class="col-12">
            <div class="row">
                <div class="col-6 text-center">
                    <a href="/tienda/camisetas"><img class="img-fluid" src="{{ URL::asset('imagenes/miniIconoCamis.png') }}"></a>
                    <div class="row mt-3">
                        <a href="/tienda/camisetas" class="text-secondary text-decoration-none text-uppercase"><h5>{{ __("T-shirts")}}</h5></a>
                    </div>
                </div>
                <div class="col-6 text-center">
                    <a href="/tienda/prints"><img class="img-fluid" src="{{ URL::asset('imagenes/miniIconoLaminas.png') }}"></a>
                    <div class="row mt-3">
                        <a href="/tienda/prints" class="text-secondary text-decoration-none text-uppercase"><h5>{{ __('Prints')}}</h5></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
