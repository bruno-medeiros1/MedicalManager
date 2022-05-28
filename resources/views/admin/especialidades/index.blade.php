@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row flex-lg-row-reverse align-items-center g-5 py-1 h-40">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{ asset('Images/especialidades_background.png') }}" class="d-block mx-lg-auto img-fluid" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Especialidades Médicas</h1>
                <p class="lead">Uma especialidade médica é um ramo da prática médica que se concentra em um grupo definido de pacientes, doenças, habilidades ou filosofia.</p>
                <p class="lead" style="font-style: italic;">Aqui poderás criar especialidades médicas, editar, visualizar e apagar.</p>

                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    @can('criar-especialidades')
                        <a href="{{ URL::to("admin/especialidades/add") }}" type="button" class="btn btn-primary btn-lg px-4 me-md-2">Adicionar</a>
                    @endcan
                    <a href="{{ URL::to("/home") }}"  type="button" class="btn btn-outline-secondary btn-lg px-4">Início</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h2 style="font-weight: bold;">Lista de especialidades</h2><br>

                @if(session()->has('message'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('message') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center">No</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Descrição</th>
                        <th class="text-center" style="width: 200px;">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($especialidades as $especialidade)
                        <tr class="text-center">
                            <td class="text-center">{{ $loop->index + 1 }}</td>
                            <td class="text-center">{{ $especialidade->name }}</td>
                            <td class="text-center">{{ $especialidade->description }}</td>
                            <td class="text-center">
                                @can('lista-especialidades')
                                    <a href="{{ URL::to("admin/especialidades/view", $especialidade->id) }}" class="btn btn-sm btn-outline-dark py-0">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                @endcan
                                @can('editar-especialidades')
                                    <a href="{{ URL::to("admin/especialidades/edit", $especialidade->id) }}" class="btn btn-sm btn-outline-dark py-0">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                @endcan
                                @can('apagar-especialidades')
                                    <a href="{{ URL::to("admin/especialidades/delete", $especialidade->id) }}" class="btn btn-sm btn-outline-danger py-0">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <p> Não existem registos de especialidades.</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
