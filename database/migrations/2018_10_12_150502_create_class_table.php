<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clase', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idPersonaje')->unsigned();
            $table->foreign('idPersonaje')
              ->references('id')
              ->on('personajes')
              ->onDelete('cascade');//Hace referencia al id de la tabla personaje
            $table->string('tipo',30);
            $table->string('arma',30);
            $table->string('armadura',30);
            $table->string('escudo',30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clase');
    }
}
