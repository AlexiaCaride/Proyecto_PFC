@extends('layouts.master')
@section('titulo')
    Contacto
@endsection
@section('corpo')
    <div class="container-fluid py-5"
        style="background-image: url({{ asset('imagenes/BannerComisiones.png') }}); height: 535px">
        <br class="mt-5">
        <h1 class="text-white text-center py-5 my-5 display-1 text-uppercase">{{ __('Commissions') }}</h1>
    </div>
    <div class="container d-flex justify-content-center my-5">
        <div class="col-10 col-sm-12 col-lg-10">
            <h2 class="text-primary text-uppercase text-center">{{ __('How does it work?') }}
            </h2>
            <p class="text-center">
                {{ __('The way the commissions work is very simple, after viewing the price table you just have to write us in the form at the bottom of the page the type of article it is (portrait, full body...) as well as the details that imply a price increase (more than one person, backgrounds...).') }}
            </p>
            <p class="text-center">
                {{ __('We will then reply to your email with the final quote, how to pay for it, the time frame in which it will be done and we will ask for a reference photo.') }}
            </p>
        </div>
    </div>
    <div class="container-fluid py-5 my-3" style="background-image: url({{ asset('imagenes/miniBanner2.png') }})">
        <div class="container bg-light text-center">
            <h1 class="text-primary text-uppercase py-5 display-5">{{ __('Prices') }}</h1>
        </div>
    </div>
    <div class="container d-flex justify-content-center my-5">
        <div class="col-10 col-sm-12 col-lg-10">
            <table class="table table-hover text-center">
                <tr>
                    <th class="fs-3">☼</th>
                    <th class="fs-5">{{ __('Headshot') }}</th>
                    <th class="fs-5">{{ __('Halfbody') }}</th>
                    <th class="fs-5">{{ __('Fullbody') }}</th>
                </tr>
                <tr>
                    <th>{{ __('InkSpell Style') }}</th>
                    <td class="">10€</td>
                    <td>15€</td>
                    <td>20€</td>
                </tr>
                <tr>
                    <th>{{ __('Extra character') }}</th>
                    <td>+5€</td>
                    <td>+10€</td>
                    <td>+15€</td>
                </tr>
                <tr>
                    <th>{{ __('Realism') }}</th>
                    <td>20€</td>
                    <td>30€</td>
                    <td>40€</td>
                </tr>
                <tr>
                    <th>{{ __('Extra character') }}</th>
                    <td>+10€</td>
                    <td>+15€</td>
                    <td>+20€</td>
                </tr>
                <tr>
                    <th colspan="4" class="fs-5">{{ __('Format') }}</th>
                </tr>
                <tr>
                    <th>{{ __('JPG file') }}</th>
                    <td>{{ __('Included') }}</td>
                    <td>{{ __('Included') }}</td>
                    <td>{{ __('Included') }}</td>
                </tr>
                <tr>
                    <th>{{ __('T-shirt') }}</th>
                    <td>+ 12€</td>
                    <td>{{ __('Back or White') }}</td>
                    <td>{{ __('S to XL') }}</td>
                </tr>
                <tr>
                    <th>{{ __('Print') }}</th>
                    <td>A5 +3€</td>
                    <td>A4 +5€</td>
                    <td>A3 +8€</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="container d-flex justify-content-center my-5">
        <div class="col-10 col-sm-12 col-lg-10">
            <h2 class="text-primary text-uppercase text-center">{{ __('Contact') }}</h2>
            <form action="contacto" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-6 col-sm-12 col-lg-6  my-4">
                        <small><label class="text-uppercase" for="nombre">{{ __('Name') }}</label></small>
                        <input type="text" name="nombre" value="" class="form-control border-primary"
                            style="border-radius: 15px" required>
                    </div>
                    <div class="col-6 col-sm-12 col-lg-6  my-4">
                        <small><label class="text-uppercase" for="apellido">{{ __('Surname') }}</label></small>
                        <input type="text" name="apellido" value="" class="form-control border-primary"
                            style="border-radius: 15px" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12  my-4">
                        <small><label class="text-uppercase" for="email">{{ __('Email') }}</label></small>
                        <input type="email" name="email" value="" class="form-control border-primary"
                            style="border-radius: 15px" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12  my-4">
                        <small><label class="text-uppercase" for="mensaje">{{ __('Message') }}</label></small>
                        <textarea class="form-control border-primary" style="border-radius: 25px" name="mensaje" rows="5" required></textarea>
                        <div class="text-center">
                            <input type="submit" name="enviar" value="{{ __('Send') }}"
                                class="btn text-white rounded-pill px-4 bg-primary text-uppercase fs-5 my-5">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
