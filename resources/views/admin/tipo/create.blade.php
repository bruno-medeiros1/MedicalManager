@extends('layouts.app')


@section('content')
<div class="container">

    <div class="row flex-lg-row-reverse align-items-center g-5 py-5 h-40">

        <div class="col-10 col-sm-8 col-lg-6">
            <img src="{{ asset('Images/tipos_background.png') }}" class="d-block mx-lg-auto img-fluid" loading="lazy">
        </div>

        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Adicionar grupo</h1>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Houve algum problema com os dados que inseris-te.<br><br>
                </div>
            @endif


            {!! Form::open(array('route' => 'admin.tipo.store','method'=>'POST')) !!}

                <div class="form-group mt-4" >
                    <strong>Nome:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    <font style="color:red"> {{ $errors->has('name') ?  $errors->first('name') : '' }} </font>
                </div>


                <div class="form-group mt-4" >
                    <strong>Permissões:</strong>
                    <br/>
                    @foreach($permission as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}</label>
                    @endforeach
                    <font style="color:red"> {{ $errors->has('permission') ?  $errors->first('permission') : '' }} </font>
                </div>

                <div class="form-group mt-4" >
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                    <a href="{{ URL::to("admin/tipo/index") }}" class="btn btn-danger">Cancelar</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
