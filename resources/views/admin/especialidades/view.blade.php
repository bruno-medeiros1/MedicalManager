@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row flex-lg-row-reverse align-items-center g-5 py-5 h-40">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="{{ asset('Images/especialidades_background.png') }}" class="d-block mx-lg-auto img-fluid" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Visualizar especialidade</h1>

            <form>
                @csrf
                <div class="form-group mt-4">
                    <label for="">Nome</label>
                    <input disabled type="text" class="form-control" name="name" placeholder="Insira um nome para a consulta" value="{{ $especialidade->name}}">
                </div>

                <div class="form-group mt-4">
                    <label for="">Descrição</label>
                    <textarea disabled type="text" class="form-control" placeholder="Insira uma descrição"  name="description" style="height: 150px;">{{ $especialidade->description }}</textarea>
                </div>

                <div class="form-group mt-4" >
                    <a href="{{ URL::to("admin/especialidades/index") }}" class="btn btn-primary">Voltar</a>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
