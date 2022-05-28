@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row flex-lg-row-reverse align-items-center g-5 py-5 h-40">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="{{ asset('Images/especialidades_background.png') }}" class="d-block mx-lg-auto img-fluid" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Editar especialidade</h1>

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
@endsection
