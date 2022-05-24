@extends('layouts.master')
@section('titulo')
    Sobre nosotros
@endsection
@section('corpo')
<div class="container-fluid py-5" style="background-image: url({{ asset('imagenes/BannerSobreNosotros.png') }}); height: 535px">
    <br class="mt-5">
    <h1 class="text-white text-center py-5 my-5 display-1 text-uppercase">{{ __('About us')}}</h1>
    </div>
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-10">
            <p class="fs-6 text-center">{{ __('InkSpell is a young company that seeks to revalue a small but great part of art that seems to be forgotten by society with less purchasing power. Nowadays, consuming music or cinema is practically within the reach of anyone, but what about drawing, painting or illustration?')}}
            </p>
        </div>
    </div>
    <div class="container my-3">
        <div class="d-flex justify-content-center">
            <div class="col-8 tarjeta p-3">
                <div class="row">
                    <div class="col-6 col-sm-12 col-lg-6 text-center">
                        <img class="img-fluid" src="{{ URL::asset('imagenes/Imagen1SobreNosotros.png') }}">
                    </div>
                    <div class="col-6 col-sm-12 col-lg-6 text-center pt-2">
                        <img class="img-fluid" src="{{ URL::asset('imagenes/pencil.png') }}">
                        <div class="row">
                            <p class="text-center mt-4">{{ __("All our designs are 100% original, most of them start with a story that needs to be told and that nobody wants to accept is there, art has to move in some way, it doesn't always have to be pretty.")}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="d-flex justify-content-center">
            <div class="col-8 tarjeta p-3">
                <div class="row">
                    <div class="col-6 col-sm-12 col-lg-6 order-lg-1 order-sm-2  text-center pt-2">
                        <img class="img-fluid" src="{{ URL::asset('imagenes/pencil.png') }}">
                        <div class="row">
                            <p class="text-center mt-4">{{__('Created by the artist herself and with a completely personal drawing style, we also support the mainstream, creating designs that simply seek aesthetics without stories or interpretations of the work, just something nice to decorate your t-shirt or wall.')}}</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-12 col-lg-6 text-center mb-4 order-lg-2 order-sm-1">
                        <img class="img-fluid" src="{{ URL::asset('imagenes/Imagen2SobreNosotros.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5 my-5" style="background-image: url({{ asset('imagenes/miniBanner.png') }})">
        <div class="col-12">
            <div class="row d-flex justify-content-center">
                <div class="col-2 col-sm-3 col-lg-2 bg-light text-center py-5 mx-4">
                    <img class="img-fluid" src="{{ URL::asset('imagenes/iconos/instagram-brands.png') }}">
                    <h4 class="text-primary mt-2">INSTAGRAM</h4>
                    <img class="img-fluid my-2" src="{{ URL::asset('imagenes/Línea 1.png') }}">
                    <p>@ALEXINKSPELL</p>
                </div>
                <div class="col-2 col-sm-3 col-lg-2 bg-light text-center py-5 mx-4">
                    <img class="img-fluid" src="{{ URL::asset('imagenes/iconos/location-dot-solid.png') }}">
                    <h4 class="text-primary mt-2 text-uppercase">{{ __('Address')}}</h4>
                    <img class="img-fluid my-2" src="{{ URL::asset('imagenes/Línea 1.png') }}">
                    <p>DIRECCIÓN</p>
                </div>
                <div class="col-2 col-sm-3 col-lg-2 bg-light text-center py-5 mx-4">
                    <img class="img-fluid" src="{{ URL::asset('imagenes/iconos/twitter-brands.png') }}">
                    <h4 class="text-primary mt-2">TWITTER</h4>
                    <img class="img-fluid my-2" src="{{ URL::asset('imagenes/Línea 1.png') }}">
                    <p>@ALEXINKSPELL</p>
                </div>
            </div>
        </div>
    </div>
@endsection
