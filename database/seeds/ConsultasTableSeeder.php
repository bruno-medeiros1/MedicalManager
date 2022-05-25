<?php

use Illuminate\Database\Seeder;
use App\Models\Consultas;

class ConsultasTableSeeder extends Seeder
{
    public function run()
    {
        $consulta = new Consultas();
        $consulta->name = 'Consulta Geral';
        $consulta->description = 'Consulta geral para o Sr. Joao marcada no dia 25 de Junho as 9h da manha.';
        $consulta->date = new DateTime('2022-06-25 09:00');
        $consulta->save();

        $consulta = new Consultas();
        $consulta->name = 'Consulta Ortopedia';
        $consulta->description = 'Consulta de ortopedia para o Sr. Manuel marcada no dia 15 de Junho as 9h da manha.';
        $consulta->date = new DateTime('2022-06-15 09:00');
        $consulta->save();

        $consulta = new Consultas();
        $consulta->name = 'Consulta Cardiologia';
        $consulta->description = 'Consulta de cardiologia para a Sra. Joana marcada no dia 5 de Julho as 9:30h da manha.';
        $consulta->date = new DateTime('2022-07-5 09:30');
        $consulta->save();

        $consulta = new Consultas();
        $consulta->name = 'Consulta Dermatologia';
        $consulta->description = 'Consulta de dermatologia para a Sra. Beatriz marcada no dia 29 de Agosto as 10:30h da manha.';
        $consulta->date = new DateTime('2022-08-29 10:30');
        $consulta->save();

        $consulta = new Consultas();
        $consulta->name = 'Consulta Endocrinologia';
        $consulta->description = 'Consulta de endocrinologia para a Sr. Bruno marcada no dia 10 de Setembro as 10:30h da manha.';
        $consulta->date = new DateTime('2022-09-10 10:30');
        $consulta->save();
    }
}
