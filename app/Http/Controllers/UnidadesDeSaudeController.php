<?php

namespace App\Http\Controllers;

use App\Models\UnidadesDeSaude;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;

class UnidadesDeSaudeController extends Controller
{
    public function add_health_center_form()
    {
        if (Auth::check()) {

            if( \View::exists('admin.unidades.create') ){

                return view('admin.unidades.create');
            }
        }
        return view('/includes/error');
    }


    public function submit_health_center_data(Request $request)
    {
        if (Auth::check()) {

            $rules = [
                'name' => ['required','unique:unidades_de_saudes','max:40'],
                'location' => ['required'],
                'region' => ['required']
            ];

            $errorMessage = [
                'required' => 'Este campo é obrigatório',
                'unique' => 'Esse nome já existe. Insira outro por favor.',
                'max' => 'O nome não pode exceder dos 20 carateres'
            ];

            $this->validate($request, $rules, $errorMessage);

            $create = UnidadesDeSaude::create([
                'name' => $request->name,
                'location' => $request->location,
                'region' => $request->region
            ]);

            if($create){
                $this->meesage('message','Unidade de saude adicionada com sucesso!');
                return redirect('admin/unidades/index');
            }
            return redirect()->back();
        }
        return view('/includes/error');

    }


    public function fetch_all_health_centers()
    {
        if (Auth::check()) {
            $unidades = UnidadesDeSaude::toBase()->get();
            return view('admin.unidades.index',compact('unidades'));
        }
        return view('/includes/error');
    }


    public function edit_health_center_form(UnidadesDeSaude $unidade)
    {
        if (Auth::check()) {
            //  returns the view
            return view('admin.unidades.edit',compact('unidade'));
        }
        return view('/includes/error');

    }


    public function edit_health_center_form_submit(Request $request, UnidadesDeSaude $unidade)
    {
        if (Auth::check()) {

            /*Checks if that name exists in db and if so ignore the current id while editing for not displaying error*/
            $rules = [
                'name' => ['required', Rule::unique('unidades_de_saudes')->ignore($unidade->id,'id'),'max:40'],
                'location' => ['required'],
                'region' => ['required'],
            ];

            $errorMessage = [
                'required' => 'Este campo é obrigatório',
                'unique' => 'Esse nome já existe. Insira outro por favor.',
                'max' => 'O nome não pode exceder dos 20 carateres'
            ];

            $this->validate($request, $rules, $errorMessage);

            $update = $unidade->update([
                'name' => $request->name,
                'location' => $request->location,
                'region' => $request->region,
            ]);

            if($update){
                $this->meesage('message','A unidade de saude foi atualizada com sucesso!');
                return redirect('admin/unidades/index');
            }
            return redirect()->back();
        }
        return view('/includes/error');

    }


    public function view_single_health_center(UnidadesDeSaude $unidade)
    {
        if (Auth::check()) {
            return view('admin.unidades.view',compact('unidade'));
        }
        return view('/includes/error');
    }


    public function delete_health_center(UnidadesDeSaude $unidade)
    {
        if (Auth::check()) {

            $unidade->delete();
            $this->meesage('message','Unidade de saúde apagada com sucesso!');
            return redirect()->back();
        }
        return view('/includes/error');

    }


    public function meesage(string $name = null, string $message = null)
    {
        return session()->flash($name,$message);
    }
}
