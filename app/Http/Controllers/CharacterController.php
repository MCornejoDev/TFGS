<?php

namespace App\Http\Controllers;

use App\Enums\Races;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function races(Request $request)
    {
        return collect(Races::withTranslations())->map(function ($value, $key) {
            return [
                'id' => $key,
                'name' => $value,
                'image' => asset('storage/images/races/' . Races::lowerCase($key) . '.png'),
            ];
        })->when($request->has('search'), function ($collection) use ($request) {
            return $collection->filter(function ($item) use ($request) {
                return preg_match("/{$request->search}/i", $item['name']); // Insensible a mayúsculas
            });
        })->sortBy('name')->values();
    }
}
