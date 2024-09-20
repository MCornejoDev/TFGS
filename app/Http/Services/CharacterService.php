<?php

namespace App\Http\Services;

use App\Enums\CharacterTypes;
use App\Models\Character;
use App\Models\CharacterType;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class CharacterService
{
    public static function getCharacters(string $search, array $filters, string $sortField = 'name', string $sortDirection = 'asc')
    {
        $query = Character::query();

        $query->where('user_id', Auth::id())
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('nickname', 'like', '%' . $search . '%');
                });
            })
            ->when($filters['race'], function ($query) use ($filters) {
                $query->whereIn('race', $filters['race']);
            })
            ->when($filters['characterType'], function ($query) use ($filters) {
                $query->whereIn('character_type_id', $filters['characterType']);
            })
            ->when(! is_null($filters['gender']), function ($query) use ($filters) {
                $query->where('gender', $filters['gender']);
            });

        return $query->orderBy($sortField, $sortDirection)->paginate(8);
    }

    public static function create(array $data): ?Character
    {
        try {

            $characterType = CharacterType::create([
                'type' => $data['characterTypeId'],
                'weapon' => $data['weaponId'],
                'armor' => $data['armorId'],
                'shield' => $data['shield'],
            ]);

            return Character::create([
                'character_type_id' => $characterType->id,
                'user_id' => Auth::id(),
                'game_id' => $data['gameId'],
                'race' => $data['raceId'],
                'name' => $data['name'],
                'nickname' => $data['nickname'],
                'gender' => $data['gender'],
                'personality' => $data['personality'],
                'skills' => $data['skills'],
                'age' => $data['age'],
                'height' => $data['height'],
                'weight' => $data['weight'],
                'health' => $data['health'],
                'level' => $data['level'],
                'strength' => $data['strength'],
                'dexterity' => $data['dexterity'],
                'constitution' => $data['constitution'],
                'intelligence' => $data['intelligence'],
                'wisdom' => $data['wisdom'],
                'charisma' => $data['charisma'],
                'items' => $data['items'] ?? '',
            ]);
        } catch (Exception $e) {
            log_error($e);

            return null;
        }
    }

    public static function remove(int $id): bool
    {
        try {
            return Character::find($id)->delete();
        } catch (Exception $e) {
            log_error($e);

            return false;
        }
    }

    public static function getCharacterTypes(): Collection
    {
        return collect(CharacterTypes::withTranslations())->map(function ($value, $key) {
            return [
                'id' => $key,
                'name' => $value,
                'image' => asset('storage/images/character_types/' . CharacterTypes::lowerCase($key) . '.png'),
            ];
        })->sortBy('name')->values();
    }

    public static function getGenres(): array
    {
        return [
            [
                'id' => false,
                'name' => __('characters.genres.male'),
                'image' => asset('storage/images/genres/male.png'),
            ],
            [
                'id' => true,
                'name' => __('characters.genres.female'),
                'image' => asset('storage/images/genres/female.png'),
            ],
        ];
    }
}
