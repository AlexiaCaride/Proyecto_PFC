@extends('layouts.master')
@section('titulo')
    Inicio
@endsection
@section('corpo')
    <div class="container text-center my-5">
        <img class="img-fluid" src="{{ URL::asset('imagenes/CabeceraHome.png') }}">
    </div>
    <div class="container">
        <div class="col-12">
            <div class="row d-flex justify-content-center my-5">
                <div class="col-5 col-sm-12 col-lg-5 text-center mb-4">
                    <img class="img-fluid" width="200" src="{{ URL::asset('imagenes/Imagen1SobreNosotros.png') }}">
                </div>
                <div class="col-5 col-sm-10 col-lg-5">
                    <h4 class="text-uppercase text-primary text-center">{{ __('Buy art in the format of your choice')}}</h4>
                    <div class="row">
                        <p class="text-center">{{ __('From a simple t-shirt with a unique design to an eye-catching print to decorate your walls, the designs are prepared for optimum quality output in your favourite format.')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-12">
            <div class="row d-flex justify-content-center my-5">
                <div class="col-5 col-sm-10 col-lg-5 order-lg-1 order-sm-2">
                    <h4 class="text-uppercase text-primary text-center">{{ __('Create your own design')}}</h4>
                    <div class="row">
                        <p class="text-center">{{ __('There are illustrations for all tastes, so we give you the opportunity to create your own to show your unique and personal style.')}}</p>
                        <p class="text-center">{{ __("Don't worry, our design creator is very easy to use.")}}</p>
                    </div>
                </div>
                <div class="col-5 col-sm-12 col-lg-5 text-center mb-4 order-lg-2 order-sm-1">
                    <img class="img-fluid" width="200" src="{{ URL::asset('imagenes/Imagen1SobreNosotros.png') }}">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5 my-3" style="background-image: url({{ asset('imagenes/miniBanner2.png') }})">
        <div class="container bg-light text-center">
            <h4 class="text-primary text-uppercase pt-4 px-5">{{ __('Find out about our commissions')}}</h4>
            <p class=" pb-4 px-5">{{ __('If none of the designs on the site convince you but you like the drawing style, we have the solution. Our commissions are open and waiting for your request.')}}</p>
        </div>
    </div>
    <script>
        function showCookieBanner() {
            let cookieBanner = document.getElementById("cb-cookie-banner");
            cookieBanner.style.display = "block";
        }

        //Esconde el banner si se aceptan las cookies
        function hideCookieBanner() {

            let cookieBanner = document.getElementById("cb-cookie-banner");
            cookieBanner.style.display = "none";
        }

        // Assigning values to window object
        window.onload = initializeCookieBanner();
        window.cb_hideCookieBanner = hideCookieBanner;
    </script>
    <style>
        #cb-cookie-banner {
            z-index: 100;
            position: fixed;
            bottom: 2%;
            left: 25%;
            right: 25%;
        }
    </style>
    <div id="cb-cookie-banner" class="alert alert-light border text-center mb-0" role="alert">
        <p>🍪 {{ __('This site uses cookies to improve the user experience.')}}
        <a href="/politica-cookies" target="blank">{{ __('Learn more')}}</a>
        </p>
        <button type="button" class="btn text-white rounded-pill px-3 py-0 bg-primary text-uppercase mt-3"
            onclick="window.hideCookieBanner()">
            {{ __('Accept cookies')}}
        </button>
    </div>
@endsection
