<html>

<head>
    <title>Sitio web | @yield('titulo','InkSpell')</title>
    <link rel="stylesheet" href="{{URL::asset('css/custom.css')}}" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    
        <div class="row">
            @include('layouts.menu')
        </div>
    <div class="container">
        <div class="row mt-3 alto">
            @yield('corpo')
        </div>
    </div>
        <div class="row">
            @include('layouts.pie')
        </div>
        <script src='app.js'></script>
    
</body>

</html>