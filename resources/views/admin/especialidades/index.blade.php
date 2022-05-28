@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row h-100">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 style="font-weight: bold;">Página Inicial</h2>

                            @can('criar-especialidades')
                                <a href="{{ URL::to("admin/especialidades/add") }}" class="btn btn-light btn-block btn-sm custom_message text-left" style="float:right;border-color: black;">Adicionar especialidade</a>
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
                                    <th class="text-center">Ação</th>
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

            </div>
        </div>
    </div>
@endsection
