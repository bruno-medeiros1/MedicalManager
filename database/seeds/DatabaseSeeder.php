<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RolesAndPermissionsTableSeeder::class);

        /*  Seeds de criação de utilizadores com roles associados*/
        $this->call(AdminTableSeeder::class);
        $this->call(MedicTableSeeder::class);
        $this->call(NurseTableSeeder::class);

        $this->call(ConsultasTableSeeder::class);
        $this->call(EspecialidadesTableSeeder::class);
        $this->call(UnidadesDeSaudeTableSeeder::class);
    }
}
