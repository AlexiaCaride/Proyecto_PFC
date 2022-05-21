@extends('layouts.master')
@section('titulo')
    Diseños
@endsection
@section('corpo')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            @foreach ($disenos as $diseno)
                <div class="col-4 col-lg-4 col-sm-6">
                    <div class="card text-center m-4" style="width: 18rem;">
                        <img src="{{ URL::asset('imagenes/disenos/' . $diseno->imagen . '.png') }}" class="card-img-top">
                        <div class="card-body">
                            <a href="/crear/{{ $diseno->id }}"
                                class="btn text-white rounded-pill px-5 bg-primary">{{ $diseno->precio }}€
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
