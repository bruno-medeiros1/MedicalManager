<?php

namespace App\Http\Controllers;

use App\Models\Consultas;
use App\Models\User;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Validation\Rule;
use Auth;


class ConsultasController extends Controller
{


    public function add_consult_form()
    {
        if (Auth::check()) {

            if( \View::exists('consultas.create') ){

                return view('consultas.create');
            }
        }
        return view('/includes/error');
    }


    public function submit_consult_data(Request $request)
    {
        if (Auth::check()) {

            $rules = [
                'name' => ['required','unique:consultas','max:20'],
                'description' => ['required'],
                'date' => ['required'],
            ];

            $errorMessage = [
                'required' => 'Este campo é obrigatório',
                'unique' => 'Esse nome já existe. Insira outro por favor.',
                'max' => 'O nome não pode exceder dos 20 carateres'
            ];

            $this->validate($request, $rules, $errorMessage);

            $create = Consultas::create([
                'name' => $request->name,
                'description' => strtolower($request->description),
                'date' => $request->date
            ]);

            if($create){
                $this->meesage('message','Consulta adicionada com sucesso!');
                return redirect('/consulta/index');
            }
            return redirect()->back();
        }
        return view('/includes/error');

    }


    public function fetch_all_consults()
    {
        if (Auth::check()) {

            $consultas = Consultas::toBase()->get();
            return view('consultas.index',compact('consultas'));
        }
        return view('/includes/error');
    }


    public function edit_consult_form(Consultas $consulta)
    {
        if (Auth::check()) {

            //  create date time object
            $date = new DateTime($consulta->date);

            //  sets the date into the correct format to use in html datetime-local input component
            $consulta->date = $date->format('Y-m-d\TH:i');

            //  returns the view
            return view('consultas.edit',compact('consulta'));
        }
        return view('/includes/error');

    }


    public function edit_consult_form_submit(Request $request, Consultas $consulta)
    {
        if (Auth::check()) {

            /*Checks if that name exists in db and if so ignore the current id while editing for not displaying error*/
            $rules = [
                'name' => ['required', Rule::unique('consultas')->ignore($consulta->id,'id'),'max:20'],
                'description' => ['required'],
                'date' => ['required'],
            ];

            $errorMessage = [
                'required' => 'Este campo é obrigatório',
                'unique' => 'Esse nome já existe. Insira outro por favor.',
                'max' => 'O nome não pode exceder dos 20 carateres'
            ];

            $this->validate($request, $rules, $errorMessage);

            $update = $consulta->update([
                'name' => $request->name,
                'description' => strtolower($request->description),
                'date' => $request->date
            ]);

            if($update){
                $this->meesage('message','A consulta foi atualizada com sucesso!');
                return redirect('/consulta/index');
            }
            return redirect()->back();
        }
        return view('/includes/error');

    }


    public function view_single_consult(Consultas $consulta)
    {
        if (Auth::check()) {

            //  create date time object
            $date = new DateTime($consulta->date);

            //  sets the date into the correct format to use in html datetime-local input component
            $consulta->date = $date->format('Y-m-d\TH:i');

            return view('consultas.view',compact('consulta'));
        }
        return view('/includes/error');
    }


    public function delete_consult(Consultas $consulta)
    {
        if (Auth::check()) {

            $consulta->delete();
            $this->meesage('message','Consulta apagada com sucesso!');
            return redirect()->back();
        }
        return view('/includes/error');

    }


    public function meesage(string $name = null, string $message = null)
    {
        return session()->flash($name,$message);
    }
}
