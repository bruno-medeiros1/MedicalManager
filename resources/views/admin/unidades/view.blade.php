@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row h-100">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 style="font-weight: bold;">Visualizar Unidade</h2>

                            <form>
                                @csrf
                                <div class="form-group mt-4">
                                    <label for="">Nome</label>
                                    <input disabled type="text" class="form-control" name="name" value="{{ $unidade->name}}">
                                </div>

                                <div class="form-group mt-4">
                                    <label for="">Localização</label>
                                    <input disabled type="text" class="form-control" name="name" value="{{ $unidade->location}}">
                                </div>

                                <div class="form-group mt-4">
                                    <label for="">Região</label>
                                    <input disabled type="text" class="form-control" name="name" value="{{ $unidade->region}}">
                                </div>

                                <div class="form-group mt-4" >
                                    <a href="{{ URL::to("admin/unidades/index") }}" class="btn btn-primary">Voltar</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
