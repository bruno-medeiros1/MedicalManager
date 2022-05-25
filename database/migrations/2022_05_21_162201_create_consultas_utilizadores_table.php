<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasUtilizadoresTable extends Migration
{
    public function up()
    {
        Schema::create('consulas_utilizadores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_utilizador');
            $table->unsignedBigInteger('id_consulta');
            $table->timestamps();

            /*Chaves estrangeiras*/
            $table->foreign('id_utilizador')->references('id')->on('users');
            $table->foreign('id_consulta')->references('id')->on('consultas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('consulas_utilizadores');
    }
}
