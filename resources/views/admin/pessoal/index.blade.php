@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row h-100">
            <div class="col-3 shadow p-3">
                <nav id="sidebar">
                    <span style="color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 300;font-size: 24px;display: table;margin: 0 auto;">Pessoal Médico<hr></span>

                    <ul style="display:inline-table;" class="nav nav-pills nav-stacked ms-4 mt-3" >
                        <li class="mt-3">
                            <a class="nav-link px-2 link-secondary active " aria-current="page" href="/MedicalManager/public/especialidades/index">Adicionar utilizador</a>
                        </li>
                        <li class="mt-3">
                            <a class="nav-link px-2 link-secondary " aria-current="page" href="/MedicalManager/public/especialidades/edit">Editar utilizador</a>
                        </li>
                        <li class="mt-3">
                            <a class="nav-link px-2 link-secondary " aria-current="page" href="/MedicalManager/public/especialidades/delete">Apagar utilizador</a>
                        </li>
                        <li class="mt-3">
                            <a class="nav-link px-2 link-secondary " aria-current="page" href="/MedicalManager/public/especialidades/list">Visualizar utilizadores</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="col-9 justify-content-center">
                <div class="p-5 mb-4 bg-light rounded-3">
                    <div class="container-fluid py-5">
                        <h1 class="display-5 fw-bold">Site em manutenção</h1>
                        <p class="col-md-8 fs-4">O website ainda se encontra em fase de desenvolvimento</p>
                        <strong>Esperar...</strong>
                        <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                    </div>
                </div>
            </div>
        </div>
@endsection
