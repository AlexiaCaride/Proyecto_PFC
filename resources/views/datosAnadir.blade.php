@extends('layouts.master')
@section('titulo')
Añadir
@endsection
@section('corpo')
<div style="height: 20%">
</div>
<div class="d-flex flex-row justify-content-center alig-items-center">
    <div class="card border-light border-2 mt-5 py-3 bg-light  shadow-lg" style="width: 18rem">
        <div class="col-12 col-lg-12">
            <div class="d-flex flex-row justify-content-center align-items-center">
                <div class="row">
                    <div class="m-3">
                        <p>{{__('Successfully added novelty')}}</p>
                        <button class="btn btn-primary text-white"><a class="text-white text-decoration-none" href="/">{{__('Go back')}}</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height: 20%">
</div>
@endsection