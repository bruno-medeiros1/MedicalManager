<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class MedicTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Débora Pinto',
            'email' => 'medico@local.com',
            'password' => bcrypt('123456')
        ]);

        $user->assignRole('Doctor');
    }
}
