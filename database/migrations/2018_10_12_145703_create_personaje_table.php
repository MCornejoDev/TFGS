<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personajes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('raza',20);
            $table->string('nombrePersonaje',50);
            $table->string('apodo',25);
            $table->string('altura',10);
            $table->integer('edad');//Valor máximo de la columna edad es 3 números (999)
            $table->string('peso',10);
            $table->char('sexo',1);
            $table->text('personalidad');
            $table->string('habilidad1',100);
            $table->string('habilidad2',100);
            $table->string('habilidad3',100);
            $table->string('habilidad4',100);
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
        Schema::dropIfExists('personajes');
    }
}
