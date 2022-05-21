@extends('layouts.master')
@section('titulo')
    Cesta
@endsection
@section('corpo')
    <div style="height: 10%">
    </div>
    <div class="container my-5 py-5 px-5 bg-light shadow-sm">
        <div class="col-12 col-lg-12 col-sm-12">
            <div class="row">
                <div class="col-6">
                    <h1 class="fw-bold mb-4 text-primary">{{ __('Cart') }}</h1>
                </div>
                <div class="col-6">
                    <div class="d-flex justify-content-end">
                        @php
                        //Creo un contador para saber cuantos datos hay entre las coleccion
                            $cont = 0;
                            $contP = $productos->count();
                            $contD = $disenos->count();
                            $cont = $contP + $contD;
                            //Almaceno un total para saber el precio total qeu se va sumando en los for
                            $total = 0;
                            $p = 0;
                            $d = 0;
                            for ($i = 0; $i < $contP; $i++) {
                                $precio = floatval($productos[$i]->precio);
                                $cantidad = intval($productos[$i]->cantidad);
                                $p += $precio * $cantidad;
                            }
                            for ($i = 0; $i < $contD; $i++) {
                                $precio = floatval($disenos[$i]->precio);
                                $cantidad = intval($disenos[$i]->cantidad);
                                $d += $precio * $cantidad;
                            }
                            $total = $d + $p;
                        @endphp
                        <h1 class="fw-bold mb-4 text-primary">Total: @php echo number_format($total, 2);@endphp€</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @for ($i = 0; $i < $cont; $i++)
                        <form action="/cesta/{{ auth()->id() }}" method="post">
                    @endfor
                    @csrf
                    <div class="table-responsive d-flex justify-content-center px-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Image') }}</th>
                                    <th scope="col">{{ __('Units') }}</th>
                                    <th scope="col">{{ __('Delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td><img src="{{ URL::asset('imagenes/' . $producto->imagen . '.jpg') }}"
                                                class="img-fluid img-thumbnail" width="50px"></td>
                                        <td class="align-middle text-center">{{ $producto->cantidad }}</td>
                                        <td><button class="btn btn-primary"><a class="text-white text-decoration-none"
                                                    href="/cesta/borrar/{{ $producto->id }}">{{ __('Delete') }}</a></button>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach ($disenos as $diseno)
                                    <tr>
                                        <td><img src="{{ URL::asset('imagenes/disenos/' . $diseno->imagen . '.png') }}"
                                                class="img-fluid img-thumbnail" width="50px"></td>
                                        <td class="align-middle text-center">{{ $diseno->cantidad }}</td>
                                        <td><button class="btn btn-primary"><a class="text-white text-decoration-none"
                                                    href="/cesta/borrar/{{ $diseno->id }}">{{ __('Delete') }}</a></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 col-lg-12">
                        <div class="row">
                        </div>
                    </div>
                    <div class="col-12 col-lg-12">
                        <div class="d-flex flex-row justify-content-center alig-items-center mx-2 mt-2">
                            <div class="row">
                                <input type="hidden" id="total" name="total" value="@php echo number_format($total, 2); @endphp">
                                <input type="submit" class="btn btn-primary mt-2 text-white" name="registrar"
                                    value="{{ __('Pay') }}">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
