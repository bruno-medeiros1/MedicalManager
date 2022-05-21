@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row h-100">
            <div class="col-3 shadow p-3">
                <nav id="sidebar">
                    <span style="color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 300;font-size: 24px;display: table;margin: 0 auto;">Consultas<hr></span>

                    <ul style="display:inline-table;" class="nav nav-pills nav-stacked ms-4 mt-3" >
                        <li class="mt-3 justify-content-center">
                            <a class="nav-link px-2 link-secondary" aria-current="page" href="{{ URL::to("/consultas/index")}}">Adicionar consulta</a>
                        </li>
                        <li class="mt-3">
                            <a class="nav-link px-2 link-secondary active " aria-current="page" href="{{ URL::to("/consultas/edit")}}">Editar consulta</a>
                        </li>
                        <li class="mt-3">
                            <a class="nav-link px-2 link-secondary " aria-current="page" href="{{ URL::to("/consultas/delete")}}">Apagar consulta</a>
                        </li>
                        <li class="mt-3">
                            <a class="nav-link px-2 link-secondary " aria-current="page" href="{{ URL::to("/consultas/list")}}">Visualizar consultas</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-9">

                <form action="{{ URL::to("/consultas/update") }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" class="form-control" name="name" value="{{ $consulta->name}}">
                        <font style="color:red"> {{ $errors->has('name') ?  $errors->first('name') : '' }} </font>
                    </div>

                    <div class="form-group">
                        <label for="">Descrição</label>
                        <input type="text" class="form-control" name="description" value="{{ $consulta->description }}">
                        <font style="color:red"> {{ $errors->has('email') ?  $errors->first('description') : '' }} </font>
                    </div>

                    <div class="form-group" style="margin-top: 24px;">
                        <input type="submit" class="btn btn-success" value="Atualizar"><br>
                        <a href="{{ URL::to("/consulta/index") }}">Voltar</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
