@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row h-100">
            <div class="col-3 shadow p-3">
                <nav id="sidebar">
                    <span style="color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 300;font-size: 24px;display: table;margin: 0 auto;">Consultas<hr></span>

                    <ul style="display:inline-table;" class="nav nav-pills nav-stacked ms-4 mt-3" >
                        <li class="mt-3 justify-content-center">
                            <a class="nav-link px-2 link-secondary active " aria-current="page" href="{{ URL::to("/consultas/index")}}">Adicionar consulta</a>
                        </li>
                        <li class="mt-3">
                            <a class="nav-link px-2 link-secondary " aria-current="page" href="{{ URL::to("/consultas/edit")}}">Editar consulta</a>
                        </li>
                        <li class="mt-3">
                            <a class="nav-link px-2 link-secondary " aria-current="page" href="{{ URL::to("/consultas/delete")}}">Apagar consulta</a>
                        </li>
                        <li class="mt-3">
                            <a class="nav-link px-2 link-secondary " aria-current="page" href="{{ URL::to("/consultas/list")}}">Visualizar consultas</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-9">
                <!-- CREATE CONSULTA-->
            </div>
        </div>
    </div>
@endsection
