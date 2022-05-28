@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">Bem-vindo</h1>
                    <p class="col-md-8 fs-4">Olá {{ Auth::user()->name }}! Este é um protótipo de um sistema de gestão de informação de pessoal médico contruído em Laravel usando a linguagem php. 💻 </p>
                    <button class="btn btn-dark btn-lg" type="button">Uau </button>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @guest
                            You are not logged in! :(
                    @else
                            You are logged in! :)
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
