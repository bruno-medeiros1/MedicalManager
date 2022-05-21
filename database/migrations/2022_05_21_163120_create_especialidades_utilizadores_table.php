<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadesUtilizadoresTable extends Migration
{
    public function up()
    {
        Schema::create('especialidades_utilizadores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_utilizador')->unsigned();
            $table->integer('id_especialidade')->unsigned();
            $table->timestamps();

            /*Chaves estrangeiras*/
            $table->foreign('id_utilizador')->references('id')->on('users');
            $table->foreign('id_especialidade')->references('id')->on('especialidades');
        });
    }

    public function down()
    {
        Schema::dropIfExists('especialidades_utilizadores');
    }
}
