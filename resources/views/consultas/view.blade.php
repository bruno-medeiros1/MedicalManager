@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row h-100">
            <div class="col-3 shadow p-3">
                <nav id="sidebar">
                    <span style="color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 300;font-size: 24px;display: table;margin: 0 auto;">Consultas<hr></span>

                    <ul style="display:inline-table;" class="nav nav-pills nav-stacked ms-4 mt-3" >
                        <li class="mt-3 justify-content-center">
                            <a class="nav-link px-2 link-secondary active" aria-current="page" href="{{ URL::to("/consulta/list")}}">Visualizar consulta</a>
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

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 style="font-weight: bold;">Visualizar Consulta</h2>

                            <form>
                                @csrf
                                <div class="form-group mt-4">
                                    <label for="">Nome</label>
                                    <input disabled type="text" class="form-control" name="name" placeholder="Insira um nome para a consulta" value="{{ $consulta->name}}">
                                </div>

                                <div class="form-group mt-4">
                                    <label for="">Descrição</label>
                                    <textarea disabled type="text" class="form-control" placeholder="Insira uma descrição"  name="description" style="height: 150px;">{{ $consulta->description }}</textarea>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="">Data</label>
                                    <input disabled type="datetime-local" class="form-control" name="date"  value="{{ $consulta->date }}">
                                </div>

                                <div class="form-group mt-4" >
                                    <a href="{{ URL::to("/consulta/index") }}" class="btn btn-primary">Voltar</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
