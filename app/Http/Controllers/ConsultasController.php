<?php

namespace App\Http\Controllers;

use App\Models\Consultas;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;


class ConsultasController extends Controller
{

    /*
        Retorna a view para adicionar
    */
    public function add_consult_form()
    {
        if( \View::exists('consultas.create') ){

            return view('consultas.create');
        }
    }

    public function submit_consult_data(Request $request)
    {

        $rules = [
            'name' => ['required','unique:consultas','max:20'],
            'description' => ['required'],
            'date' => ['required'],
        ];

        $errorMessage = [
            'required' => 'Este campo é obrigatório',
            'unique' => 'Esse nome já existe. Insira outro por favor.'
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

    //--------------------------------------------------------------------------------------------
    //  ESTA A DAR
    public function fetch_all_consults()
    {
        $consultas = Consultas::toBase()->get();
        return view('consultas.index',compact('consultas'));
    }

    //  ESTA A DAR
    public function edit_consult_form(Consultas $consulta)
    {
        //  create date time object
        $date = new DateTime($consulta->date);

        //  sets the date into the correct format to use in html datetime-local input component
        $consulta->date = $date->format('Y-m-d\TH:i');

        //  returns the view
        return view('consultas.edit',compact('consulta'));
    }

    //  ESTA A DAR
    public function edit_consult_form_submit(Request $request, Consultas $consulta)
    {
        $rules = [
            'name' => ['required','unique:consultas','max:20'],
            'description' => ['required'],
            'date' => ['required'],
        ];

        $errorMessage = [
            'required' => 'Este campo é obrigatório',
            'unique' => 'Esse nome já existe. Insira outro por favor.'
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

    //--------------------------------------------------------------------------------------------
    public function view_single_consult(Consultas $consulta)
    {
        return view('consultas.view',compact('consulta'));
    }

    public function delete_consult(Consultas $consulta)
    {
        echo 'chegou!';

        $consulta->delete();
        $this->meesage('message','Consulta apagada com sucesso!');
        return redirect()->back();
    }

    public function meesage(string $name = null, string $message = null)
    {
        return session()->flash($name,$message);
    }
}
