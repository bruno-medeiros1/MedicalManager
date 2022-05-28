@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-12">
                <h2>Tipo De Pessoal Médico</h2>
                @can('criar-tipos-de-pessoal-medico')
                    <a href="{{ URL::to("admin.tipo.create") }}" class="btn btn-light btn-block btn-sm custom_message text-left" style="float:right;border-color: black;">Adicionar grupo de utilizador</a>
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
            <th width="280px">Ação</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    @can('lista-tipos-de-pessoal-medico')
                    <a class="btn btn-light" href="{{ route('admin.tipo.show',$role->id) }}"class="btn btn-sm btn-outline-danger py-0">
                        <i class="bi bi-eye-fill"></i>
                    </a>
                    @endcan
                    @can('editar-tipos-de-pessoal-medico')
                        <a class="btn btn-light" href="{{ route('admin.tipo.edit',$role->id) }}"class="btn btn-sm btn-outline-dark py-0">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                    @endcan
                    @can('apagar-tipos-de-pessoal-medico')
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
