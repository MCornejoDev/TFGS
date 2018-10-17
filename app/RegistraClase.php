<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistraClase extends Model
{
    // 
    protected $table = 'clase';
    protected $fillable = ['iDPersonaje','tipo','arma','armadura','escudo'];
}
