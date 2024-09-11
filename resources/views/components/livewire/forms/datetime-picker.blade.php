@props([
    'id' => uniqid(),
    'model' => null,
    'value' => null,
    'placeholder' => null,
])

@php
    $monthNames = collect(trans('datetimePicker.months'))->values()->toArray();
    $tz = auth()->user()->timezone;
    $tzLabel = auth()->user()->timeZoneLabel;
@endphp


<div x-data="datetimePicker()" x-init="init();
model = '{{ $model }}';
placeholder = '{{ $placeholder }}';
monthNames = {{ json_encode($monthNames) }};
selectedDate = '{{ $value ? parse_date($value, 'Y-m-d', $tz) : '' }}';
selectedTime = '{{ $value ? parse_date($value, 'H:i', $tz) : '' }}';
generateDays();" class="relative">

    <!-- Botón principal que muestra la fecha y hora seleccionadas -->
    <button @click="toggleDropdown()" x-ref="button"
        class="relative w-full py-2 pl-3 pr-10 text-left border rounded-md shadow-sm cursor-pointer
           {{ $errors->has($model) ? 'border-red-500 ' : 'border-base-300 bg-base-300' }}
           border-base-300 bg-base-300 focus:outline-none focus:ring-1 focus:ring-base-300 focus:border-base-300
           sm:text-sm">
        <div class="truncate flex flex-row items-center gap-1.5">
            <span x-text="showDateTime"></span>
        </div>
        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
            <x-icon name="calendar" class="w-5 h-5 text-base-content" />
        </span>
    </button>

    <!-- Dropdown de selección de fecha y hora, abre directamente con el calendario -->
    <div x-show="open" x-ref="dropdown"
        class="absolute z-50 w-full p-4 mt-2 border rounded-md shadow-lg bg-base-100 border-base-content/30">

        <div>
            <div class="flex items-center justify-center mb-2 font-bold">
                {{ $tzLabel }}
            </div>
        </div>

        <div class="p-2">
            <div class="flex items-center justify-between mb-2">
                <button @click="prevMonth" class="p-1 hover:bg-base-300 hover:text-base-content">
                    <x-icon name="chevron-left" class="w-5 h-5" />
                </button>
                <span x-text="monthYear" class="font-semibold"></span>
                <button @click="nextMonth" class="p-1 hover:bg-base-300 hover:text-base-content">
                    <x-icon name="chevron-right" class="w-5 h-5" />
                </button>
            </div>
            <div class="grid grid-cols-7 gap-1 font-semibold text-center">
                <div>{{ __('datetimePicker.days_short.Sun') }}</div>
                <div>{{ __('datetimePicker.days_short.Mon') }}</div>
                <div>{{ __('datetimePicker.days_short.Tue') }}</div>
                <div>{{ __('datetimePicker.days_short.Wed') }}</div>
                <div>{{ __('datetimePicker.days_short.Thu') }}</div>
                <div>{{ __('datetimePicker.days_short.Fri') }}</div>
                <div>{{ __('datetimePicker.days_short.Sat') }}</div>
            </div>
            <div class="grid grid-cols-7 gap-1 text-center">
                <template x-for="(day, index) in days" :key="index">
                    <button x-text="day.date" @click="selectDate(day.date)"
                        :class="{
                            '!cursor-default': day.date === '',
                            'text-base-content bg-base-300': day.isSelected,
                            'text-base-content hover:bg-base-300 hover:text-base-content':
                                !day.isSelected && day.date != ''
                        }"
                        class="p-2 rounded-full cursor-pointer" :disabled="!day.isValid">
                    </button>
                </template>
            </div>
        </div>
        <!-- Selector de hora -->
        <div class="flex items-center justify-between gap-2">
            <input type="time" x-model="selectedTime"
                class="w-48 p-2 rounded-md shadow-lg cursor-pointer bg-base-100 border-base-content/30">
            <button @click="setDateTime"
                class="flex items-center w-48 gap-2 p-1 hover:bg-base-300 hover:text-base-content flew-row btn border-base-content/30">
                <span>
                    {{ __('datetimePicker.apply') }}
                </span>
                <x-icon name="check" class="w-5 h-5" />
            </button>
        </div>
    </div>

    @error($model)
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>
