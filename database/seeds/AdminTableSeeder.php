<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminTableSeeder extends Seeder
{

    public function run()
    {
        $user = User::create([
            'name' => 'Bruno Medeiros',
            'email' => 'admin@local.com',
            'password' => bcrypt('123456')
        ]);

        $user->assignRole(['Admin']);
    }
}
