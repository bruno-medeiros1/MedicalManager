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

// ConsultasController.php

Route::get('/consulta', 'ConsultasController@add_customer_form')->name('consulta.add');
Route::post('/consulta', 'ConsultasController@submit_customer_data')->name('consulta.save');


//  Está a dar
Route::get('/consulta/index', 'ConsultasController@fetch_all_customer')->name('consulta.index');
Route::get('/consulta/edit/{consulta}', 'ConsultasController@edit_customer_form')->name('consulta.edit');



Route::patch('/consulta/edit/{consulta}', 'ConsultasController@edit_customer_form_submit')->name('consulta.update');
Route::get('/consulta/{consulta}', 'ConsultasController@view_single_customer')->name('consulta.view');
Route::delete('/consulta/{consulta}', 'ConsultasController@delete_customer')->name('consulta.delete');
