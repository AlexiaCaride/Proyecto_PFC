<html>

<head>
    <title>InkSpell | @yield('titulo')</title>
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400&family=Vibur&display=swap"
        rel="stylesheet">
    <link rel="icon" href="{{ asset('imagenes/favicon.ico') }}">
</head>

<body style="background-color: #fcf5f6">
    @include('layouts.cabecera')
    @include('layouts.menu')
    @yield('corpo')
    @include('layouts.pie')
</body>

</html>
