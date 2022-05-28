<?php

namespace App\Http\Controllers;

use App\Models\Especialidades;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;


class EspecialidadesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:lista-especialidades|criar-especialidades|editar-especialidades|apagar-especialidades', ['only' => ['index','store']]);
        $this->middleware('permission:criar-especialidades', ['only' => ['create','store']]);
        $this->middleware('permission:editar-especialidades', ['only' => ['edit','update']]);
        $this->middleware('permission:apagar-especialidades', ['only' => ['destroy']]);
    }

    public function add_specialty_form()
    {
        if (Auth::check()) {

            if( \View::exists('admin.especialidades.create') ){

                return view('admin.especialidades.create');
            }
        }
        return view('/includes/error');
    }


    public function submit_specialty_data(Request $request)
    {
        if (Auth::check()) {

            $rules = [
                'name' => ['required','unique:especialidades','max:20'],
                'description' => ['required'],
            ];

            $errorMessage = [
                'required' => 'Este campo é obrigatório',
                'unique' => 'Esse nome já existe. Insira outro por favor.',
                'max' => 'O nome não pode exceder dos 20 carateres'
            ];

            $this->validate($request, $rules, $errorMessage);

            $create = Especialidades::create([
                'name' => $request->name,
                'description' => strtolower($request->description),
            ]);

            if($create){
                $this->meesage('message','Especialidade adicionada com sucesso!');
                return redirect('admin/especialidades/index');
            }
            return redirect()->back();
        }
        return view('/includes/error');

    }


    public function fetch_all_specialties()
    {
        if (Auth::check()) {
            $especialidades = Especialidades::toBase()->get();
            return view('admin.especialidades.index',compact('especialidades'));
        }
        return view('/includes/error');
    }


    public function edit_specialty_form(Especialidades $especialidade)
    {
        if (Auth::check()) {
            //  returns the view
            return view('admin.especialidades.edit',compact('especialidade'));
        }
        return view('/includes/error');

    }


    public function edit_specialty_form_submit(Request $request, Especialidades $especialidade)
    {
        if (Auth::check()) {

            /*Checks if that name exists in db and if so ignore the current id while editing for not displaying error*/
            $rules = [
                'name' => ['required', Rule::unique('especialidades')->ignore($especialidade->id,'id'),'max:20'],
                'description' => ['required']
            ];

            $errorMessage = [
                'required' => 'Este campo é obrigatório',
                'unique' => 'Esse nome já existe. Insira outro por favor.',
                'max' => 'O nome não pode exceder dos 20 carateres'
            ];

            $this->validate($request, $rules, $errorMessage);

            $update = $especialidade->update([
                'name' => $request->name,
                'description' => strtolower($request->description)
            ]);

            if($update){
                $this->meesage('message','A especialidade foi atualizada com sucesso!');
                return redirect('admin/especialidades/index');
            }
            return redirect()->back();
        }
        return view('/includes/error');

    }


    public function view_single_specialty(Especialidades $especialidade)
    {
        if (Auth::check()) {
            return view('admin.especialidades.view',compact('especialidade'));
        }
        return view('/includes/error');
    }


    public function delete_specialty(Especialidades $especialidade)
    {
        if (Auth::check()) {

            $especialidade->delete();
            $this->meesage('message','Especialidade apagada com sucesso!');
            return redirect()->back();
        }
        return view('/includes/error');

    }


    public function meesage(string $name = null, string $message = null)
    {
        return session()->flash($name,$message);
    }
}
