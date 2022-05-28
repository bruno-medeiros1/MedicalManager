<!--
|--------------------------------------------------------------------------
| Header
|--------------------------------------------------------------------------
|
| Here is all the navbar code built
|
-->
<!DOCTYPE html>
<html>

<head>
    <style>
        .nav-pills > li > a.active {
            background-color: #1a4872 !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-dark text-white shadow-sm">
        <div class="container-fluid">
            <a href="{{ URL::to("/home")}}" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">

                <!-- As imagens devem ser inseridas na pasta public-->
                <img src="{{ asset('Images/medical_icon.png') }}" alt="medicalManager" width="50" height="50">
                <span class="fs-3" style="color:white;font-weight: bold;">Medical Manager</span>


            </a>

            <!-- Right Side Of Navbar -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

                @guest
                @else
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                        <input type="search" class="form-control" placeholder="Pesquisar..." aria-label="Search" >
                    </form>
                @endguest

                <ul class="navbar-nav ">
                    <!-- Não Autenticado -->
                    @guest

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }} "style="color:white;">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" style="color:white;">{{ __('Registar') }}</a>
                            </li>
                        @endif
                    @else

                        <li class="nav-item" style="padding-right: 15px;">
                            🔔
                            <span class="badge rounded-pill badge-notification bg-danger">3</span>
                        <li>

                        <div class="dropdown text-end">
                            <a href="#" class="d-block link-white text-decoration-none text-white dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                                <span style="color:white;">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                @can('index-admin')
                                    <li><a class="dropdown-item" href="{{ URL::to("/admin/index")}} ">Admin</a></li>
                                @endcan
                                <li><a class="dropdown-item" href="#">Definições</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Terminar Sessão
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>


