@extends('layouts.master')
@section('titulo')
    Administración
@endsection
@section('corpo')
<div class="container-fluid py-1"
style="background-image: url({{ asset('imagenes/miniBanner2.png') }}); height: 200px">
<br class="mt-5">
<h1 class="text-white text-center display-3 text-uppercase">{{ __('Products') }}</h1>
</div>
    <<div class="container my-5 px-5">
        <div class="col-12 col-lg-12 col-sm-12">
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
                                            <td><input class="form-control border-primary bg-light" type="number" min=0 name="anadir" value=""
                                                    size="5%"></td>
                                            <td><input type="submit" name="enviar" value="{{ __('Add') }}"
                                                class="btn text-white rounded-pill px-3 py-0 bg-primary text-uppercase"></td>
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
