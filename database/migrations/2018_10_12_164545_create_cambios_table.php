<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCambiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cambios', function (Blueprint $table) {
            $table->string('nickPartida',100);
            $table->timestamp('fecha');
            $table->primary(['nickPartida', 'fecha']);
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
            $table->string('estado');

            //Modificaciones que el usuario puede hacer y quedarán registradas
            $table->integer('edad');//Valor máximo de la columna edad es 3 números (999)
            $table->integer('nivel');//Valor máximo de la columna de nivel es 3 números (200)
            $table->integer('fuerza');//Valor máximo de la columna de nivel es 2 números (99)
            $table->integer('destreza');//Valor máximo de la columna de nivel es 2 números (99)
            $table->integer('constitucion');//Valor máximo de la columna de nivel es 2 números (99)
            $table->integer('inteligencia');//Valor máximo de la columna de nivel es 2 números (99)
            $table->integer('sabiduria');//Valor máximo de la columna de nivel es 2 números (99)
            $table->integer('carisma');//Valor máximo de la columna de nivel es 2 números (99)
            $table->string('objetos',100);    
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cambios');
    }
}
