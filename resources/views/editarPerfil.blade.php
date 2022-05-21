@extends('layouts.master')
@section('titulo')
Registro
@endsection
@section('corpo')
<div style="height: 20%">
</div>
<div class="d-flex flex-row justify-content-center alig-items-center">
    <div class="card border-light border-2 mt-5 py-3 px-3 bg-light shadow-lg" style="width: 18rem;">
        <h1 class="text-primary text-center fs-4 fw-bold">{{__('Modify my data')}}</h1>
        <div class="col-12 col-lg-12">
            <div class="d-flex flex-row justify-content-center alig-items-center">
                <div class="row">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form action="/perfil/editar/{{auth()->id()}}" method="POST">
                        @csrf
                        <div class="col-12 col-lg-12">
                            <div class="d-flex flex-row justify-content-center alig-items-center mx-2">
                                <div class="row">
                                    <label for="nombre">{{__('Name')}}</label>

                                    <input id="nombre" class="input-group-text" type="text" name="nombre" value="{{$perfil->nombre}}" required autofocus />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="d-flex flex-row justify-content-center alig-items-center mx-2">
                                <div class="row">
                                    <label for="apellidos">{{__('Surname')}}</label>

                                    <input id="apellidos" class="input-group-text" type="text" name="apellidos" value="{{$perfil->apellidos}}" required autofocus />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="d-flex flex-row justify-content-center alig-items-center mx-2">
                                <div class="row">
                                    <select required class="form-select form-select-lg mb-2 mt-2" id="provincia"
                                            name="provincia" class="form-control">
                                            <option value="{{ $perfil->provincia}}">{{ $perfil->provincia}}</option>
                                            <option value="Álava/Araba">Álava/Araba</option>
                                            <option value="Albacete">Albacete</option>
                                            <option value="Alicante">Alicante</option>
                                            <option value="Almería">Almería</option>
                                            <option value="Asturias">Asturias</option>
                                            <option value="Ávila">Ávila</option>
                                            <option value="Badajoz">Badajoz</option>
                                            <option value="Baleares">Baleares</option>
                                            <option value="Barcelona">Barcelona</option>
                                            <option value="Burgos">Burgos</option>
                                            <option value="Cáceres">Cáceres</option>
                                            <option value="Cádiz">Cádiz</option>
                                            <option value="Cantabria">Cantabria</option>
                                            <option value="Castellón">Castellón</option>
                                            <option value="Ceuta">Ceuta</option>
                                            <option value="Ciudad Real">Ciudad Real</option>
                                            <option value="Córdoba">Córdoba</option>
                                            <option value="Cuenca">Cuenca</option>
                                            <option value="Gerona/Girona">Gerona/Girona</option>
                                            <option value="Granada">Granada</option>
                                            <option value="Guadalajara">Guadalajara</option>
                                            <option value="Guipúzcoa/Gipuzkoa">Guipúzcoa/Gipuzkoa</option>
                                            <option value="Huelva">Huelva</option>
                                            <option value="Huesca">Huesca</option>
                                            <option value="Jaén">Jaén</option>
                                            <option value="La Coruña/A Coruña">La Coruña/A Coruña</option>
                                            <option value="La Rioja">La Rioja</option>
                                            <option value="Las Palmas">Las Palmas</option>
                                            <option value="León">León</option>
                                            <option value="Lérida/Lleida">Lérida/Lleida</option>
                                            <option value="Lugo">Lugo</option>
                                            <option value="Madrid">Madrid</option>
                                            <option value="Málaga">Málaga</option>
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
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="d-flex flex-row justify-content-center alig-items-center mx-2">
                                <div class="row">
                                    <label for="ciudad">{{__('City')}}</label>

                                    <input id="ciudad" class="input-group-text" type="text" name="ciudad" value="{{$perfil->ciudad}}" required autofocus />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="d-flex flex-row justify-content-center alig-items-center mx-2">
                                <div class="row">
                                    <label for="direccion">{{__('Address')}}</label>

                                    <input id="direccion" class="input-group-text" type="text" name="direccion" value="{{$perfil->direccion}}" required autofocus />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="d-flex flex-row justify-content-center alig-items-center mx-2">
                                <div class="row">
                                    <label for="cPostal">{{__('Postal Code')}}</label>

                                    <input id="cPostal" class="input-group-text" type="text" name="cPostal" value="{{$perfil->cPostal}}" required autofocus />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="d-flex flex-row justify-content-center alig-items-center mx-2 mt-2">
                                <div class="row">
                                    <input type="submit" class="btn btn-primary mt-2 text-white" name="editar" value="{{__('Edit')}}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height: 5%">
</div>
@endsection