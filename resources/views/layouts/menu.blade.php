<div class="bg-light pb-4">
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="col-5">
        <ul class="nav">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <li class="mx-5">
                <a class="nav-link text-primary fs-3" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tienda</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="/tienda/camisetas">Camisetas</a></li>
                    <li><a class="dropdown-item" href="/tienda/tazas">Tazas</a></li>
                    <li><a class="dropdown-item" href="/tienda/prints">Prints</a></li>
                </ul>
            </li>
            <ul class="nav nav-fill mx-5">
                <li class="nav-item active">
                    <a class="nav-link  text-primary fs-3" href="/novedades">Novedades</a>
                </li>
            </ul>
        </div>
    </ul>
    </div>
    <div class="col-2">
            <a class="nav-link img-fluid" href="/home"><img src="{{URL::asset('imagenes/logo.png')}}" style="width: 200px;"></a>
    </div>
    <div class="col-5">
        <ul class="nav  justify-content-end">
            <li class="nav-item active mx-5">
                <a class="nav-link fs-3 text-secondary" href="/crear">Crea tu diseño</a>
            </li>
            <?php if (!Auth::check()) {
                echo "<li class='nav-item active mx-5'>
                    <a class='nav-link fs-3 text-secondary' href='/login'>Acceder</a>
                </li>" ;
            }else{
                echo "<div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <li class='mx-5'>
                <a class='nav-link fs-3 text-secondary' id='navbarDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>NombreUsuario</a>
                <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                    <li><a class='dropdown-item' href=''>Mi perfil</a></li>
                    <li><a class='dropdown-item' href=''>Cesta</a></li>
                    <li><a class='dropdown-item' href=''>Salir</a></li>
                </ul>
            </li>" ;
            }?>
        </ul>
    </div>
</nav>
</div>