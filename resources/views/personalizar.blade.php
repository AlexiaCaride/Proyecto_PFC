@extends('layouts.master')
@section('titulo')
    Diseños
@endsection
@section('corpo')
    <div style="height: 10%">
    </div>
    <div class="container my-5 py-5 px-5 bg-light shadow-sm">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-12 col-lg-12 col-sm-12">
            <div class="row">
                <div class="col-12">
                    <div class="row my-3">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <form method="POST" action="/crear/{{ $diseno->id }}">
                                @csrf
                                @php
                                    $tipo="";
                                @endphp
                                @foreach ($capas as $capa)
                                @if ($capa->tipo!=$tipo)
                                    @php
                                        $tipo=$capa->tipo;
                                    @endphp
                                    <input type="hidden" name="ruta[]" value="{{ $capa->diseno_id . '/' . $capa->tipo }}">
                                @endif
                                @endforeach
                                <div class="d-flex justify-content-center mb-5">
                                    <select class="form-select form-select-lg mb-3" name="fondo" id="fondo">
                                        <option value="fondo">{{ __('Background') }}</option>
                                        @foreach ($capas as $capa)
                                            @if ($capa->tipo == 'fondo')
                                                <option value="{{ $capa->nombre }}">{{ $capa->nombre }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex justify-content-center mb-5">
                                    <select class="form-select form-select-lg mb-3" name="imagen" id="imagen">
                                        <option value="imagen">{{ __('Image') }}</option>
                                        @foreach ($capas as $capa)
                                            @if ($capa->tipo == 'imagen')
                                                <option value="{{ $capa->nombre }}">{{ $capa->nombre }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex justify-content-center mb-5">
                                    <input class="input-group btn btn-primary text-white" type="submit" name="resultado"
                                        value="{{ __('View result') }}">
                                </div>
                            </form>
                            <p class="fs-3 fw-bold mx-5 px-5 mt-2">{{$diseno->precio}}€</p>
                        </div>
                        <div class="col-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
