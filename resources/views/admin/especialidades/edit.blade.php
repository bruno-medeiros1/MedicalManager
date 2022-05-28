@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row h-100">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 style="font-weight: bold;">Editar Especialidade</h2>

                            <form action="{{ URL::to("admin/especialidades/update", $especialidade->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-group mt-4">
                                    <label for="">Nome</label>
                                    <input type="text" class="form-control" name="name" placeholder="Insira um nome para a especialidade" value="{{ $especialidade->name}}">
                                    <font style="color:red"> {{ $errors->has('name') ?  $errors->first('name') : '' }} </font>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="">Descrição</label>
                                    <textarea type="text" class="form-control" placeholder="Insira uma descrição"  name="description" style="height: 150px;">{{ $especialidade->description }}</textarea>
                                    <font style="color:red"> {{ $errors->has('description') ?  $errors->first('description') : '' }} </font>
                                </div>

                                <div class="form-group mt-4" >
                                    <input type="submit" class="btn btn-primary" value="Atualizar">
                                    <a href="{{ URL::to("admin/especialidades/index") }}" class="btn btn-danger">Cancelar</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
