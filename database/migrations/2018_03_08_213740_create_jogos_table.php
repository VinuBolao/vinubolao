<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('campeonato_id');
            $table->foreign('campeonato_id')->references('id')->on('campeonatos');
            $table->unsignedInteger('bolao_id');
            $table->foreign('bolao_id')->references('id')->on('bolaos');
            $table->integer('rodada');
            $table->dateTime('inicio');
            $table->unsignedInteger('timecasa_id');
            $table->foreign('timecasa_id')->references('id')->on('times');
            $table->integer('placar_casa')->nullable();
            $table->integer('placar_fora')->nullable();
            $table->unsignedInteger('timefora_id');
            $table->foreign('timefora_id')->references('id')->on('times');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jogos');
    }
}
