@extends('layouts.master')
@section('titulo')
    Diseños
@endsection
@section('corpo')
    <div class="container my-4">
        <div class="d-flex justify-content-center">
            <div class="col-8  border border-primary rounded tarjeta">
                <div class="row">
                    <div class="col-12 mb-4">
                        <section>
                            <img class="personalizar img-fluid" src="{{ URL::asset('productos/personalizado/piel/1.png') }}"
                                id="piel" width="300px" height="300px">
                            <img class="personalizar img-fluid" src="{{ URL::asset('productos/personalizado/pelo/1.png') }}"
                                id="pelo" width="300px" height="300px">
                            <img class="personalizar img-fluid" src="{{ URL::asset('productos/personalizado/ojos/1.png') }}"
                                id="ojos" width="300px" height="300px">
                            <img class="personalizar img-fluid" src="{{ URL::asset('productos/personalizado/accesorio/1.png') }}"
                                id="accesorio" width="300px" height="300px">
                        </section>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <p class="btn text-primary" id="accesorios" onclick="accesorios()">Accesorios</p>
                                <p class="btn" id="colorojos" onclick="ojos()">Ojos</p>
                                <p class="btn" id="colorpelo" onclick="pelo()">Pelo</p>
                                <p class="btn" id="tonopiel" onclick="piel()">Piel</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-center mb-3">
                                <div id="divaccesorios" class="d-block">
                                    @foreach ($capas as $capa)
                                        @if ($capa->tipo == 'accesorio')
                                            <button class="btn border-primary mx-2"
                                                onclick="document.getElementById('{{ $capa->tipo }}').src='{{ URL::asset('productos/personalizado/' . $capa->tipo . '/' . $capa->nombre . '.png') }}'
                                                        document.getElementById('formaccesorio').value= '{{ $capa->tipo . '/' . $capa->nombre . '.png'}}'">
                                                <img src={{ URL::asset('productos/personalizado/' . $capa->tipo . '/' . $capa->nombre . '.png') }}
                                                    width="75px" class="img-fluid">
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                                <div id="divojos" class="d-none">
                                    @foreach ($capas as $capa)
                                        @if ($capa->tipo == 'ojos')
                                            <button class="btn border-primary mx-2"
                                                onclick="document.getElementById('{{ $capa->tipo }}').src='{{ URL::asset('productos/personalizado/' . $capa->tipo . '/' . $capa->nombre . '.png') }}'
                                                        document.getElementById('formojos').value= '{{ $capa->tipo . '/' . $capa->nombre . '.png'}}'">
                                                <img src={{ URL::asset('productos/personalizado/' . $capa->tipo . '/' . $capa->nombre . '.png') }}
                                                    width="75px" class="img-fluid">
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                                <div id="divpelo" class="d-none">
                                    @foreach ($capas as $capa)
                                        @if ($capa->tipo == 'pelo')
                                            <button class="btn border-primary mx-2"
                                                onclick="document.getElementById('{{ $capa->tipo }}').src='{{ URL::asset('productos/personalizado/' . $capa->tipo . '/' . $capa->nombre . '.png') }}'
                                                        document.getElementById('formpelo').value= '{{ $capa->tipo . '/' . $capa->nombre . '.png'}}'">
                                                <img src={{ URL::asset('productos/personalizado/' . $capa->tipo . '/' . $capa->nombre . '.png') }}
                                                    width="75px" class="img-fluid">
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                                <div id="divpiel" class="d-none">
                                    @foreach ($capas as $capa)
                                        @if ($capa->tipo == 'piel')
                                            <button class="btn border-primary mx-2"
                                                onclick="document.getElementById('{{ $capa->tipo }}').src='{{ URL::asset('productos/personalizado/' . $capa->tipo . '/' . $capa->nombre . '.png') }}'
                                                        document.getElementById('formpiel').value= '{{ $capa->tipo . '/' . $capa->nombre . '.png'}}'">
                                                <img src={{ URL::asset('productos/personalizado/' . $capa->tipo . '/' . $capa->nombre . '.png') }}
                                                    width="75px" class="img-fluid">
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-center">
            <form method="POST" action="/crear/{{ $diseno->id }}">
                @csrf
                <input type="hidden" name="accesorio" id="formaccesorio" value="accesorio/1.png">
                <input type="hidden" name="ojos" id="formojos" value="ojos/1.png">
                <input type="hidden" name="pelo" id="formpelo" value="pelo/1.png">
                <input type="hidden" name="piel" id="formpiel" value="piel/1.png">
                <input type="submit" value="{{ __("Next")}}" class="btn text-white rounded-pill px-4 py-0 bg-primary text-uppercase fs-5 mb-5">
            </form>
        </div>
    </div>
    <script>
        function accesorios() {
            var accesorio = document.getElementById("accesorios").className = "btn text-primary";
            var ojos = document.getElementById("colorojos").className = "btn";
            var pelo = document.getElementById("colorpelo").className = "btn";
            var piel = document.getElementById("tonopiel").className = "btn";
            document.getElementById('divaccesorios').className = 'd-block';
            document.getElementById('divojos').className = 'd-none';
            document.getElementById('divpelo').className = 'd-none';
            document.getElementById('divpiel').className = 'd-none';

        }

        function ojos() {
            var accesorio = document.getElementById("accesorios").className = "btn";
            var ojos = document.getElementById("colorojos").className = "btn text-primary";
            var pelo = document.getElementById("colorpelo").className = "btn";
            var piel = document.getElementById("tonopiel").className = "btn";
            document.getElementById('divaccesorios').className = 'd-none';
            document.getElementById('divojos').className = 'd-block';
            document.getElementById('divpelo').className = 'd-none';
            document.getElementById('divpiel').className = 'd-none';
        }

        function pelo() {
            var accesorio = document.getElementById("accesorios").className = "btn";
            var ojos = document.getElementById("colorojos").className = "btn";
            var pelo = document.getElementById("colorpelo").className = "btn text-primary";
            var piel = document.getElementById("tonopiel").className = "btn";
            document.getElementById('divaccesorios').className = 'd-none';
            document.getElementById('divojos').className = 'd-none';
            document.getElementById('divpelo').className = 'd-block';
            document.getElementById('divpiel').className = 'd-none';
        }

        function piel() {
            var accesorio = document.getElementById("accesorios").className = "btn";
            var ojos = document.getElementById("colorojos").className = "btn";
            var pelo = document.getElementById("colorpelo").className = "btn";
            var piel = document.getElementById("tonopiel").className = "btn text-primary";
            document.getElementById('divaccesorios').className = 'd-none';
            document.getElementById('divojos').className = 'd-none';
            document.getElementById('divpelo').className = 'd-none';
            document.getElementById('divpiel').className = 'd-block';
        }
    </script>
@endsection
