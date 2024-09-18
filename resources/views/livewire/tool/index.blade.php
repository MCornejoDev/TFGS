<div class="p-4 border rounded-md shadow-lg h-96 border-base-content/30 bg-base-100">
    <div x-data="diceRoller2" class="w-52">
        <x-livewire.forms.select :items="$this->toolTypes" title="{{ __('tools.dice_roller.title') }}"
            placeholder="{{ __('tools.dice_roller.placeholder') }}" model="die" optionId="id" optionLabel="name" />

        <div class="ui_dice">
            <div class="platform" :class="{ 'stop': !isPlaying, 'playing': isPlaying }" x-ref="platform">
                <x-livewire.dices.six />
            </div>
        </div>
    </div>
</div>
