@extends('layouts.master')
@section('titulo')
Mis datos
@endsection
@section('corpo')
<div style="height: 10%">
</div>
<div class="d-flex flex-row justify-content-center alig-items-center">
    <div class="card border-light border-2 mt-5 py-3 px-3 bg-light  shadow-lg" style="width: 18rem;">
        <h1 class="text-primary text-center mb-4 fs-3 fw-bold">{{__('My data')}}</h1>
        <div class="col-12 col-lg-12">
            <div class="d-flex flex-row justify-content-center alig-items-center">
                <div class="row">
                        <p class="fw-bold text-center">{{__('Successful edition')}}</p>
                    <div class="d-flex flex-row justify-content-center alig-items-center mt-3">
                        <a class="text-decoration-none" href="/perfil/{{auth()->id()}}"><button class="btn btn-primary text-white">
                                {{__('Back to my profile')}}
                            </button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 5%">
    </div>
    @endsection