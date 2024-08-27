<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="themeSwitcher()" data-theme="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @wireUiScripts

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @livewire('layout.header')
    @includeWhen(!request()->routeIs('home'), 'components.livewire.breadcrumbs')
    <div
        class="relative flex flex-col min-h-screen pb-8 bg-center sm:flex sm:justify-center sm:items-center bg-dots selection:bg-indigo-500 selection:text-white">
        <div class="flex-grow w-full px-4 sm:px-6 lg:px-8">
            @yield('body')
        </div>
    </div>
    {{-- @livewire('layout.footer') --}}
    <x-dialog z-index="z-50" blur="md" align="center" />
    <x-notifications z-index="z-50" />
    @include('components.livewire.scripts')
</body>

</html>
