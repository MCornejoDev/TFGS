<?php

namespace Tests\Feature\Livewire\Character;

use App\Livewire\Character\Create;
use App\Models\Character;
use App\Models\CharacterType;
use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Illuminate\Http\Response;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected Character $character;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->character = Character::factory()->make([
            'character_type_id' => CharacterType::factory()->create()->id,
            'game_id' => Game::factory()->create()->id,
        ]);
    }

    #[Test]
    public function renders_successfully()
    {
        //GIVEN a user is logged in
        $this->actingAs($this->user);

        //WHEN the user visits the create page
        Livewire::test(Create::class)
            //THEN the page should render successfully
            ->assertStatus(Response::HTTP_OK);
    }

    #[Test]
    public function can_create_character()
    {
        // GIVEN a user is logged in
        $this->actingAs($this->user);

        $this->assertDatabaseMissing('characters', [
            'name' => $this->character->name,
            'nickname' => $this->character->nickname,
            'race' => $this->character->race,
            'game_id' => $this->character->game_id,
            'user_id' => $this->user->id,
        ]);

        // WHEN the user wants to create a new character, clicking the button in the create page
        Livewire::test(Create::class)
            // Call the method to create the character
            ->set('form.gameId', $this->character->game_id)
            ->set('form.characterTypeId', $this->character->character_type_id)
            ->set('form.weaponId', $this->character->characterType->weapon)
            ->set('form.armorId', $this->character->characterType->armor)
            ->set('form.shield', $this->character->characterType->shield)
            ->set('form.raceId', $this->character->race)
            ->set('form.gender', $this->character->gender)
            ->set('form.age', $this->character->age)
            ->set('form.name', $this->character->name)
            ->set('form.nickname', $this->character->nickname)
            ->set('form.personality', $this->character->personality)
            ->set('form.skills', $this->character->skills)
            ->set('form.strength', $this->character->strength)
            ->set('form.dexterity', $this->character->dexterity)
            ->set('form.constitution', $this->character->constitution)
            ->set('form.intelligence', $this->character->intelligence)
            ->set('form.wisdom', $this->character->wisdom)
            ->set('form.charisma', $this->character->charisma)
            ->set('form.height', $this->character->height)
            ->set('form.weight', $this->character->weight)
            ->set('form.health', $this->character->health)
            ->set('form.level', $this->character->level)
            ->call('create')
            // THEN the event should be dispatched with the correct parameters
            ->assertDispatched('closePanel')
            ->assertDispatched('wireui:notification')
            ->assertDispatched('refresh')
            ->assertDispatched('resetAll');

        $this->assertDatabaseHas('characters', [
            'name' => $this->character->name,
            'nickname' => $this->character->nickname,
            'race' => $this->character->race,
            'game_id' => $this->character->game_id,
            'user_id' => $this->user->id,
        ]);
    }

    #[Test]
    public function can_not_create_character_with_some_fields_empty()
    {
        // GIVEN a user is logged in
        $this->actingAs($this->user);

        // WHEN the user wants to create a new character, clicking the button in the create page
        Livewire::test(Create::class)
            // Call the method to create the character
            ->set('form.characterTypeId', $this->character->character_type_id)
            ->set('form.weaponId', $this->character->characterType->weapon)
            ->set('form.armorId', $this->character->characterType->armor)
            ->set('form.shield', $this->character->characterType->shield)
            ->set('form.raceId', $this->character->race)
            ->set('form.gender', $this->character->gender)
            ->set('form.age', $this->character->age)
            ->set('form.nickname', $this->character->nickname)
            ->set('form.personality', $this->character->personality)
            ->set('form.skills', $this->character->skills)
            ->set('form.strength', $this->character->strength)
            ->set('form.dexterity', $this->character->dexterity)
            ->set('form.constitution', $this->character->constitution)
            ->set('form.intelligence', $this->character->intelligence)
            ->set('form.wisdom', $this->character->wisdom)
            ->set('form.charisma', $this->character->charisma)
            ->set('form.height', $this->character->height)
            ->set('form.weight', $this->character->weight)
            ->set('form.health', $this->character->health)
            ->set('form.level', $this->character->level)
            ->call('create')
            // THEN the view shows the errors
            ->assertHasErrors(['form.name', 'form.gameId']);

        $this->assertDatabaseMissing('characters', [
            'name' => $this->character->name,
            'nickname' => $this->character->nickname,
            'race' => $this->character->race,
            'game_id' => $this->character->game_id,
            'user_id' => $this->user->id,
        ]);
    }

    #[Test]
    public function can_not_create_character_by_error()
    {
        // GIVEN a user is logged in
        $this->actingAs($this->user);

        // WHEN the user wants to create a new character, clicking the button in the create page
        Livewire::test(Create::class)
            // Call the method to create the character
            ->set('form.gameId', 999999999)
            ->set('form.characterTypeId', $this->character->character_type_id)
            ->set('form.weaponId', $this->character->characterType->weapon)
            ->set('form.armorId', $this->character->characterType->armor)
            ->set('form.shield', $this->character->characterType->shield)
            ->set('form.raceId', $this->character->race)
            ->set('form.gender', $this->character->gender)
            ->set('form.age', $this->character->age)
            ->set('form.name', $this->character->name)
            ->set('form.nickname', $this->character->nickname)
            ->set('form.personality', $this->character->personality)
            ->set('form.skills', '121212121212')
            ->set('form.strength', $this->character->strength)
            ->set('form.dexterity', $this->character->dexterity)
            ->set('form.constitution', $this->character->constitution)
            ->set('form.intelligence', $this->character->intelligence)
            ->set('form.wisdom', 'asass')
            ->set('form.charisma', $this->character->charisma)
            ->set('form.height', $this->character->height)
            ->set('form.weight', $this->character->weight)
            ->set('form.health', $this->character->health)
            ->set('form.level', $this->character->level)
            ->call('create')
            // THEN Something went wrong
            ->assertDispatched('wireui:notification');

        $this->assertDatabaseMissing('characters', [
            'name' => $this->character->name,
            'nickname' => $this->character->nickname,
            'race' => $this->character->race,
            'game_id' => $this->character->game_id,
            'user_id' => $this->user->id,
        ]);
    }
}
