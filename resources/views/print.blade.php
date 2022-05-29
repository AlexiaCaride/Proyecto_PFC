@extends('layouts.master')
@section('titulo')
    Ver
@endsection
@section('corpo')
    <script>
        function tamanoPrecio() {
            var tamano = document.getElementById("tamano").value;
            if (tamano == "A5") {
                document.getElementById("precio").innerHTML = "5.00€";
            } else if (tamano == "A3") {
                document.getElementById("precio").innerHTML = "15.00€";
            } else document.getElementById("precio").innerHTML = "10.00€";
        }
    </script>
    @foreach ($prints as $print)
        @if ($loop->first)
            <div class="d-flex flex-row justify-content-center alig-items-center">
                <div class="container tarjeta mt-5">
                    <div class="col-12">
                        <div class="row my-2">
                            <div class="col-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="col-6 col-sm-12 col-lg-6">
                                <div class="text-center mt-5">
                                    <img src="{{ URL::asset('productos/' . $print->imagen . '/hoja.jpg') }}"
                                        class="img-fluid" style="width: 350px">
                                    <p id="precio" class="fs-3 fw-bold mx-5 px-5 mt-2">10.00€</p>
                                </div>
                            </div>
        @endif
    @endforeach
    <div class="col-6 col-sm-12 col-lg-6">
        <div class="d-flex row justify-content-center mt-4 mb-2 mx-5">
            @foreach ($prints as $print)
                <form method="post" action="/tienda/prints/{{ $print->imagen }}">
            @endforeach
            @csrf
            <div class="my-4">
                <br>
                <h2 class="text-primary text-uppecase">{{ $print->imagen }}</h2>
                <p>{{ $print->descripcion }}</p>
                <label for="tamano" class="fs-4 mt-3">{{ __('Dimensions') }}</label>
                <select class="form-select mb-4" name="tamano" id="tamano" onchange="tamanoPrecio()">
                    <option value="seleccionar">{{ __('Select') }}</option>
                    @foreach ($prints as $print)
                        <option value="{{ $print->tamano }}">{{ $print->tamano }}</option>
                    @endforeach
                </select>
                <div class="justify-content-center text-center mt-5">
                    @foreach ($prints as $print)
                        <input type="hidden" name="id" id="id" value="{{ $print->producto_id }}">
                    @endforeach
                    <input class="btn text-white rounded-pill px-4 py-1 bg-primary text-uppercase fs-5" type="submit"
                        name="anadir" value="{{ __('Add to cart') }}">
                    @if (!empty(session()->has('error')))
                        <div class="alert alert-danger mt-2">
                            {{ session()->get('error') }}
                    @endif
                </div>
            </div>
        </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
