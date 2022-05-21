@extends('layouts.master')
@section('titulo')
Novedades
@endsection
@section('corpo')
<div style="height: 10%">
</div>
@foreach ($datos as $noticia)
<div class="container my-5 py-5 px-5 bg-light shadow-sm">
    <div class="col-12 col-lg-12 col-sm-12">
        <div class="row">
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
                <div class="row">
                    <div class="col-6 col-lg-6 col-sm-12">
                        <div class="d-flex justify-content-center">
                            <img src="{{ URL::asset('novedades/' . $noticia->imagen) }}" class="img-fluid img-thumbnail " style="width: 200px">
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 col-sm-12">
                        <div class="mx-4 text-center">
                            <h1 class="fw-bold mb-4 text-primary">{{ $noticia->titulo }}</h1>
                            <div style="word-wrap: break-word;" class="mx-4">
                                {!! $noticia->descripcion !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="container my-5 py-5 px-5">
    <div class="col-12 col-lg-12 col-sm-12">
        <div class="row">
            <div class=" d-flex justify-content-center">
                <!--Llamo al menu de paginacion-->
            {{ $datos->links() }}
        </div>
        </div>
    </div>
</div>
@endsection