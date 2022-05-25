<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class NurseTableSeeder extends Seeder
{

    public function run()
    {
        $user = User::create([
            'name' => 'Diana Medeiros',
            'email' => 'enfermeira@local.com',
            'password' => bcrypt('123456')
        ]);

        $role = Role::create(['name' => 'Nurse']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
