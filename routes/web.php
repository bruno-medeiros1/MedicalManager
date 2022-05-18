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

Route::get('/admin/index', function () {
    if (Auth::check()) {
        return view('/admin/index');
    }
    return view('/includes/error');
});

Route::get('/admin/especialidades/index', function () {
    if (Auth::check()) {
        return view('/admin/especialidades/index');
    }
    return view('/includes/error');
});

Route::get('/admin/unidades/index', function () {
    if (Auth::check()) {
        return view('/admin/unidades/index');
    }
    return view('/includes/error');
});

Route::get('/admin/pessoal/index', function () {
    if (Auth::check()) {
        return view('/admin/pessoal/index');
    }
    return view('/includes/error');
});

Route::get('/admin/tipo/index', function () {
    if (Auth::check()) {
        return view('/admin/tipo/index');
    }
    return view('/includes/error');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
