@extends('layouts.master')
@section('titulo')
    Diseños
@endsection
@section('corpo')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            @foreach ($disenos as $diseno)
                <div class="col-4 col-lg-4 col-sm-6">
                    <div class="card text-center m-4 border-0" style="width: 18rem;">
                        <img src="{{ URL::asset('productos/personalizado/' . $diseno->imagen . '.jpg') }}"
                            class="card-img-top">
                        <div class="card-body">
                            <a href="/crear/{{ $diseno->id }}">
                                <button class="btn text-white rounded-pill px-5 py-0 fs-5 bg-primary text-uppercase">{{ __('Personalise') }}</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
