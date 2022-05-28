@extends('layouts.app')


@section('content')
<div class="container">

    <div class="row flex-lg-row-reverse align-items-center g-5 py-1 h-40">

        <div class="col-10 col-sm-8 col-lg-6">
            <img src="{{ asset('Images/pessoal_background.png') }}" class="d-block mx-lg-auto img-fluid" loading="lazy">
        </div>

        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Pessoal Médico</h1>
            <p class="lead">São considerados profissionais da saúde toda pessoa que trabalha em uma profissão relacionada às ciências da saúde. Entre os diversos profissionais da área incluem-se os biólogos, nutricionistas, médicos, enfermeiros, fisioterapeutas, etc...</p>
            <p class="lead" style="font-style: italic;">Aqui poderás criar pessoal médico, editar, visualizar e apagar.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">

                @can('criar-pessoal-medico')
                    <a href="{{ URL::to("/admin/pessoal/create") }}" type="button" class="btn btn-primary btn-lg px-4 me-md-2">Adicionar</a>
                @endcan

                <a href="{{ URL::to("/home") }}"  type="button" class="btn btn-outline-secondary btn-lg px-4">Início</a>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2 style="font-weight: bold;">Pessoal Médico</h2><br>

            @if ($message = Session::get('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        </div>
    </div>


    <div class="row">
        <div class="col-12">
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
        </div>
    </div>

@endsection
