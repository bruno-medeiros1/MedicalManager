<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:lista-pessoal-medico|criar-pessoal-medico|editar-pessoal-medico|apagar-pessoal-medico', ['only' => ['index','store']]);
        $this->middleware('permission:criar-pessoal-medico', ['only' => ['create','store']]);
        $this->middleware('permission:editar-pessoal-medico', ['only' => ['edit','update']]);
        $this->middleware('permission:apagar-pessoal-medico', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('admin.pessoal.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.pessoal.create',compact('roles'));
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|same:confirm-password',
            'confirm-password' => 'required',
            'roles' => 'required'
        ];

        $errorMessage = [
            'required' => 'Este campo é obrigatório',
            'unique' => 'Esse email já existe atribuído a outro utilizador. Insira outro por favor.',
            'same' => 'As passwords não coincidem'
        ];

        $this->validate($request, $rules,$errorMessage);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.pessoal.index')
            ->with('success','Utilizador criado com sucesso!');
    }


    public function show($id)
    {
        $user = User::find($id);
        return view('admin.pessoal.show',compact('user'));
    }


    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('admin.pessoal.edit',compact('user','roles','userRole'));
    }


    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email'  =>  'required|email|unique:users,email,'.$id,
            'password' => 'required|same:confirm-password',
            'confirm-password' => 'required',
            'roles' => 'required'
        ];

        $errorMessage = [
            'required' => 'Este campo é obrigatório',
            'unique' => 'Esse email já existe atribuído a outro utilizador. Insira outro por favor.',
            'same' => 'As passwords não coincidem'
        ];

        $this->validate($request, $rules,$errorMessage);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.pessoal.index')
            ->with('success','Utilizador atualizado com sucesso!');
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.pessoal.index')
            ->with('success','O utilizador foi apagado com sucesso!');
    }
}
