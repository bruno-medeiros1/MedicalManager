@extends('layouts.default')
@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">

                <!--@if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif-->
                <div class="p-5 mb-4 bg-light rounded-3">
                    <div class="container-fluid py-5">
                        <h1 class="display-5 fw-bold">Site em manutenção</h1>
                        <p class="col-md-8 fs-4">O website ainda se encontra em fase de desenvolvimento</p>
                        <button class="btn btn-danger btn-lg" type="button">Esperar...</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

