@extends('layouts.master')
@section('titulo')
    Diseños
@endsection
@section('corpo')
    <form action="/crear/paso2/{{ $id }}" method="post">
        @csrf
        <div class="container-fluid py-5 my-3" style="background-image: url({{ asset('imagenes/miniBanner3.png') }})">
            <div class="container tarjeta py-5 my-5 px-5">
                <div class="d-flex justify-content-center">
                    <div class="col-4 col-sm-10 col-lg-6">
                        <h1 class="mb-3 mx-3 text-uppercase text-primary">Tipo</h1>
                        <div class="my-5">
                            <input type="radio" onclick="radioCam()" class="form-check-input mx-2" id="camiseta"
                                value="camiseta" name="tipo" checked>{{ __('T-shirt') }}
                        </div>
                        <div class="my-5">
                            <input type="radio" onclick="radioLam()" class="form-check-input mx-2" id="lamina" value="lamina"
                                name="tipo">{{ __('Print') }}
                        </div>
                    </div>
                    <div class="col-6 col-sm-12 col-lg-6">
                        <div id="checkcamiseta" class="d-block">
                            <label for="talla" class="fs-4">{{ __('Size') }}</label>
                            <select class="form-select" name="talla" id="talla" required>
                                <option value="seleccionar">{{ __('Select') }}</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            <a href="">
                                <p class="text-center">¿Dudas con la talla?<p>
                            </a>
                            <label for="color" class="mt-3 fs-4">Color</label>
                            <select class="form-select" name="color" id="color" required>
                                <option value="seleccionar">{{ __('Select') }}</option>
                                <option value="blanco">blanco</option>
                                <option value="negro">negro</option>
                            </select>
                        </div>
                        <div id="checklamina" class="d-none">
                            <label for="tamano" class="fs-4 mt-3">{{ __('Dimensions') }}</label>
                            <select class="form-select mb-4" name="tamano" id="tamano" required>
                                <option value="seleccionar">{{ __('Select') }}</option>
                                <option value="A5">A5</option>
                                <option value="A4">A4</option>
                                <option value="A3">A3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="justify-content-center text-center mt-5">
            <input type="hidden" name="accesorio" id="formaccesorio" value="{{ $accesorio['accesorio'] }}">
            <input type="hidden" name="ojos" id="formojos" value="{{ $ojos['ojos'] }}">
            <input type="hidden" name="pelo" id="formpelo" value="{{ $pelo['pelo'] }}">
            <input type="hidden" name="piel" id="formpiel" value="{{ $piel['piel'] }}">
            <input class="btn text-white rounded-pill px-4 py-1 mx-3 bg-primary text-uppercase fs-5" type="submit"
                name="anadir" value="{{ __('Next') }}">
        </div>
    </form>
    <script>
        function radioCam() {
            if (document.getElementById('camiseta').checked) {
                document.getElementById('checklamina').className = 'd-none';
                document.getElementById('checkcamiseta').className = 'd-block';
            }
        }

        function radioLam() {
            if (document.getElementById('lamina').checked) {
                document.getElementById('checklamina').className = 'd-block';
                document.getElementById('checkcamiseta').className = 'd-none';
            }
        }
    </script>
@endsection
