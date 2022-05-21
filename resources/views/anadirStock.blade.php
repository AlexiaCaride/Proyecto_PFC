@extends('layouts.master')
@section('titulo')
    Administración
@endsection
@section('corpo')
    <div style="height: 10%">
    </div>
    <div class="container my-5 py-5 px-5 bg-light shadow-sm">
        <div class="col-12 col-lg-12 col-sm-12">
            <div class="row">
                <h1 class="fw-bold mb-4 text-primary">{{ __('Products') }}</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-center px-2">
                        <div class="table-responsive d-flex justify-content-center px-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('Image') }}</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">{{ __('Price') }}</th>
                                    <th scope="col" colspan="2">{{ __('Add') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                    <form action="/administrar/productos/{{ $producto->id }}" method="post">
                                        @csrf
                                        <tr>
                                            <th scope="row">{{ $producto->id }}</th>
                                            <td>{{ $producto->imagen }}</td>
                                            <td>{{ $producto->stock }}</td>
                                            <td>{{ $producto->precio }}</td>
                                            <td><input class="input-group-text" type="number" min=0 name="anadir" value=""
                                                    size="5%"></td>
                                            <td><input type="submit" name="enviar" value="{{ __('Add') }}"
                                                    class="btn btn-primary text-white"></td>
                                        </tr>
                                    </form>
                                @endforeach
                            </tbody>
                        </table>
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
                    {{ $productos->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
