<?php

use Illuminate\Database\Seeder;
use App\Models\Especialidades;

class EspecialidadesTableSeeder extends Seeder
{
    public function run()
    {
        $especialidade = new Especialidades();
        $especialidade->name = 'Cardiologia';
        $especialidade->description = 'Cardiologia é a especialidade médica que se ocupa do diagnóstico e tratamento das doenças que acometem o coração bem como os outros componentes do sistema circulatório.';
        $especialidade->save();

        $especialidade = new Especialidades();
        $especialidade->name = 'Nefrologia';
        $especialidade->description = 'Nefrologia é a especialidade médica que se ocupa do diagnóstico e tratamento clínico das doenças do sistema urinário, em especial o rim.';
        $especialidade->save();

        $especialidade = new Especialidades();
        $especialidade->name = 'Hematologia';
        $especialidade->description = 'Hematologia é o ramo da biologia e especialidade clínica que estuda o sangue dos demais animais com sistema circulatório fechado.';
        $especialidade->save();

        $especialidade = new Especialidades();
        $especialidade->name = 'Gastroenterologia';
        $especialidade->description = 'A Gastroenterologia ou Gastrenterologia, é a especialidade médica que se ocupa do estudo, diagnóstico e tratamento clínico das doenças do aparelho digestivo.';
        $especialidade->save();

        $especialidade = new Especialidades();
        $especialidade->name = 'Mastologia';
        $especialidade->description = 'A mastologia ou senologia é especialidade médica que se dedica ao estudo das glândulas mamárias. ';
        $especialidade->save();
    }
}
