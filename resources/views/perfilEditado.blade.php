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
    <div class="container my-5">
        <div class="col-12 col-lg-12">
            <div class="my-3">
                <p class="text-center fs-4 mb-5">{{ __('Successful edition') }}</p>
                <div class="d-flex justify-content-center">
                    <button class="btn rounded-pill btn-primary text-uppercase text-white fs-4 px-4 py-0"><a
                            class="text-white text-decoration-none"
                            href="/perfil/{{ auth()->id() }}">{{ __('Back to my profile') }}</a></button>
                </div>
            </div>
        </div>
    </div>
@endsection
