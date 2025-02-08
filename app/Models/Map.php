<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'filename',
        'link',
        'extension',
    ];

    /**
     * Get the image of map.
     *
     * @return string
     */
    protected function picture(): Attribute
    {
        return Attribute::make(
            get: fn() => asset('storage/' . $this->link),
        );
    }
}
