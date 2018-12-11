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
            $table->increments('id');
            $table->integer('idPartida')->unsigned();
            $table->foreign('idPartida')
              ->references('id')
              ->on('partidas')
              ->onDelete('cascade');
            $table->timestamp('fecha');
            $table->string('estado',50);
            //Modificaciones que el usuario puede hacer y quedarán registradas
            $table->integer('vida');//Valor máximo de la columna de nivel es 4 números (9999)
            $table->integer('edad');//Valor máximo de la columna edad es 3 números (999)
            $table->integer('nivel');//Valor máximo de la columna de nivel es 3 números (200)
            $table->integer('fuerza');//Valor máximo de la columna de nivel es 2 números (99)
            $table->integer('destreza');//Valor máximo de la columna de nivel es 2 números (99)
            $table->integer('constitucion');//Valor máximo de la columna de nivel es 2 números (99)
            $table->integer('inteligencia');//Valor máximo de la columna de nivel es 2 números (99)
            $table->integer('sabiduria');//Valor máximo de la columna de nivel es 2 números (99)
            $table->integer('carisma');//Valor máximo de la columna de nivel es 2 números (99)
            $table->text('objetos');    
            
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
