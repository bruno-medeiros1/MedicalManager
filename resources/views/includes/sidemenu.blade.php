<!DOCTYPE html>
<html>

<head>
    <style>

    </style>
</head>

<body>
    @guest
    @else
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="margin-left:-15px; width: 100%; height: 90vh;">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                @if(!Request::is('home'))
                    <a  href="{{ URL::to("/home") }}" class="nav-link text-white" aria-current="page">
                        <i class="bi bi-house-fill"></i>
                        Início
                    </a>
                @else
                    <a  href="{{ URL::to("/home") }}" class="nav-link active text-white" aria-current="page">
                        <i class="bi bi-house-fill"></i>
                        Início
                    </a>
                @endif
            </li>
            <li>
                @if(!Request::is('consulta/*'))
                    @can('index-consultas')
                        <a href="{{ URL::to("/consulta/index") }}"class="nav-link text-white">
                            <i class="bi bi-file-medical-fill"></i>
                            Consultas
                        </a>
                    @endcan
                @else
                    @can('index-consultas')
                        <a href="{{ URL::to("/consulta/index") }}"class="nav-link active text-white">
                            <i class="bi bi-file-medical-fill"></i>
                            Consultas
                        </a>
                    @endcan
                @endif
            </li>

            <li>
                @if(!Request::is('admin/especialidades/*'))
                    @can('index-especialidades')
                        <a href="{{ URL::to("/admin/especialidades/index") }}" class="nav-link text-white">
                            <i class="bi bi-clipboard2-pulse-fill"></i>
                            Especialidades
                        </a>
                    @endcan
                @else
                    @can('index-especialidades')
                        <a href="{{ URL::to("/admin/especialidades/index") }}" class="nav-link active text-white">
                            <i class="bi bi-clipboard2-pulse-fill"></i>
                            Especialidades
                        </a>
                    @endcan
                @endif
            </li>
            <li>
                @if(!Request::is('admin/unidades/*'))
                    @can('index-unidades-de-saude')
                        <a href="{{ URL::to("/admin/unidades/index") }}" class="nav-link text-white">
                            <i class="bi bi-hospital-fill"></i>
                            Unidades de saúde
                        </a>
                    @endcan
                @else
                    @can('index-unidades-de-saude')
                        <a href="{{ URL::to("/admin/unidades/index") }}" class="nav-link active text-white">
                            <i class="bi bi-hospital-fill"></i>
                            Unidades de saúde
                        </a>
                    @endcan
                @endif
            </li>
            <li>
                @if(!Request::is('admin/tipo/*'))
                    @can('index-tipos-de-pessoal-medico')
                        <a href="{{ URL::to("/admin/tipo/index") }}" class="nav-link text-white">
                            <i class="bi bi-people-fill"></i>
                            Grupos de utilizadores
                        </a>
                    @endcan
                @else
                    @can('index-tipos-de-pessoal-medico')
                        <a href="{{ URL::to("/admin/tipo/index") }}" class="nav-link active text-white">
                            <i class="bi bi-people-fill"></i>
                            Grupos de utilizadores
                        </a>
                    @endcan
                @endif
            </li>
            <li>
                @if(!Request::is('admin/pessoal/*'))
                    @can('index-pessoal-medico')
                        <a href="{{ URL::to("/admin/pessoal/index") }}" class="nav-link text-white">
                            <i class="bi bi-person-circle"></i>
                            Utilizadores
                        </a>
                    @endcan
                @else
                    @can('index-pessoal-medico')
                            <a href="{{ URL::to("/admin/pessoal/index") }}" class="nav-link active text-white">
                                <i class="bi bi-person-circle"></i>
                                Utilizadores
                            </a>
                    @endcan
                @endif
            </li>
        </ul>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
        </ul>
        <hr>
            <a>
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>{{ Auth::user()->roles->pluck('name') [0] ?? ''}}</strong>
            </a>
    </div>
    @endguest
</body>
</html>
