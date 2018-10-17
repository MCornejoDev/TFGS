<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistraClase extends Model
{
    // 
    protected $table = 'clase';
    protected $fillable = ['idPersonaje','tipo','arma','armadura','escudo'];
    public $timestamps = false;
}
