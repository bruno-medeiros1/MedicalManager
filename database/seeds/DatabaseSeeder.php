<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ConsultasSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(UnidadesDeSaudeTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
    }
}
