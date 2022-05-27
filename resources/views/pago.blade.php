@extends('layouts.master')
@section('titulo')
    Método de pago
@endsection
@section('corpo')
    <div class="container-fluid py-1"
        style="background-image: url({{ asset('imagenes/miniBanner2.png') }}); height: 200px">
        <br class="mt-5">
        <h1 class="text-white text-center display-3 text-uppercase">{{ __('Payment method') }}</h1>
    </div>
    <div class="container d-flex justify-content-center my-5">
        <div class="col-10 col-sm-12 col-lg-10">
            <div class="row">
                <div class="col-12  my-4">
                    <small><label class="text-uppercase" for="numero">{{ __('Card number') }}</label></small>
                    <input type="text" name="numero" value="" class="form-control border-primary" style="border-radius: 15px"
                        required>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-12 col-lg-6  my-4">
                    <small><label class="text-uppercase" for="nombre">{{ __('Expiry date') }}</label></small>
                    <input type="date" name="fecha" value="" class="form-control border-primary"
                        style="border-radius: 15px; width: 175px" required>
                </div>
                <div class="col-6 col-sm-12 col-lg-6  my-4">
                    <small><label class="text-uppercase" for="cvv">{{ __('CVV') }}</label></small>
                    <input type="text" name="cvv" value="" class="form-control border-primary"
                        style="border-radius: 15px; width: 100px" required>
                </div>
                <div class="text-center mt-5">
                    <a href="/"><button class="btn text-white rounded-pill px-3 py-0 bg-primary text-uppercase fs-5 m t-3">{{ __("Finalise order")}}</button></a>
            </div></div>
        </div>
    </div>
@endsection
