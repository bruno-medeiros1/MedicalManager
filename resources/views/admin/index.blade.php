@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">
                <span style="color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 300;font-size: 45px;display: table;margin: 0 auto;">Opções de Administrador<hr></span>
            </div>
        </div>

        <div class="row shadow-sm">
            <div class="col-3">
                <div class="card mt-4 mb-4 ms-3" >
                    <img style="width:150px;height:150px; object-fit:cover; border-radius:30px" src="{{ asset('Images/especialidades.png') }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Especialidades Médicas</h5>
                        <p class="card-text">Aqui poderás desde criar, editar, apagar e visualizar todas as especialidades médicas existentes.</p>
                        @can('index-especialidades')
                            <a href="{{ URL::to("/admin/especialidades/index")}}" class="btn btn-primary">Configurar</a>
                        @else
                            <a href="{{ URL::to("")}}" class="btn btn-primary">Configurar</a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card mt-4 mb-4">
                    <img style="width:150px;height:150px; object-fit:cover; border-radius:30px" src="{{ asset('Images/unidades.png') }}" class="card-img-top" height="200px" >
                    <div class="card-body">
                        <h5 class="card-title">Unidades de Saúde</h5>
                        <p class="card-text">Aqui poderás desde criar, editar, apagar e visualizar todas as unidades de saúde existentes.</p>

                        @can('index-unidades-de-saude')
                            <a href="{{ URL::to("/admin/unidades/index")}}" class="btn btn-primary">Configurar</a>
                        @else
                            <a href="{{ URL::to("")}}" class="btn btn-primary">Configurar</a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card mt-4 mb-4">
                    <img style="width:150px;height:150px; object-fit:cover; border-radius:30px" src="{{ asset('Images/pessoal.png') }}" class="card-img-top" height="200px" >
                    <div class="card-body">
                        <h5 class="card-title">Pessoal Médico</h5>
                        <p class="card-text">Aqui poderás desde criar, editar, apagar e visualizar todo o pessoal médico existente na aplicação.</p>

                        @can('index-pessoal-medico')
                            <a href="{{ URL::to("/admin/pessoal/index")}}" class="btn btn-primary">Configurar</a>
                        @else
                            <a href="{{ URL::to("")}}" class="btn btn-primary">Configurar</a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card mt-4 mb-4">
                    <img style="width:150px;height:150px; object-fit:cover; border-radius:30px" src="{{ asset('Images/tipos.png') }}" class="card-img-top" height="200px" >
                    <div class="card-body">
                        <h5 class="card-title">Tipo de Pessoal Médico</h5>
                        <p class="card-text">Aqui poderás desde criar, editar, apagar e visualizar todo os tipos de pessoal médico existentes.</p>

                        @can('index-tipos-de-pessoal-medico')
                            <a href="{{ URL::to("/admin/tipo/index")}}" class="btn btn-primary">Configurar</a>
                        @else
                            <a href="{{ URL::to("")}}" class="btn btn-primary">Configurar</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
