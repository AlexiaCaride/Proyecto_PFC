@extends('layouts.master')
@section('titulo')
    Añadir
@endsection
@section('corpo')
<div class="container-fluid py-1" style="background-image: url({{ asset('imagenes/miniBanner2.png') }}); height: 200px">
    <br class="mt-5">
    <h1 class="text-white text-center display-3 text-uppercase">{{ __('Write New') }}</h1>
    </div>
    <div class="container my-5">
        <div class="d-flex flex-row justify-content-center ">
            <div class="border border-0 py-3  rounded" style="width: 100%">
                <div class="col-12 col-lg-12">
                    <div class="d-flex flex-row justify-content-center align-items-center">
                        <div class="row">
                            <form method="post" action="javascript:void(0)" id="image-upload" enctype="multipart/form-data">
                                @csrf
                                <?php
                        if (isset($datos->foto)) {
                        ?> <img class="img-fluid " style="max-width: 300px;" id="imagen"
                                    src="{{ URL::asset('imagenes/' . $datos->user_id . '.jpeg') }}"
                                    alt="{{ $datos->foto }}">
                                <?php
                        } else { ?>
                                <img class="img-fluid " style="max-width: 300px;" id="imagen"
                                    src="{{ URL::asset('imagenes/logo.png') }}" alt="Imagen del diseño">
                                <?php
                        }
                        ?>
                                <label for="image">{{ __('Upload image') }}</label>
                                <input type="file" class="form-control-file" name="image" id="image">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-12">
                    <div class="d-flex flex-row justify-content-center align-items-center">
                        <div class="row">
                            <form action="escribir" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <label for="titulo">{{ __('Title') }}</label>
                                <input type="text" name="titulo" value="" class="form-control border-primary"><br>
                                <label for="editor1">{{ __('Text') }}</label>
                                <textarea name="editor1" id="editor1" class="form-control border-primary" rows="10" cols="80"></textarea>
                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>
                                <div class="d-flex justify-content-center">
                                <input type="submit" name="publicar" value="{{ __('Post') }}"
                                class="btn text-white rounded-pill px-4 py-0 bg-primary text-uppercase fs-5 mt-5">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Script para que funcione lo de añadir imagen-->
    <script>
        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#imagen').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
                // });
                // $('#image-upload').submit(function(e) {
                // e.preventDefault();
                //var formData = new FormData(this);
                var formData = new FormData($('#image-upload')[0]);
                $.ajax({
                    type: 'POST',
                    url: "{{ url('upload') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $('#image-upload')[0].reset();
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
@endsection
