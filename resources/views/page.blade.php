@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">Site em manutenção</h1>
                    <p class="col-md-8 fs-4">O website ainda se encontra em fase de desenvolvimento</p>
                    <strong>Esperar...</strong>
                    <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
