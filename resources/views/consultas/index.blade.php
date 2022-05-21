@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row h-100">
            <div class="col-3 shadow p-3">
                <nav id="sidebar">
                    <span style="color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 300;font-size: 24px;display: table;margin: 0 auto;">Consultas<hr></span>

                    <ul style="display:inline-table;" class="nav nav-pills nav-stacked ms-4 mt-3" >
                        <li class="mt-3 justify-content-center">
                            <a class="nav-link px-2 link-secondary " aria-current="page" href="{{ URL::to("/consulta/list")}}">Visualizar consulta</a>
                        </li>
                        <li class="mt-3">
                            <a class="nav-link px-2 link-secondary " aria-current="page" href="{{ URL::to("/consulta/create")}}">Adicionar consulta</a>
                        </li>
                        <li class="mt-3">
                            <a class="nav-link px-2 link-secondary " aria-current="page" href="{{ URL::to("/consulta/edit")}}">Editar consulta</a>
                        </li>
                        <li class="mt-3">
                            <a class="nav-link px-2 link-secondary " aria-current="page" href="{{ URL::to("/consulta/delete")}}">Apagar consulta</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-9">
                <!-- LIST Consulta-->

                <h2>Listagem das consultas</h2><br>

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
                                <a href="{{ URL::to("/consulta/edit", $consulta->id) }}" class="btn btn-sm btn-outline-dark py-0">Editar</a>
                                <a href="{{ URL::to("/consulta/edit", $consulta->id) }}" class="btn btn-sm btn-outline-dark py-0">Visualizar</a>
                                <a href="{{ URL::to("/consulta/edit", $consulta->id) }}" class="btn btn-sm btn-outline-danger py-0">Apagar</a>
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
@endsection
