@extends('layouts.master')
@section('titulo')
    Contacto
@endsection
@section('corpo')
    <div style="height: 20%">
    </div>
    <div class="d-flex flex-row justify-content-center alig-items-center">
        <div class="card border-light border-2 mt-5 py-3 px-3 bg-light shadow-lg" style="width: 18rem;">
            <div class="col-12 col-lg-12">
                <div class="d-flex flex-row justify-content-center alig-items-center">
                    <div class="row">
                        <div class="mb-4">
                            <h2 class="text-primary text-center fs-4 fw-bold">{{__('Contact us')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <div class="d-flex flex-row justify-content-center alig-items-center">
                    <div class="row">
                        <div class="mt-4">
                            <form action="contacto" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <label for="asunto">{{__('Subject')}}</label>
                                <input type="text" name="asunto" value="" class="input-group-text" required><br>
                                <label for="mensaje">{{__('Message')}}</label>
                                <textarea class="input-group-text" name="mensaje" required></textarea><br>
                                <input type="submit" name="enviar" value="{{__('Send')}}" class="btn btn-primary text-white">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 10%">
    </div>
@endsection
