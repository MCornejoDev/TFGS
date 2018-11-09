<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickPartida',40);
            $table->integer('idUsuario')->unsigned();
            $table->foreign('idUsuario')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');
            $table->integer('idPersonaje')->unsigned();
            $table->foreign('idPersonaje')
                ->references('id')
                ->on('personajes')
                ->onDelete('cascade');
            $table->timestamp('fechaCreacion');
            $table->string('comentarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partidas');
    }
}
