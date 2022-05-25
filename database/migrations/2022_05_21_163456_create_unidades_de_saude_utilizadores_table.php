<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesDeSaudeUtilizadoresTable extends Migration
{

    public function up()
    {
        Schema::create('unidades_de_saude_utilizadores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_utilizador');
            $table->unsignedBigInteger('id_unidade_de_saude');
            $table->timestamps();

            /*Chaves estrangeiras*/
            $table->foreign('id_utilizador')->references('id')->on('users');
            $table->foreign('id_unidade_de_saude')->references('id')->on('unidades_de_saudes');

        });
    }

    public function down()
    {
        Schema::dropIfExists('unidades_de_saude_utilizadores');
    }
}
