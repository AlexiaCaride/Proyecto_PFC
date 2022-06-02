@extends('layouts.master')
@section('titulo')
    Administración
@endsection
@section('corpo')
    <div class="container-fluid py-1"
        style="background-image: url({{ asset('imagenes/miniBanner2.png') }}); height: 200px">
        <br class="mt-5">
        <h1 class="text-white text-center display-3 text-uppercase">{{ __('Messages') }}</h1>
    </div>
    <div class="container my-5 px-5">
        <div class="col-12 col-lg-12 col-sm-12">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-center px-2">
                        <div class="table-responsive">
                            @foreach ($mensajes as $mensaje)
                                <form action="/administrar/contacto/{{ $mensaje->id }}" method="post">
                            @endforeach
                            @csrf

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('Name') }}</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">{{ __('Message') }}</th>
                                        <th scope="col">{{ __('Replied') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mensajes as $mensaje)
                                        <tr>
                                            <th scope="row">{{ $mensaje->id }}</th>
                                            <td>{{ $mensaje->nombre }}</td>
                                            <td>{{ $mensaje->mensaje }}</td>
                                            <td>{{ $mensaje->email }}</td>
                                            <td><button class="btn text-white rounded-pill px-3 py-0 bg-primary text-uppercase"><a class="text-white text-decoration-none"
                                                        href="/administrar/contacto/{{ $mensaje->id }}">{{ __('Replied') }}</a></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5 px-5">
        <div class="col-12 col-lg-12 col-sm-12">
            <div class="row">
                <div class=" d-flex justify-content-center">
                    {{ $mensajes->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
