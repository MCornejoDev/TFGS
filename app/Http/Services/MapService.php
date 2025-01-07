<?php

namespace App\Http\Services;

use App\Models\Map;
use Exception;
use Illuminate\Support\Collection;

class MapService
{
    public static function getMaps(string $search, array $filters, string $sortField = 'name', string $sortDirection = 'asc')
    {
        $query = Map::query();

        $query->when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('link', 'like', '%' . $search . '%');
            });
        })->when($filters['extension'], function ($query) use ($filters) {
            $query->whereIn('extension', $filters['extension']);
        });

        return $query->orderBy($sortField, $sortDirection)->paginate(8);
    }

    public static function getExtensions(): Collection
    {
        $extensions = ['png', 'jpg', 'jpeg', 'gif', 'webp'];

        return collect($extensions)->map(function ($value, $key) {
            return [
                'id' => $value,
                'name' => $value,
            ];
        })->sortBy('name')->values();
    }

    public static function remove(int $id): bool
    {
        try {
            return Map::findOrFail($id)->delete();
        } catch (Exception $e) {
            log_error($e);

            return false;
        }
    }
}
