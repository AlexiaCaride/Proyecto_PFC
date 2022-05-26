@extends('layouts.master')
@section('titulo')
    Registrarse
@endsection
@section('corpo')
    <div class="d-flex flex-row justify-content-center alig-items-center mt-2">
        <button type="button"
            class="mt-3 btn btn-sm btn-primary rounded-circle text-white px-3 fs-4 fw-bold ">1</button>
    </div>
    <div class="d-flex flex-row justify-content-center alig-items-center mb-5">
        <div class="card border-light border-2 mt-3 py-3 px-3 bg-light shadow-lg" style="width: 18rem;">
            <h1 class="text-primary text-center fs-4 text-uppercase fw-bold">{{ __('Register') }}</h1>
            <div class="col-12 col-lg-12">
                <div class="d-flex flex-row justify-content-center alig-items-center">
                    <div class="row">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Name -->
                            <div>
                                <small><x-label for="name" class="text-uppercase" :value="__('Name')" /></small>

                                <x-input id="name" class="block mt-1 w-full form-control border-primary" type="text" name="name" :value="old('name')"
                                    required autofocus />
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <div class="d-flex flex-row justify-content-center alig-items-center">
                    <div class="row">
                        <!-- Email Address -->
                        <div class="mt-2">
                            <small><x-label for="email" class="text-uppercase" :value="__('Email')" /></small>

                            <x-input id="email" class="block mt-1 w-full form-control border-primary" type="email" name="email" :value="old('email')"
                                required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <div class="d-flex justify-content-center">
                    <div class="row">
                        <!-- Password -->
                        <div class="mt-4">
                            <small><x-label for="password" class="text-uppercase" :value="__('Password')" /></small>

                            <x-input id="password" class="block mt-1 w-full form-control border-primary" type="password" name="password" required
                                autocomplete="new-password" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <div class="d-flex flex-row justify-content-center alig-items-center">
                    <div class="row">
                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <small><x-label for="password_confirmation" class="text-uppercase" :value="__('Confirm Password')" /></small>

                            <x-input id="password_confirmation" class="block mt-1 w-full form-control border-primary" type="password"
                                name="password_confirmation" required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <div class="d-flex flex-row justify-content-center alig-items-center">
                    <div class="row">
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-12">
                    <div class="d-flex flex-row justify-content-center alig-items-center">
                        <div class="row">
                            <x-button class="btn text-white rounded-pill px-5 py-0 fs-5 bg-primary">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
