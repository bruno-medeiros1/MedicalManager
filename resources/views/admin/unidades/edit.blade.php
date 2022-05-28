@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row flex-lg-row-reverse align-items-center g-5 py-5 h-40">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="{{ asset('Images/unidades_background.png') }}" class="d-block mx-lg-auto img-fluid" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Editar unidade</h1>

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
@endsection
