@extends('layouts.master')
@section('titulo')
    Cesta
@endsection
@section('corpo')
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
    <div class="container-fluid py-1"
        style="background-image: url({{ asset('imagenes/miniBanner2.png') }}); height: 200px">
        <br class="mt-5">
        <h1 class="text-white text-center display-3 text-uppercase">{{ __('Cart') }}</h1>
    </div>
    <div class="container my-5 px-5">
        <div class="col-12 col-lg-12 col-sm-12">
            <div class="row">
                <div class="col-12">
                    @for ($i = 0; $i < $cont; $i++)
                        <form action="/cesta/{{ auth()->id() }}" method="post">
                    @endfor
                    @csrf
                    <div class="table-responsive d-flex justify-content-center px-2">
                        <table class="table table-borderless">
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td><img src="{{ URL::asset('productos/Ilustraciones/' . $producto->imagen . '.png') }}"
                                                class="img-fluid img-thumbnail" width="100px"></td>
                                        <td class="align-middle text-center"><input type="number"
                                                class="form-control border-primary bg-light" style="width: 75px"
                                                value="{{ $producto->cantidad }}" readonly></td>
                                        <td class="align-middle text-center">{{ $producto->precio }}€/ud</td>
                                        <td class="align-middle text-end"><button
                                                class="btn text-white rounded-pill px-4 py-0 bg-primary text-uppercase fs-5"><a
                                                    class="text-white text-decoration-none"
                                                    href="/cesta/borrar/{{ $producto->id }}">{{ __('Delete') }}</a></button>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach ($disenos as $diseno)
                                    <tr>
                                        <td><img src="{{ URL::asset('imagenes/disenos/' . $diseno->imagen . '.png') }}"
                                                class="img-fluid img-thumbnail" width="100px"></td>
                                        <td class="align-middle text-center"><input type="number"
                                                class="form-control border-primary bg-light" style="width: 75px"
                                                value="{{ $diseno->cantidad }}" readonly></td>
                                        <td class="align-middle text-center">{{ $disen->precio }}€/ud</td>
                                        <td class="align-middle text-end"><button
                                                class="btn text-white rounded-pill px-4 py-0 bg-primary text-uppercase fs-5"><a
                                                    class="text-white text-decoration-none"
                                                    href="/cesta/borrar/{{ $diseno->id }}">{{ __('Delete') }}</a></button>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2" class="align-middle">
                                        <p class="mb-4 text-secondary fs-1 mt-3">Total: @php echo number_format($total, 2);@endphp€</p>
                                    </td>
                                    <td colspan="2" class="align-middle text-end"><input type="hidden" id="total" name="total" value="@php echo number_format($total, 2); @endphp">
                                        <input type="submit"
                                            class="btn text-white rounded-pill px-5 py-0 bg-primary text-uppercase fs-5 m t-3"
                                            name="pagar" value="{{ __('Pay') }}">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
