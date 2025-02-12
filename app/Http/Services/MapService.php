<?php

namespace App\Http\Services;

use App\Models\Map;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Storage;

class MapService
{
    public static function getMaps(string $search, array $filters, string $sortField = 'name', string $sortDirection = 'asc')
    {
        $query = Map::query();

        $query->whereHas('user', function ($query) {
            $query->where('user_id', Auth::id());
        })->when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('link', 'like', '%' . $search . '%');
            });
        })->when($filters['extension'], function ($query) use ($filters) {
            $query->whereIn('extension', $filters['extension']);
        });

        return $query->orderBy($sortField, $sortDirection);
    }

    public static function getMapById(int $id): Map
    {
        return Map::findOrFail($id);
    }

    public static function create(array $data): ?Map
    {
        try {
            $originalName = pathinfo($data['image']->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = $originalName . '_' . uniqid() . '.' . $data['image']->getClientOriginalExtension();
            $link = store_file('images/maps', $data['image'], $filename);

            $game = Map::create([
                'user_id' => Auth::id(),
                'name' => $data['name'] ?? $originalName,
                'filename' => $filename,
                'link' => $link,
                'extension' =>  $data['image']->extension(),
            ]);

            return $game;
        } catch (Exception $e) {
            log_error($e);

            return null;
        }
    }

    public static function updateMap(int $id, array $data): bool
    {
        try {
            $map = Map::findOrFail($id);

            if ($data['image'] instanceof UploadedFile) {
                if ($map->link) {
                    Storage::disk('public')->delete($map->link);
                }
                $originalName = pathinfo($data['image']->getClientOriginalName(), PATHINFO_FILENAME);
                $filename = $originalName . '_' . uniqid() . '.' . $data['image']->getClientOriginalExtension();
            }

            $map->name = $data['name'];
            $map->filename = $filename;
            $map->link = store_file('images/maps', $data['image'], $filename);
            $map->extension =  $data['image']->extension();

            return $map->save();
        } catch (Exception $e) {
            log_error($e);

            return false;
        }
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
