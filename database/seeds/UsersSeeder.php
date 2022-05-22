<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{

    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@local.com';
        $user->password = bcrypt('admin#123');
        $user->save();

        $user = new User();
        $user->name = 'medico';
        $user->email = 'medico@local.com';
        $user->password = bcrypt('medico#123');
        $user->save();

        $user = new User();
        $user->name = 'enfermeiro';
        $user->email = 'enfermeiro@local.com';
        $user->password = bcrypt('enfermeiro#123');
        $user->save();
    }
}
