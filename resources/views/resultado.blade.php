@extends('layouts.master')
@section('titulo')
    Diseños
@endsection
@section('corpo')
    <div style="height: 10%">
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
