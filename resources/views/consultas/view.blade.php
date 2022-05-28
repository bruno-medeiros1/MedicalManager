@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row h-100">
            <div class="col-12">
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
