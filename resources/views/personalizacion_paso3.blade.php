@extends('layouts.master')
@section('titulo')
    Diseños
@endsection
@section('corpo')
<div class="mt-3 mb-2">
    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-sm btn-secondary rounded-pill mx-5" style="width: 2rem; height:2rem;">1</button>
        <button type="button" class="btn btn-sm btn-secondary rounded-pill mx-5" style="width: 2rem; height:2rem;">2</button>
        <button type="button" class="btn btn-sm btn-primary text-white rounded-pill mx-5" style="width: 2rem; height:2rem;">3</button>
    </div>
</div>
    <div class="container-fluid py-5 my-3" style="background-image: url({{ asset('imagenes/miniBanner3.png') }})">
        <div class="container tarjeta py-5 my-5">
            <div class="d-flex justify-content-center">
                <div class="col-6 col-sm-10 col-lg-6">
                    <section>
                        <img class="personalizar img-fluid"
                            src="{{ URL::asset('productos/personalizado/' . $piel['piel'] . '.png') }}" id="piel"
                            width="300px" height="300px">
                        <img class="personalizar img-fluid"
                            src="{{ URL::asset('productos/personalizado/' . $pelo['pelo'] . '.png') }}" id="pelo"
                            width="300px" height="300px">
                        <img class="personalizar img-fluid"
                            src="{{ URL::asset('productos/personalizado/' . $ojos['ojos'] . '.png') }}" id="ojos"
                            width="300px" height="300px">
                        <img class="personalizar img-fluid"
                            src="{{ URL::asset('productos/personalizado/' . $accesorio['accesorio'] . '.png') }}"
                            id="accesorio" width="300px" height="300px">
                    </section>
                </div>
                <div class="col-6 col-sm-12 col-lg-6">
                    <h2 class="text-primary text-uppercase mt-5 mb-5">{{ __("You're almost there") }}</h2>
                    @foreach ($producto as $datos)
                        <p class="fs-4">Tipo de producto: {{ $datos[2] }}</p>
                        @if ($datos[2] == 'Camiseta')
                            <p class="fs-4">{{ __('Size') }}: {{ $datos[0] }}</p>
                            <p class="fs-4">Color: {{ $datos[1] }}</p>
                            <p class="fs-4 mb-4">{{ __('Price') }}: 15€</p>
                        @else
                            <p class="fs-4">{{ __('Dimensions') }}: {{ $datos[0] }}</p>
                            <p class="fs-4 mb-5">{{ __('Price') }}: {{ $datos[1] }}€</p>
                        @endif
                    @endforeach
                    <form action="/crear/paso3/{{ $id }}" method="POST">
                        @csrf
                        @foreach ($producto as $datos)
                            @if ($datos[2] == 'Camiseta')
                                <input type="hidden" name="camiseta[]"
                                    value="{{ $datos[2] }},{{ $datos[0] }},{{ $datos[1] }},15">
                            @else
                                <input type="hidden" name="lamina[]"
                                    value="{{ $datos[2] }},{{ $datos[0] }},{{ $datos[1] }}">
                            @endif
                        @endforeach
                        <input type="hidden" name="accesorio" id="formaccesorio" value="{{ $accesorio['accesorio'] }}">
                        <input type="hidden" name="ojos" id="formojos" value="{{ $ojos['ojos'] }}">
                        <input type="hidden" name="pelo" id="formpelo" value="{{ $pelo['pelo'] }}">
                        <input type="hidden" name="piel" id="formpiel" value="{{ $piel['piel'] }}">
                        <input class="btn text-white rounded-pill px-4 py-1 bg-primary text-uppercase fs-5" type="submit"
                            name="anadir" value="{{ __('Add to cart') }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
