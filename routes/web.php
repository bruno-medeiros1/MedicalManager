<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/consultas/index', function () {
    if (Auth::check()) {
        return view('/consultas/index');
    }
    return view('/includes/error');
});

Route::get('/especialidades/index', function () {
    if (Auth::check()) {
        return view('/especialidades/index');
    }
    return view('/includes/error');
});

Route::get('/fichas/index', function () {
    if (Auth::check()) {
        return view('/fichas/index');
    }
    return view('/includes/error');
});

Route::get('/unidades/index', function () {
    if (Auth::check()) {
        return view('/unidades/index');
    }
    return view('/includes/error');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
