@props([
    'items' => [],
    'title' => null,
    'placeholder' => null,
    'model' => null,
    'optionId' => null,
    'optionLabel' => null,
    'optionDescription' => null,
    'dependsOn' => null,
    'api' => null,
    'isFilter' => false,
    'isMultiple' => false,
    'class' => null,
])

<div x-data="form()" x-init="options = JSON.parse('{{ json_encode($items) }}');
model = '{{ $model }}';
setDisabled('{{ $dependsOn }}');
placeholder = '{{ $placeholder }}';
api = '{{ $api }}';
isMultiple = '{{ $isMultiple }}';
goInit();">
    @if ($title)
        <span class="block mb-2 text-sm font-medium text-base-content">
            {{ $title }}
        </span>
    @endif

    <!-- Botón para abrir el dropdown -->
    <div class="relative">
        <div class="flex items-center gap-2 {{ $isFilter ? 'w-80' : '' }}">
            <button @click="open = !open" x-bind:disabled="getDisabled('{{ $dependsOn }}')"
                x-bind:class="{ 'disabled:opacity-75 cursor-not-allowed': isDisabled }"
                class="relative w-full py-2.5 pl-3 pr-10 text-left border rounded-md shadow-sm cursor-pointer
        {{ $errors->has($model) ? 'border-red-500 ' : 'border-base-300 bg-base-300' }}
        border-base-300 bg-base-300 focus:outline-none focus:ring-1 focus:ring-base-300 focus:border-base-300
        sm:text-sm {{ $isFilter ? 'w-80' : '' }} {{ $class }}">
                <div class="truncate flex flex-row items-center gap-1.5">
                    @if ($isMultiple)
                        <span x-text="setMultiLabel()" class="truncate border-1"></span>
                    @else
                        <img :src="setImage()" :alt="setImage()" class="w-6 h-6 rounded-full"
                            x-show="checkIfHasImage" />
                        <span
                            x-text="setLabel('{{ $dependsOn }}','{{ $optionLabel }}','{{ $optionDescription }}')"></span>
                        <span x-show="checkIfHasDescription('{{ $optionDescription }}')"
                            x-text="setDescription('{{ $optionDescription }}')"></span>
                    @endif
                </div>
                <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                    <x-icon name="chevron-down" class="w-5 h-5 text-base-content" x-show="open" />
                    <x-icon name="chevron-up" class="w-5 h-5 text-base-content" x-show="!open" />
                </span>
            </button>
            @if ($isFilter)
                @if ($isMultiple)
                    <x-mini-button negative icon="x-mark" flat x-on:click="clearFilter('{{ $model }}')"
                        x-bind:disabled="!selectedMultiple.length" />
                @else
                    <x-mini-button negative icon="x-mark" flat x-on:click="clearFilter('{{ $model }}')"
                        x-bind:disabled="!selected" />
                @endif
            @endif
        </div>


        <!-- Opciones del dropdown -->
        <div x-show="open" @click.away="open = false"
            class="absolute z-10 w-full mt-1 border rounded-md shadow-lg bg-base-100 border-base-content/30 ">
            <!-- Campo de búsqueda x-show="options.length > 5"-->
            <div class="p-2">
                <input type="text" x-model="searchQuery" placeholder="{{ __('filters.search') }}"
                    @input.debounce.500="fetchFilteredOptions('{{ $optionLabel }}')"
                    class="w-full px-3 py-2 text-sm font-bold border rounded-md text-base-content bg-base-30 input input-bordered placeholder:text-sm placeholder:font-bold">
            </div>
            <ul
                class="py-1 overflow-auto rounded-md text-base-content max-h-60 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                <template x-for="(option, index) in options" :key="option.id + '-' + index">
                    <li x-on:click="handleSelect(option)"
                        :class="{
                            'text-base-content bg-base-300': (selected && selected.id === option.id) || isMultiple &&
                                selectedMultiple.includes(option),
                            'text-base-content hover:bg-base-300 hover:text-base-content': !(selected && selected
                                .id ===
                                option.id) || isMultiple && !selectedMultiple.includes(option)
                        }"
                        class="relative py-2 pl-3 cursor-pointer select-none pr-9 hover:text-base-content text-base-content">
                        <div
                            :class="{
                                'flex flex-col': !option.image,
                                'flex flex-row items-center gap-1.5': option.image
                            }">
                            <img :src="option.image" :alt="option.image" class="w-6 h-6 rounded-full"
                                x-show="option.image" />
                            <span x-text="option.{{ $optionLabel }}"
                                :class="{
                                    'font-semibold': selected && selected.id === option.id,
                                    'font-bold': !(selected && selected.id === option.id)
                                }"
                                class="block "></span>
                            <span x-text="getTextDescription(option.id, '{{ $optionDescription }}')"
                                class="text-sm text-base-content"></span>
                        </div>
                    </li>
                </template>
                <li x-show="!options.length" class="my-2 text-center text-base-content">
                    <span class="flex flex-row items-center text-sm text-base-content gap-1.5 justify-center font-bold">
                        {{ __('filters.no_results') }}
                        <x-icon name="exclamation-triangle" class="w-5 h-5 text-base-content" />
                    </span>
                </li>
            </ul>
        </div>
    </div>

    @error($model)
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>
