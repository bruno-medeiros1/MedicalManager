<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{

    function __construct()
    {
          $this->middleware('permission:lista-tipos-de-pessoal-medico|criar-tipos-de-pessoal-medico|editar-tipos-de-pessoal-medico|apagar-tipos-de-pessoal-medico', ['only' => ['index','store']]);
          $this->middleware('permission:criar-tipos-de-pessoal-medico', ['only' => ['create','store']]);
          $this->middleware('permission:editar-tipos-de-pessoal-medico', ['only' => ['edit','update']]);
          $this->middleware('permission:apagar-tipos-de-pessoal-medico', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('admin.tipo.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        $permission = Permission::get();
        return view('admin.tipo.create',compact('permission'));
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'permission' => 'required',
        ];

        $errorMessage = [
            'required' => 'Este campo é obrigatório',
            'permission.required' => 'Selecione pelo menos 1 permissão',
        ];

        $this->validate($request, $rules,$errorMessage);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.tipo.index')
            ->with('success','Grupo de Utilizador adicionado com sucesso!');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('admin.tipo.show',compact('role','rolePermissions'));
    }


    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('admin.tipo.edit',compact('role','permission','rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'permission' => 'required',
        ];

        $errorMessage = [
            'required' => 'Este campo é obrigatório',
            'permission.required' => 'Selecione pelo menos 1 permissão',
        ];

        $this->validate($request, $rules,$errorMessage);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.tipo.index')
            ->with('success','Grupo de Utilizador atualizado com sucesso!');
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('admin.tipo.index')
            ->with('success','Role deleted successfully');
    }
}
