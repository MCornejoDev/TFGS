<div class="sticky top-0 z-50 font-bold navbar bg-base-100">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                <li><a href="{{ route('games.index') }}" wire:navigate><x-heroicon-o-list-bullet
                            class="w-6 h-6" />{{ __('header.games') }}</a></li>
                <li><a href="{{ route('characters.index') }}" wire:navigate><x-heroicon-o-users
                            class="w-6 h-6" />{{ __('header.characters') }}</a></li>
                <li><a href="{{ route('tools.index') }}" wire:navigate><x-fas-dice
                            class="w-6 h-6" />{{ __('header.tools') }}</a></li>
                <li><a href="{{ route('maps.index') }}" wire:navigate><x-heroicon-o-map
                            class="w-6 h-6" />{{ __('header.maps') }}</a></li>
            </ul>
        </div>
        <x-logo :width="75" :height="25" class="cursor-pointer" :redirectToHomePage="true" />
    </div>
    <div class="hidden navbar-center lg:flex">
        <ul class="px-1 menu menu-horizontal">
            <li><a href="{{ route('games.index') }}" wire:navigate><x-heroicon-o-list-bullet
                        class="w-6 h-6" />{{ __('header.games') }}</a></li>
            <li><a href="{{ route('characters.index') }}" wire:navigate><x-heroicon-o-users
                        class="w-6 h-6" />{{ __('header.characters') }}</a></li>
            <li><a href="{{ route('tools.index') }}" wire:navigate><x-fas-dice
                        class="w-6 h-6" />{{ __('header.tools') }}</a></li>
            <li><a href="{{ route('maps.index') }}" wire:navigate><x-heroicon-o-map
                        class="w-6 h-6" />{{ __('header.maps') }}</a>
            </li>
        </ul>
    </div>
    <div class="navbar-end">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img alt="example_avatar.jpg" src="{{ asset('storage/images/example_avatar.jpg') }}" />
                </div>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                <li>
                    <a x-on:click="switchTheme">
                        <span x-show="theme=='light'" class="flex flex-row items-center gap-2"><x-heroicon-s-sun
                                class="w-6 h-6" />{{ __('auth.lightmode') }}</span>
                        <span x-show="theme=='dark'" class="flex flex-row items-center gap-2"><x-heroicon-s-moon
                                class="w-6 h-6" />
                            {{ __('auth.darkmode') }}</span>
                    </a>
                </li>
                <li><a href="{{ route('user.details') }}" wire:navigate><x-heroicon-o-user
                            class="w-6 h-6 hover:bg-transparent" />{{ __('header.profile') }}</a></li>
                <li><a><x-heroicon-o-cog-6-tooth class="w-6 h-6" />{{ __('header.settings') }}</a></li>
                <li><a wire:click='logout'><x-heroicon-o-arrow-right-on-rectangle
                            class="w-6 h-6" />{{ __('header.logout') }}</a></li>
            </ul>
        </div>
    </div>
</div>
