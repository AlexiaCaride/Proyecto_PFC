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
            <form action="/pago" method="post">
            @csrf
                <div class="row">
                    <div class="col-12  my-4">
                        <small><label class="text-uppercase" for="numero">{{ __('Card number') }}</label></small>
                        <small>
                            <div id="errorNum"></div>
                        </small>
                        <input type="text" id="numero" onblur="return validaNumero()" class="form-control border-primary"
                            style="border-radius: 15px">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-12 col-lg-6  my-4">
                        <small><label class="text-uppercase" for="fecha">{{ __('Expiry date') }}</label></small>
                        <input type="date" name="fecha" value="" class="form-control border-primary"
                            style="border-radius: 15px; width: 175px" required>
                    </div>
                    <div class="col-6 col-sm-12 col-lg-6  my-4">
                        <small><label class="text-uppercase" for="cvv">{{ __('CVV') }}</label></small>
                        <small>
                            <div id="errorcvv"></div>
                        </small>
                        <input type="text" id="cvv" onblur="return validaCVV()" class="form-control border-primary"
                            style="border-radius: 15px; width: 100px">
                    </div>
                    <div class="text-center mt-5">
                        <input type="submit"
                            class="btn text-white rounded-pill px-3 py-0 bg-primary text-uppercase fs-5 m t-3" value="{{ __('Finalise order') }}">
                    </div>
                </div>
                <form>
        </div>
    </div>
    <script>
        //Valida el número de la tarjeta que tenga 16 numeros a través de una expresión regular
        function validaNumero() {
            valor = document.getElementById("numero").value;
            if (!(/^[01-9]{16}$/.test(valor))) {
                document.getElementById("errorNum").innerHTML = "{{ __('Incorrect card number')}}";
                return false;
            }
            document.getElementById("errorNum").innerHTML = "";
            return true;
        }
        //Valida el número del CVV tenga 3 numeros a través de una expresión regular
        function validaCVV() {
            valor = document.getElementById("cvv").value;
            if (!(/^[01-9]{3}$/.test(valor))) {
                document.getElementById("errorcvv").innerHTML = "{{ __('Incorrect CVV')}}";
                return false;
            }
            document.getElementById("errorcvv").innerHTML = "";
            return true;
        }
    </script>
@endsection
