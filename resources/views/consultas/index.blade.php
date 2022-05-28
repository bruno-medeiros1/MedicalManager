@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row h-100">
            <div class="col-3 shadow p-3">
                <nav id="sidebar">
                    <span style="color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 300;font-size: 24px;display: table;margin: 0 auto;">Consultas<hr></span>

                    <ul style="display:inline-table;" class="nav nav-pills nav-stacked ms-4 mt-3" >
                        <li class="mt-3 justify-content-center">
                            <a class="nav-link px-2 link-secondary " aria-current="page">Visualizar consulta</a>
                        </li>
                        <li class="mt-3">
                            <a class="nav-link px-2 link-secondary " aria-current="page">Adicionar consulta</a>
                        </li>
                        <li class="mt-3">
                            <a class="nav-link px-2 link-secondary " aria-current="page">Editar consulta</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-9">

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 style="font-weight: bold;">Página Inicial</h2>

                            @can('criar-consultas')
                                <a href="{{ URL::to("/consulta/add") }}" class="btn btn-light btn-block btn-sm custom_message text-left" style="float:right;border-color: black;">Adicionar consulta</a>
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
                                    <th class="text-center">Descrição</th>
                                    <th class="text-center">Data</th>
                                    <th class="text-center">Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($consultas as $consulta)
                                    <tr class="text-center">
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{ $consulta->name }}</td>
                                        <td class="text-center">{{ $consulta->description }}</td>
                                        <td class="text-center">{{ $consulta->date }}</td>
                                        <td class="text-center">
                                            @can('lista-consultas')
                                                <a class="btn btn-light" href="{{ URL::to("/consulta/view", $consulta->id) }}" class="btn btn-sm btn-outline-dark py-0">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                            @endcan
                                            @can('editar-consultas')
                                                <a class="btn btn-light" href="{{ URL::to("/consulta/edit", $consulta->id) }}" class="btn btn-sm btn-outline-dark py-0">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                            @endcan
                                            @can('apagar-consultas')
                                                <a class="btn btn-light" href="{{ URL::to("/consulta/delete", $consulta->id) }}" class="btn btn-sm btn-outline-danger py-0">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <p> Não existem registos de consultas.</p>
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
