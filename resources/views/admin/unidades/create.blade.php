@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row h-100">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 style="font-weight: bold;">Adicionar Unidade</h2>

                            <form action="{{ URL::to("admin/unidades/save") }}" method="post">
                                @csrf
                                <div class="form-group mt-4">
                                    <label for="">Nome</label>
                                    <input type="text" class="form-control" placeholder="Insira o nome para a unidade" name="name" value="{{ old('name') }}">
                                    <font style="color:red"> {{ $errors->has('name') ?  $errors->first('name') : '' }} </font>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="">Localização</label>
                                    <input type="text" class="form-control" placeholder="Insira a localização da unidade" name="location" value="{{ old('location') }}">
                                    <font style="color:red"> {{ $errors->has('location') ?  $errors->first('location') : '' }} </font>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="">Região</label>
                                    <input type="text" class="form-control" placeholder="Insira a região da unidade" name="region" value="{{ old('region') }}">
                                    <font style="color:red"> {{ $errors->has('region') ?  $errors->first('region') : '' }} </font>
                                </div>

                                <div class="form-group mt-4" >
                                    <input type="submit" class="btn btn-primary" value="Adicionar">
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
