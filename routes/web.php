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

Route::get('/admin/index', function () {
    if (Auth::check()) {
        return view('/admin/index');
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

//***********************************************************



//***********************************************************

// Rotas EspecialidadesController.php

Route::get('admin/especialidades/add', 'EspecialidadesController@add_specialty_form')->name('admin.especialidades.add');
Route::post('admin/especialidades/save', 'EspecialidadesController@submit_specialty_data')->name('admin.especialidades.save');
Route::get('admin/especialidades/index', 'EspecialidadesController@fetch_all_specialties')->name('admin.especialidades.index');
Route::get('admin/especialidades/edit/{especialidade}', 'EspecialidadesController@edit_specialty_form')->name('admin.especialidades.edit');
Route::patch('admin/especialidades/update/{especialidade}', 'EspecialidadesController@edit_specialty_form_submit')->name('admin.especialidades.update');
Route::get('admin/especialidades/view/{especialidade}', 'EspecialidadesController@view_single_specialty')->name('admin.especialidades.view');
Route::get('admin/especialidades/delete/{especialidade}', 'EspecialidadesController@delete_specialty')->name('admin.especialidades.delete');

//***********************************************************

// Rotas UnidadesDeSaudeController.php

Route::get('admin/unidades/add', 'UnidadesDeSaudeController@add_health_center_form')->name('admin.unidades.add');
Route::post('admin/unidades/save', 'UnidadesDeSaudeController@submit_health_center_data')->name('admin.unidades.save');
Route::get('admin/unidades/index', 'UnidadesDeSaudeController@fetch_all_health_centers')->name('admin.unidades.index');
Route::get('admin/unidades/edit/{unidade}', 'UnidadesDeSaudeController@edit_health_center_form')->name('admin.unidades.edit');
Route::patch('admin/unidades/update/{unidade}', 'UnidadesDeSaudeController@edit_health_center_form_submit')->name('admin.unidades.update');
Route::get('admin/unidades/view/{unidade}', 'UnidadesDeSaudeController@view_single_health_center')->name('admin.unidades.view');
Route::get('admin/unidades/delete/{unidade}', 'UnidadesDeSaudeController@delete_health_center')->name('admin.unidades.delete');

//***********************************************************


//***********************************************************

// Rotas UserController.php

Route::get('admin/pessoal/create', 'UserController@create')->name('admin.pessoal.create');
Route::post('admin/pessoal/store', 'UserController@submit')->name('admin.pessoal.store');
Route::get('admin/pessoal/index', 'UserController@index')->name('admin.pessoal.index');
Route::get('admin/pessoal/edit/{pessoa}', 'UserController@edit')->name('admin.pessoal.edit');
Route::patch('admin/pessoal/update/{pessoa}', 'UserController@update')->name('admin.pessoal.update');
Route::get('admin/pessoal/show/{pessoa}', 'UserController@show')->name('admin.pessoal.show');
Route::get('admin/pessoal/destroy/{pessoa}', 'UserController@destroy')->name('admin.pessoal.destroy');

//***********************************************************

//***********************************************************

// Rotas RoleController.php

Route::get('admin/tipo/create', 'RoleController@create')->name('admin.tipo.create');
Route::post('admin/tipo/store', 'RoleController@submit')->name('admin.tipo.store');
Route::get('admin/tipo/index', 'RoleController@index')->name('admin.tipo.index');
Route::get('admin/tipo/edit/{role}', 'RoleController@edit')->name('admin.tipo.edit');
Route::patch('admin/tipo/update/{role}', 'RoleController@update')->name('admin.tipo.update');
Route::get('admin/tipo/show/{role}', 'RoleController@show')->name('admin.tipo.show');
Route::get('admin/tipo/destroy/{role}', 'RoleController@destroy')->name('admin.tipo.destroy');

//***********************************************************


