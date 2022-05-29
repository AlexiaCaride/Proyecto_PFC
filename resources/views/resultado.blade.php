@extends('layouts.master')
@section('titulo')
    Diseños
@endsection
@section('corpo')
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
<div class="position-relative">
    <div class="container my-5 py-5 px-5 bg-light shadow-sm" style="height: 500px;width: 500px">
        <div class="col-12 col-lg-12 col-sm-12">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-center mb-5">
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <img src="{{ URL::asset('imagenes/'.$ruta[0].'/'.$fondo.'.png') }}" class="img-fluid img-thumbnail"
                                style="width: 300px">
                        </div>
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <img src="{{ URL::asset('imagenes/'.$ruta[1].'/'.$imagen.'.png') }}" class="img-fluid"
                                style="width: 300px">
                        </div>
                        <div class="row">
                            <div style="height: 350px"></div>
                            <div class="d-flex flex-row justify-content-center alig-items-center mt-3">
                                <a class="text-decoration-none" href="/crear"><button
                                        class="btn btn-primary mx-2 text-white">
                                        {{ __('Go back') }}
                                    </button></a>
                                <form method="post" action="/crear/anadir/{{$id}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$id}}">
                                    <input type="hidden" name="fondo" value="{{$fondo}}">
                                    <input type="hidden" name="imagen" value="{{$imagen}}">
                                    <input class=" mx-2 input-group btn btn-primary text-white" type="submit" name="anadir" value="{{__('Add to cart')}}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
