<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Map extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'filename',
        'link',
        'extension',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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

    /**
     * Check if the image of map exists.
     *
     * @return bool
     */
    public function hasPicture()
    {
        return Storage::disk('public')->exists($this->link);
    }
}
