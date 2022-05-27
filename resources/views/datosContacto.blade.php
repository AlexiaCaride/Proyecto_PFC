@extends('layouts.master')
@section('titulo')
    Contacto
@endsection
@section('corpo')
    <div class="container my-5 py-5">
        <div class="col-12 col-lg-12">
            <h2 class="text-uppercase text-center">{{ __('Message sent successfully') }}</h2>
            <div class="col-12">
                <div class="my-3">
                    <p class="text-center">{{ __('We will respond as quickly as possible') }}</p>
                    <div class="d-flex justify-content-center">
                        <button class="btn rounded-pill btn-primary text-uppercase text-white fs-4 px-4 py-0"><a
                                class="text-white text-decoration-none" href="/">{{ __('Go back') }}</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
