<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrearPersonaje extends Model
{
    //
    protected $table = 'personajes';

    protected $fillable = ['raza','nombrePersonaje','apodo','altura','edad','peso','sexo',
    'personalidad','habilidad1','habilidad2','habilidad3','habilidad4','vida','nivel','fuerza','destreza','constitucion'
    ,'inteligencia','sabiduria','carisma','objetos'];

    public $timestamps = false;
}
