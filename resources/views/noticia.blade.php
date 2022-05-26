@extends('layouts.master')
@section('titulo')
    {{ $noticia->titulo }}
@endsection
@section('corpo')
    <div class="container my-5">
        <div class="col-12">
            <img src="{{ URL::asset('novedades/' . $noticia->imagen) }}" width="1200px" class="img-fluid text-center">
            <h1 class="text-primary text-uppercase text-center my-5">{{ $noticia->titulo }}</h1>
            <div class="fs-5 mb-5">
                {!! $noticia->descripcion !!}
                <div>
                    <div class="d-flex justify-content-center mt-5">
                        <a href="/noticias/"><button
                                class="btn rounded-pill btn-primary text-uppercase text-white fs-4 px-4 py-0">{{ __("Go back")}}</button></a>
                    </div>
                </div>
            </div>
        @endsection
