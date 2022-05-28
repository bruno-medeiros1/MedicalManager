<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsTableSeeder extends Seeder
{

    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Permissões Admin
        Permission::create(['name' => 'index-admin']);

        // Permissões Tipo Pessoal Médico
        Permission::create(['name' => 'index-tipos-de-pessoal-medico']);
        Permission::create(['name' => 'lista-tipos-de-pessoal-medico']);
        Permission::create(['name' => 'criar-tipos-de-pessoal-medico']);
        Permission::create(['name' => 'editar-tipos-de-pessoal-medico']);
        Permission::create(['name' => 'apagar-tipos-de-pessoal-medico']);

        // Permissões Pessoal Médico
        Permission::create(['name' => 'index-pessoal-medico']);
        Permission::create(['name' => 'lista-pessoal-medico']);
        Permission::create(['name' => 'criar-pessoal-medico']);
        Permission::create(['name' => 'editar-pessoal-medico']);
        Permission::create(['name' => 'apagar-pessoal-medico']);

        //  Permissões Consultas
        Permission::create(['name' => 'index-consultas']);
        Permission::create(['name' => 'lista-consultas']);
        Permission::create(['name' => 'criar-consultas']);
        Permission::create(['name' => 'editar-consultas']);
        Permission::create(['name' => 'apagar-consultas']);

        //  Permissões Unidades De Saúde
        Permission::create(['name' => 'index-unidades-de-saude']);
        Permission::create(['name' => 'lista-unidades-de-saude']);
        Permission::create(['name' => 'criar-unidades-de-saude']);
        Permission::create(['name' => 'editar-unidades-de-saude']);
        Permission::create(['name' => 'apagar-unidades-de-saude']);

        //  Permissões Especialidades
        Permission::create(['name' => 'index-especialidades']);
        Permission::create(['name' => 'lista-especialidades']);
        Permission::create(['name' => 'criar-especialidades']);
        Permission::create(['name' => 'editar-especialidades']);
        Permission::create(['name' => 'apagar-especialidades']);

        //  ADMIN
        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo(Permission::all());

        //  DOCTOR
        $role = Role::create(['name' => 'Doctor'])
            ->givePermissionTo(['index-consultas','lista-consultas','criar-consultas','editar-consultas','apagar-consultas']);

        //  NURSE
        $role = Role::create(['name' => 'Nurse']);
        $role->givePermissionTo(['lista-consultas','index-consultas']);
    }
}
