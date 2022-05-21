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
            $table->integer('id_utilizador')->unsigned();
            $table->integer('id_unidade_de_saude')->unsigned();
            $table->timestamps();

            /*Chaves estrangeiras*/
            $table->foreign('id_utilizador')->references('id')->on('users');
            $table->foreign('id_unidade_de_saude')->references('id')->on('unidades_de_saude');
        });
    }

    public function down()
    {
        Schema::dropIfExists('unidades_de_saude_utilizadores');
    }
}
