<div class="elementos-menu bg-secondary d-flex m-0">
    <div class="col-12 col-lg-12 col-sm-12">
        <div class="row">
            <div class="col-2 text-center  py-2">
                <a href="/"><img class="img-fluid" src="{{ URL::asset('imagenes/logo.png') }}"></a>
            </div>
            <div class="col-10">
                <ul class="nav mx-2 fw-bold">
                    <div class="col-2 py-3 px-1">
                        <li class="nav-item">
                            <a class="nav-link text-white text-center" href="/nosotros">
                                <h3 style="font-size: 150%" class="text-uppercase">{{ __('About us') }}</h3>
                            </a>
                        </li>
                    </div>
                    <div class="col-2 py-3 px-1">
                        <li class="nav-item">
                            <a class="nav-link text-white text-center" href="/tienda">
                                <h3 style="font-size: 150%" class="text-uppercase">{{ __('Shop') }}</h3>
                            </a>
                        </li>
                    </div>
                    <div class="col-2 py-3 px-1">
                        <li class="nav-item">
                            <a class="nav-link text-white text-center" href="/crear">
                                <h3 style="font-size: 150%" class="text-uppercase">{{ __('Create your design') }}</h3>
                            </a>
                        </li>
                    </div>
                    <div class="col-2 py-3 px-1">
                        <li class="nav-item">
                            <a class="nav-link text-white text-center" href="/contacto">
                                <h3 style="font-size: 150%" class="text-uppercase">{{ __('Commissions') }}</h3>
                            </a>
                        </li>
                    </div>
                    <div class="col-2 py-3 px-1">
                        <li class="nav-item">
                            <a class="nav-link text-white text-center" href="/noticias">
                                <h3 style="font-size: 150%" class="text-uppercase">{{ __('News') }}</h3>
                            </a>
                        </li>
                    </div>
                    <div class="col-1 text-center py-3 px-1">
                        <li class="nav-item">
                            <?php if (!Auth::check()) { ?>
                            <!--Si no esta autenticado carga esta opcion-->
                            <a class='nav-link' href='/login'><img
                                    src="{{ URL::asset('imagenes/iconos/circle-user-solid.png') }}"></a>
                            <?php
                                    } else {
                                        if(auth()->user()->tipo=='admin'){?>
                            <!--Si esta autenticado y es admin carga esta opcion-->
                            <a class='nav-link fs-3 text-white' id='navbarDropdownMenuLink' role='button'
                                data-bs-toggle='dropdown' aria-expanded='false'><img
                                    src="{{ URL::asset('imagenes/iconos/circle-user-solid.png') }}"></a>
                            <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                                <li>
                                    <p class="fw-bold text-center">{{ __('Administration') }}</p>
                                </li>
                                <li><a class='dropdown-item' href='/escribir'>{{ __('Write') }}</a></li>
                                <li><a class='dropdown-item' href='/administrar/usuarios'>{{ __('Users') }}</a>
                                </li>
                                <li><a class='dropdown-item' href='/administrar/productos'>{{ __('Products') }}</a>
                                </li>
                                <li><a class='dropdown-item' href='/administrar/contacto'>{{ __('Messages') }}</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class='dropdown-item'
                                        href="/perfil/{{ auth()->id() }}">{{ __('My profile') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>

                            <?php
                                        }else{
                                        ?>
                            <!--Si esta autenticado y es usuario carga esta opcion-->
                            <a class='nav-link fs-3 text-white' id='navbarDropdownMenuLink' role='button'
                                data-bs-toggle='dropdown' aria-expanded='false'><img
                                    src="{{ URL::asset('imagenes/iconos/circle-user-solid.png') }}"></a>
                            <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                                <li><a class='dropdown-item'
                                        href="/perfil/{{ auth()->id() }}">{{ __('My profile') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                            <?php } 
                                    }?>
                        </li>
                    </div>
                    <div class="col-1 text-center py-4 px-1">
                        <li class="nav-item">
                            <a href='/cesta/{{ auth()->id() }}'><img
                                    src="{{ URL::asset('imagenes/iconos/basket-shopping-solid.png') }}"></a>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
