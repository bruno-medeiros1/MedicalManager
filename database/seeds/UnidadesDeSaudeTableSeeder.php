<?php

use Illuminate\Database\Seeder;
use App\Models\UnidadesDeSaude;

class UnidadesDeSaudeTableSeeder extends Seeder
{

    public function run()
    {
        $unidade = new UnidadesDeSaude();
        $unidade->name = 'Unidade Saude Nº1';
        $unidade->location = 'Chaves, Portugal';
        $unidade->region = 'Vila Real';
        $unidade->save();

        $unidade = new UnidadesDeSaude();
        $unidade->name = 'Unidade Saude Nº2';
        $unidade->location = 'Viseu, Portugal';
        $unidade->region = 'Viseu';
        $unidade->save();

        $unidade = new UnidadesDeSaude();
        $unidade->name = 'Unidade Saude Nº3';
        $unidade->location = 'Maia, Portugal';
        $unidade->region = 'Porto';
        $unidade->save();
    }
}
