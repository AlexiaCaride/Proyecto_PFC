@extends('layouts.master')
@section('titulo')
    Novedades
@endsection
@section('corpo')
    <div class="container mt-5">
        <div class="row">
            @foreach ($datos as $noticia)
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-6 col-lg-6 col-sm-12">
                    <div class="d-flex justify-content-center">
                    <div class="card border border-0 text-center mt-4 mb-5" style="width: 25rem;">
                        <img class="p-2" src="{{ URL::asset('novedades/' . $noticia->imagen) }}" style="height: 18rem">
                        <div class="card-body">
                            <h3 class="card-title text-primary text-uppercase mb-3">{{ $noticia->titulo }}</h3>
                            <a class="text-decoration-none text-secondary text-uppercase fw-bolder" href="/noticias/{{$noticia->id}}">{{ __("Read")}}</a>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
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
