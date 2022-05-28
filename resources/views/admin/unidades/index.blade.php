@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row flex-lg-row-reverse align-items-center g-5 py-1 h-40">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{ asset('Images/unidades_background.png') }}" class="d-block mx-lg-auto img-fluid" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Unidades de Saúde</h1>
                <p class="lead">Algumas funções são elaborar informação e planos em domínios da saúde pública, proceder à vigilância epidemiológica, gerir programas de intervenção no âmbito da prevenção, promoção e proteção da saúde da população em geral ou de grupos específicos e colaborar, de acordo com a legislação respetiva, no exercício das funções de autoridade de saúde.</p>
                <p class="lead" style="font-style: italic;">Aqui poderás criar unidades de saúde, editar, visualizar e apagar.</p>

                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    @can('criar-unidades-de-saude')
                        <a href="{{ URL::to("/admin/unidades/add") }}" type="button" class="btn btn-primary btn-lg px-4 me-md-2">Adicionar</a>
                    @endcan
                    <a href="{{ URL::to("/home") }}"  type="button" class="btn btn-outline-secondary btn-lg px-4">Início</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h2 style="font-weight: bold;">Lista de unidades</h2><br>

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
                        <th class="text-center">Localização</th>
                        <th class="text-center">Região</th>
                        <th class="text-center" style="width: 200px;">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($unidades as $unidade)
                        <tr class="text-center">
                            <td class="text-center">{{ $loop->index + 1 }}</td>
                            <td class="text-center">{{ $unidade->name }}</td>
                            <td class="text-center">{{ $unidade->location }}</td>
                            <td class="text-center">{{ $unidade->region }}</td>
                            <td class="text-center">
                                @can('lista-unidades-de-saude')
                                    <a href="{{ URL::to("admin/unidades/view", $unidade->id) }}" class="btn btn-sm btn-outline-dark py-0">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                @endcan
                                @can('editar-unidades-de-saude')
                                    <a href="{{ URL::to("admin/unidades/edit", $unidade->id) }}" class="btn btn-sm btn-outline-dark py-0">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                @endcan
                                @can('apagar-unidades-de-saude')
                                    <a href="{{ URL::to("admin/unidades/delete", $unidade->id) }}" class="btn btn-sm btn-outline-danger py-0">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <p> Não existem registos de unidades de saúde.</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
