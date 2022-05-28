@extends('layouts.app')


@section('content')
<div class="container">

    <div class="row flex-lg-row-reverse align-items-center g-5 py-5 h-40">

        <div class="col-10 col-sm-8 col-lg-6">
            <img src="{{ asset('Images/pessoal_background.png') }}" class="d-block mx-lg-auto img-fluid" loading="lazy">
        </div>

        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Editar pessoal</h1>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Houve algum problema com os dados que inseris-te.<br><br>
                </div>
            @endif

            {!! Form::model($user, ['method' => 'PATCH','route' => ['admin.pessoal.update', $user->id]]) !!}
            <div class="row">

                    <div class="form-group">
                        <strong>Nome:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        <font style="color:red"> {{ $errors->has('name') ?  $errors->first('name') : '' }} </font>
                    </div>


                    <div class="form-group mt-4">
                        <strong>Email:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                        <font style="color:red"> {{ $errors->has('email') ?  $errors->first('email') : '' }} </font>
                    </div>

                    <div class="form-group mt-4">
                        <strong>Password:</strong>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                        <font style="color:red"> {{ $errors->has('password') ?  $errors->first('password') : '' }} </font>
                    </div>

                    <div class="form-group mt-4">
                        <strong>Confirmar Password:</strong>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                        <font style="color:red"> {{ $errors->has('confirm-password') ?  $errors->first('confirm-password') : '' }} </font>
                    </div>

                    <div class="form-group mt-4">
                        <strong>Role:</strong>
                        {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                    </div>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Guardar alterações</button>
                    <a href="{{ URL::to("admin/pessoal/index") }}" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
