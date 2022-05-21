@extends('layouts.master')
@section('titulo')
    Contacto
@endsection
@section('corpo')
    <div style="height: 25%">
    </div>
    <div class="d-flex flex-row justify-content-center alig-items-center">
        <div class="card border-light border-2 mt-5 py-3 px-3 bg-light shadow-lg" style="width: 18rem;">
            <div class="col-12 col-lg-12">
                <div class="d-flex flex-row justify-content-center alig-items-center">
                    <div class="row">
                        <div class="mb-2">
                            <h2 class="text-primary text-center fs-4 fw-bold">{{__('Message sent successfully')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <div class="d-flex flex-row justify-content-center align-items-center">
                    <div class="row">
                        <div class="m-3">
                            <p class="text-center">{{__('We will respond as quickly as possible')}}</p>
                            <div class="d-flex flex-row justify-content-center align-items-center">
                            <button class="btn btn-primary"><a class="text-white text-decoration-none" href="/">{{__('Go back')}}</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 25%">
    </div>
@endsection
