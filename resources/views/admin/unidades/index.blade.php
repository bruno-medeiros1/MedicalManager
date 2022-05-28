@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row h-100">
            <div class="col-3 shadow p-3">
                <nav id="sidebar">
                    <span style="color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 300;font-size: 24px;display: table;margin: 0 auto;">Unidades de Saúde<hr></span>

                    <ul style="display:inline-table;" class="nav nav-pills nav-stacked ms-4 mt-3" >
                        <li class="mt-3 justify-content-center">
                            <a class="nav-link px-2 link-secondary " aria-current="page">Visualizar unidade</a>
                        </li>
                        <li class="mt-3">
                            <a class="nav-link px-2 link-secondary " aria-current="page">Adicionar unidade</a>
                        </li>
                        <li class="mt-3">
                            <a class="nav-link px-2 link-secondary " aria-current="page">Editar unidade</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-9">

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 style="font-weight: bold;">Página Inicial</h2>

                            @can('criar-unidades-de-saude')
                              <a href="{{ URL::to("admin/unidades/add") }}" class="btn btn-light btn-block btn-sm custom_message text-left" style="float:right;border-color: black;">Adicionar unidade</a>
                            @endcan

                            @if(session()->has('message'))
                                <p class="btn btn-success btn-block btn-sm custom_message text-left">{{ session()->get('message') }}</p><br>
                            @endif

                            <br>
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
                                    <th class="text-center">Ação</th>
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

            </div>
        </div>
    </div>
@endsection
