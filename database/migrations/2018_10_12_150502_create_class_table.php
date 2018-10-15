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
            $table->integer('iDPersonaje')->unsigned();//El id que hace referencia al usuario de la tabla personaje
            $table->foreign('iDPersonaje')
              ->references('id')
              ->on('personajes')
              ->onDelete('cascade');
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
