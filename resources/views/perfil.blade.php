@extends('layouts.master')
@section('titulo')
    Mis datos
@endsection
@section('corpo')
    <div class="container-fluid py-1"
        style="background-image: url({{ asset('imagenes/miniBanner2.png') }}); height: 200px">
        <br class="mt-5">
        <h1 class="text-white text-center display-3 text-uppercase">{{ __('Profile') }}</h1>
    </div>
    <div class="container mb-5">
        <div class="col-12">
            <div class="row d-flex justify-content-center">
                <div class="col-4 col-sm-7 col-lg-4">
                    <p class="fs-5 mx-2 my-5">{{ __('Name') }}: {{ $perfil->nombre }}</p>
                </div>
                <div class="col-4 col-sm-7 col-lg-4">
                    <p class="fs-5 mx-2 my-5">{{ __('Surname') }}: {{ $perfil->apellidos }}</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-4 col-sm-7 col-lg-4">
                    <p class="fs-5 mx-2 my-5">{{ __('Province') }}: {{ $perfil->provincia }}</p>
                </div>
                <div class="col-4 col-sm-7 col-lg-4">
                    <p class="fs-5 mx-2 my-5">{{ __('City') }}: {{ $perfil->ciudad }}</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-4 col-sm-7 col-lg-4">
                    <p class="fs-5 mx-2 my-5">{{ __('Address') }}: {{ $perfil->direccion }}</p>
                </div>
                <div class="col-4 col-sm-7 col-lg-4">
                    <p class="fs-5 mx-2 my-5">{{ __('Postal Code') }}: {{ $perfil->cPostal }}</p>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-center alig-items-center mt-3">
                <a class="text-decoration-none" href="/perfil/editar/{{ auth()->id() }}"><button
                    class="btn text-white rounded-pill px-4 py-0 bg-primary text-uppercase fs-5">
                        {{ __('Edit profile') }}
                    </button></a>
            </div>
        </div>
    </div>
@endsection
