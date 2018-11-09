<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistraCambios extends Model
{
    //
    protected $table = 'cambios';
    protected $fillable = ['fecha','idPartida','estado','vida','edad','nivel','fuerza',
    'destreza','constitucion','inteligencia','sabiduria','carisma','objetos'];
    public $timestamps = false;
}
