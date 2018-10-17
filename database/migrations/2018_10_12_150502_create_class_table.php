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
            $table->string('tipo',50);
            $table->string('arma',70);
            $table->string('armadura',70);
            $table->string('escudo',70)->nullable();
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
