@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pessoal Médico</h2>
            </div>
            @can('criar-pessoal-medico')
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.pessoal.create') }}"> Criar novo utilizador</a>
            </div>
            @endcan
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Cargo</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <p class="btn btn-info btn-block btn-sm text-left">{{ $v }}</p>
                        @endforeach
                    @endif
                </td>
                <td>
                    @can('lista-pessoal-medico')
                    <a class="btn btn-light" href="{{ route('admin.pessoal.show',$user->id) }}"class="btn btn-sm btn-outline-danger py-0">
                        <i class="bi bi-eye-fill"></i>
                    </a>
                    @endcan
                    @can('editar-pessoal-medico')
                    <a class="btn btn-light" href="{{ route('admin.pessoal.edit',$user->id) }}"class="btn btn-sm btn-outline-dark py-0">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    @endcan
                    @can('apagar-pessoal-medico')
                    <a class="btn btn-light" href="{{ route('admin.pessoal.destroy', $user->id) }}" class="btn btn-sm btn-outline-danger py-0">
                        <i class="bi bi-trash-fill"></i>
                    </a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>
    {!! $data->render() !!}

@endsection
