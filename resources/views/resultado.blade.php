@extends('layouts.master')
@section('titulo')
    Diseños
@endsection
@section('corpo')
<div class="container">
    <div class="col-6">
        <section>
            <img class="personalizar img-fluid" src="{{ URL::asset('productos/personalizado/'.$piel.'') }}"
                id="piel" width="300px" height="300px">
            <img class="personalizar img-fluid" src="{{ URL::asset('productos/personalizado/'.$pelo.'') }}"
                id="pelo" width="300px" height="300px">
            <img class="personalizar img-fluid" src="{{ URL::asset('productos/personalizado/'.$ojos.'') }}"
                id="ojos" width="300px" height="300px">
            <img class="personalizar img-fluid" src="{{ URL::asset('productos/personalizado/'.$accesorio.'') }}"
                id="accesorio" width="300px" height="300px">
        </section>
    </div>
</div>

@endsection
