@extends('layouts.app')


@section('content')
<div class="container">

    <div class="row flex-lg-row-reverse align-items-center g-5 py-1 h-40">

        <div class="col-10 col-sm-8 col-lg-6">
            <img src="{{ asset('Images/tipos_background.png') }}" class="d-block mx-lg-auto img-fluid" loading="lazy">
        </div>

        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Grupos de Utilizador</h1>
            <p class="lead">Um grupo de utilizador refere-se à posição de um indivíduo. Cada pessoa na equipa precisa de ter um papel específico a desempenhar no projeto. Os papéis são criados com base na contribuição necessária da equipe para atingir as metas que eles estabeleceram.</p>
            <p class="lead" style="font-style: italic;">Aqui poderás criar grupos de utilizador, editar, visualizar e apagar.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">

                @can('criar-tipos-de-pessoal-medico')
                    <a href="{{ URL::to("/admin/tipo/create") }}" type="button" class="btn btn-primary btn-lg px-4 me-md-2">Adicionar</a>
                @endcan

                <a href="{{ URL::to("/home") }}"  type="button" class="btn btn-outline-secondary btn-lg px-4">Início</a>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <h2 style="font-weight: bold;">Lista de grupos</h2><br>

            @if ($message = Session::get('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        </div>
    </div>



    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nome</th>
                    <th width="280px">Ação</th>
                </tr>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @can('lista-tipos-de-pessoal-medico')
                                <a class="btn btn-light" href="{{ route('admin.tipo.show',$role->id) }}"class="btn btn-sm btn-outline-danger py-0">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                            @endcan
                            @can('editar-tipos-de-pessoal-medico')
                                <a class="btn btn-light" href="{{ route('admin.tipo.edit',$role->id) }}"class="btn btn-sm btn-outline-dark py-0">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                            @endcan
                            @can('apagar-tipos-de-pessoal-medico')
                                <a class="btn btn-light" href="{{ route('admin.tipo.destroy', $role->id) }}" class="btn btn-sm btn-outline-danger py-0">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $roles->render() !!}
        </div>
    </div>
@endsection
