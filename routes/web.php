<?php

use App\Http\Controllers\ConsultasController;

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

/*
Route::get('/consultas/index', function () {
    if (Auth::check()) {
        return view('/consultas/index');
    }
    return view('/includes/error');
});
*/

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

//***********************************************************

// Rotas ConsultasController.php

Route::get('/consulta/add', 'ConsultasController@add_consult_form')->name('consulta.add');
Route::post('/consulta/save', 'ConsultasController@submit_consult_data')->name('consulta.save');
Route::get('/consulta/index', 'ConsultasController@fetch_all_consults')->name('consulta.index');
Route::get('/consulta/edit/{consulta}', 'ConsultasController@edit_consult_form')->name('consulta.edit');
Route::patch('/consulta/update/{consulta}', 'ConsultasController@edit_consult_form_submit')->name('consulta.update');
Route::get('/consulta/view/{consulta}', 'ConsultasController@view_single_consult')->name('consulta.view');
Route::get('/consulta/delete/{consulta}', 'ConsultasController@delete_consult')->name('consulta.delete');
