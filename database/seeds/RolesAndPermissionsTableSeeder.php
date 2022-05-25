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


        // create permissions
        Permission::create(['name' => 'role-list']);
        Permission::create(['name' => 'role-create']);
        Permission::create(['name' => 'role-edit']);
        Permission::create(['name' => 'role-delete']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo('role-list','role-create','role-edit','role-delete');

        // or may be done by chaining
        $role = Role::create(['name' => 'Doctor'])
            ->givePermissionTo(['role-list']);

        $role = Role::create(['name' => 'Nurse']);
        $role->givePermissionTo(Permission::all());
    }
}
