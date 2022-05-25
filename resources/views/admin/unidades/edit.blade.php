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
                            <a class="nav-link px-2 link-secondary active" aria-current="page">Editar unidade</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-9">

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 style="font-weight: bold;">Editar Unidade</h2>

                            <form action="{{ URL::to("admin/unidades/update", $unidade->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-group mt-4">
                                    <label for="">Nome</label>
                                    <input type="text" class="form-control" name="name" placeholder="Insira o nome para a unidade" value="{{ $unidade->name}}">
                                    <font style="color:red"> {{ $errors->has('name') ?  $errors->first('name') : '' }} </font>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="">Localização</label>
                                    <input type="text" class="form-control" name="location" placeholder="Insira a localização para a unidade" value="{{ $unidade->location}}">
                                    <font style="color:red"> {{ $errors->has('location') ?  $errors->first('location') : '' }} </font>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="">Região</label>
                                    <input type="text" class="form-control" name="region" placeholder="Insira a região para a unidade" value="{{ $unidade->region}}">
                                    <font style="color:red"> {{ $errors->has('region') ?  $errors->first('region') : '' }} </font>
                                </div>

                                <div class="form-group mt-4" >
                                    <input type="submit" class="btn btn-primary" value="Atualizar">
                                    <a href="{{ URL::to("admin/unidades/index") }}" class="btn btn-danger">Cancelar</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
