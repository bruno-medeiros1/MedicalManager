<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesDeSaudesTable extends Migration
{
    public function up()
    {
        Schema::create('unidades_de_saudes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',40)->unique();
            $table->string('location',40)->unique();
            $table->string('region',20)->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('unidades_de_saudes');
    }
}
