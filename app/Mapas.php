<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapas extends Model
{
    //
    protected $table = 'mapas';
    protected $fillable = ['nombre','enlace','extension'];
    public $timestamps = false;
}
