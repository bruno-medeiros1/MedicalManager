@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tipo de pessoal médico</h2>
            </div>
            <div class="pull-right">
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('admin.tipo.create') }}"> Criar novo cargo</a>
                @endcan
            </div>
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
            <th width="280px">Ação</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-light" href="{{ route('admin.tipo.show',$role->id) }}"class="btn btn-sm btn-outline-danger py-0">
                        <i class="bi bi-eye-fill"></i>
                    </a>
                    @can('role-edit')
                        <a class="btn btn-light" href="{{ route('admin.tipo.edit',$role->id) }}"class="btn btn-sm btn-outline-dark py-0">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                    @endcan
                    @can('role-delete')
                        <a class="btn btn-light" href="{{ route('admin.tipo.destroy', $role->id) }}" class="btn btn-sm btn-outline-danger py-0">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>


    {!! $roles->render() !!}

@endsection
