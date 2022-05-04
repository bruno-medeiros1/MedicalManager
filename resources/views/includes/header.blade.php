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
    <nav class="navbar navbar-expand-sm navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <a href="/MedicalManager/public" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">

                    <!-- As imagens devem ser inseridas na pasta public-->
                    <img src="{{ asset('Images/medical_icon.png') }}" alt="medicalManager" width="50" height="50">
                    <span class="fs-3" style="font-weight: bold;">Medical Manager</span>

                    @guest
                    @else
                        <ul class="nav nav-pills col-12 col-lg-auto me-lg-auto ps-3">
                            <li class="nav-item">
                                @if(Request::url() === 'http://localhost/MedicalManager/public/consultas/index')
                                    <a class="nav-link px-2 link-secondary active" aria-current="page" href="/MedicalManager/public/consultas/index">Consultas</a>
                                @else
                                    <a class="nav-link px-2 link-secondary " aria-current="page" href="/MedicalManager/public/consultas/index">Consultas</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if(Request::url() === 'http://localhost/MedicalManager/public/fichas/index')
                                    <a class="nav-link px-2 link-secondary active" aria-current="page" href="/MedicalManager/public/fichas/index">Fichas Médicas</a>
                                @else
                                    <a class="nav-link px-2 link-secondary " aria-current="page" href="/MedicalManager/public/fichas/index">Fichas Médicas</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if(Request::url() === 'http://localhost/MedicalManager/public/mapas/index')
                                    <a class="nav-link px-2 link-secondarya active" aria-current="page" href="/MedicalManager/public/mapas/index">Mapas de Análise</a>
                                @else
                                    <a class="nav-link px-2 link-secondary" aria-current="page" href="/MedicalManager/public/mapas/index">Mapas de Análise</a>
                                @endif
                            </li>
                        </ul>
                    @endguest

                </a>
            </a>

            <!-- Right Side Of Navbar -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" data-dashlane-rid="f6cde14e05fb383f" data-form-type="">
                    <input type="search" class="form-control" placeholder="Pesquisar..." aria-label="Search" data-dashlane-rid="be0bba0efa9b9f87" data-form-type="">
                </form>

                <ul class="navbar-nav ">
                    <!-- Não Autenticado -->
                    @guest

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registar') }}</a>
                            </li>
                        @endif
                    @else
                    <!-- Autenticado -->
                        <div class="dropdown text-end">
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                <li><a class="dropdown-item" href="/MedicalManager/public/admin/index">Admin</a></li>
                                <li><a class="dropdown-item" href="#">Definições</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Terminar Sessão
                                        <i class="bi bi-box-arrow-in-right"></i>
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


