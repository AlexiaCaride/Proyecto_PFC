@extends('layouts.master')
@section('titulo')
    Editar perfil
@endsection
@section('corpo')
    <div class="container-fluid py-1"
        style="background-image: url({{ asset('imagenes/miniBanner2.png') }}); height: 200px">
        <br class="mt-5">
        <h1 class="text-white text-center display-3 text-uppercase">{{ __('Edit profile') }}</h1>
    </div>
    <div class="container my-5">
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/perfil/editar/{{ auth()->id() }}" method="POST">
                @csrf
                <div class="row d-flex justify-content-center">
                    <div class="col-4 col-sm-7 col-lg-4 mb-3">
                        <small><label class="text-uppercase" for="nombre">{{ __('Name') }}</label></small>
                        <input id="nombre" class="form-control border-primary" type="text" name="nombre"
                            value="{{ $perfil->nombre }}" required autofocus />
                    </div>
                    <div class="col-4 col-sm-7 col-lg-4 mb-3">
                        <small><label class="text-uppercase" for="apellidos">{{ __('Surname') }}</label></small>
                        <input id="apellidos" class="form-control border-primary" type="text" name="apellidos"
                            value="{{ $perfil->apellidos }}" required autofocus />
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-4 col-sm-7 col-lg-4 mb-3">
                        <small><label class="text-uppercase" for="provincia">{{ __('Province') }}</label></small>
                        <select required class="form-select mb-2 mt-2 form-control border-primary" id="provincia"
                            name="provincia" class="form-control">
                            <option value="{{ $perfil->provincia }}">{{ $perfil->provincia }}</option>
                            <option value="??lava/Araba">??lava/Araba</option>
                            <option value="Albacete">Albacete</option>
                            <option value="Alicante">Alicante</option>
                            <option value="Almer??a">Almer??a</option>
                            <option value="Asturias">Asturias</option>
                            <option value="??vila">??vila</option>
                            <option value="Badajoz">Badajoz</option>
                            <option value="Baleares">Baleares</option>
                            <option value="Barcelona">Barcelona</option>
                            <option value="Burgos">Burgos</option>
                            <option value="C??ceres">C??ceres</option>
                            <option value="C??diz">C??diz</option>
                            <option value="Cantabria">Cantabria</option>
                            <option value="Castell??n">Castell??n</option>
                            <option value="Ceuta">Ceuta</option>
                            <option value="Ciudad Real">Ciudad Real</option>
                            <option value="C??rdoba">C??rdoba</option>
                            <option value="Cuenca">Cuenca</option>
                            <option value="Gerona/Girona">Gerona/Girona</option>
                            <option value="Granada">Granada</option>
                            <option value="Guadalajara">Guadalajara</option>
                            <option value="Guip??zcoa/Gipuzkoa">Guip??zcoa/Gipuzkoa</option>
                            <option value="Huelva">Huelva</option>
                            <option value="Huesca">Huesca</option>
                            <option value="Ja??n">Ja??n</option>
                            <option value="La Coru??a/A Coru??a">La Coru??a/A Coru??a</option>
                            <option value="La Rioja">La Rioja</option>
                            <option value="Las Palmas">Las Palmas</option>
                            <option value="Le??n">Le??n</option>
                            <option value="L??rida/Lleida">L??rida/Lleida</option>
                            <option value="Lugo">Lugo</option>
                            <option value="Madrid">Madrid</option>
                            <option value="M??laga">M??laga</option>
                            <option value="Melilla">Melilla</option>
                            <option value="Murcia">Murcia</option>
                            <option value="Navarra">Navarra</option>
                            <option value="Orense/Ourense">Orense/Ourense</option>
                            <option value="Palencia">Palencia</option>
                            <option value="Pontevedra">Pontevedra</option>
                            <option value="Salamanca">Salamanca</option>
                            <option value="Segovia">Segovia</option>
                            <option value="Sevilla">Sevilla</option>
                            <option value="Soria">Soria</option>
                            <option value="Tarragona">Tarragona</option>
                            <option value="Tenerife">Tenerife</option>
                            <option value="Teruel">Teruel</option>
                            <option value="Toledo">Toledo</option>
                            <option value="Valencia">Valencia</option>
                            <option value="Valladolid">Valladolid</option>
                            <option value="Vizcaya/Bizkaia">Vizcaya/Bizkaia</option>
                            <option value="Zamora">Zamora</option>
                            <option value="Zaragoza">Zaragoza</option>
                        </select>
                    </div>
                    <div class="col-4 col-sm-7 col-lg-4 mb-3">
                        <small><label class="text-uppercase" for="ciudad">{{ __('City') }}</label></small>
                        <input id="ciudad" class="form-control border-primary" type="text" name="ciudad"
                            value="{{ $perfil->ciudad }}" required autofocus />
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-4 col-sm-7 col-lg-4">
                        <small><label class="text-uppercase" for="direccion">{{ __('Address') }}</label></small>
                        <input id="direccion" class="form-control border-primary" type="text" name="direccion"
                            value="{{ $perfil->direccion }}" required autofocus />
                    </div>
                    <div class="col-4 col-sm-7 col-lg-4">
                        <small><label class="text-uppercase" for="cPostal">{{ __('Postal Code') }}</label></small>
                        <input id="cPostal" class="form-control border-primary" type="text" name="cPostal"
                            value="{{ $perfil->cPostal }}" required autofocus />
                    </div>
                    <div class="d-flex flex-row justify-content-center alig-items-center mt-5">
                        <input type="submit" class="btn text-white rounded-pill px-4 py-0 bg-primary text-uppercase fs-5"
                            name="editar" value="{{ __('Edit') }}">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
