@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row h-100">
            <div class="col-12">

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 style="font-weight: bold;">Editar Consulta</h2>

                            <form action="{{ URL::to("/consulta/update", $consulta->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-group mt-4">
                                    <label for="">Nome</label>
                                    <input type="text" class="form-control" name="name" placeholder="Insira um nome para a consulta" value="{{ $consulta->name}}">
                                    <font style="color:red"> {{ $errors->has('name') ?  $errors->first('name') : '' }} </font>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="">Descrição</label>
                                    <textarea type="text" class="form-control" placeholder="Insira uma descrição"  name="description" style="height: 150px;">{{ $consulta->description }}</textarea>
                                    <font style="color:red"> {{ $errors->has('description') ?  $errors->first('description') : '' }} </font>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="">Data</label>
                                    <input type="datetime-local" class="form-control" name="date"  value="{{ $consulta->date }}">
                                    <font style="color:red"> {{ $errors->has('date') ?  $errors->first('date') : '' }} </font>
                                </div>

                                <div class="form-group mt-4" >
                                    <input type="submit" class="btn btn-primary" value="Atualizar">
                                    <a href="{{ URL::to("/consulta/index") }}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
