@extends('layouts.master')
@section('titulo')
    Diseños
@endsection
@section('corpo')
    <div class="container my-4">
        <div class="d-flex justify-content-center">
            <div class="col-8  border border-primary rounded tarjeta">
                <div class="row">
                    <div class="col-12 my-4" style="height: 500px">
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <img src="" id="accesorio" width="500px" height="500px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <p class="lh-1 mx-4" id="accesorios">Accesorios</p>
                            <p class="lh-1 mx-4" id="colorojos">Ojos</p>
                            <p class="lh-1 mx-4" id="pelo">Pelo</p>
                            <p class="lh-1 mx-4" id="piel">Piel</p>
                        </div>
                        <div class="col-10">
                            <div class="d-flex justify-content-end">
                                @foreach ($capas as $capa)
                                    @if ($capa->tipo == 'accesorio')
                                        <button class="btn border-primary mx-2"
                                            onclick="document.getElementById('{{ $capa->tipo }}').src='=productos/personalizado/{{ $capa->tipo }}/{{ $capa->nombre }}.png'">
                                            <img src={{ URL::asset('productos/personalizado/' . $capa->tipo . '/' . $capa->nombre . '.png') }}
                                                width="75px">
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
@endsection
