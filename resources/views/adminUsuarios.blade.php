@extends('layouts.master')
@section('titulo')
    Administración
@endsection
@section('corpo')
    <div class="container-fluid py-1"
        style="background-image: url({{ asset('imagenes/miniBanner2.png') }}); height: 200px">
        <br class="mt-5">
        <h1 class="text-white text-center display-3 text-uppercase">{{ __('Users') }}</h1>
    </div>
    <div class="container my-5 px-5">
        <div class="col-12 col-lg-12 col-sm-12">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-center px-2">
                        <div class="table-responsive">
                            @foreach ($usuarios as $usuario)
                                <form action="/administrar/usuarios/{{ $usuario->id }}" method="post">
                            @endforeach
                            @csrf

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('Type') }}</th>
                                        <th scope="col">{{ __('Name') }}</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">{{ __('Delete') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <th scope="row">{{ $usuario->id }}</th>
                                            <td>{{ $usuario->tipo }}</td>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td><button class="btn text-white rounded-pill px-3 py-0 bg-primary text-uppercase"><a class="text-white text-decoration-none"
                                                        href="/administrar/usuarios/{{ $usuario->id }}">{{ __('Delete') }}</a></button>
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
                    {{ $usuarios->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
