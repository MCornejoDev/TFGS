<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('header.login') }}</title>
    <style>
        .background {
            background: url("{{ asset('storage/images/bg-3.jpg') }}");
        }
    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="flex items-center justify-center min-h-screen background">
    <div class="w-full max-w-sm p-8 m-8 text-black bg-white rounded-lg shadow-md">
        <div class="flex flex-col items-center justify-between gap-4 mb-6">
            <x-logo :width="40" :height="25" />
            <h2 class="text-2xl font-bold ">{{ config('app.name') }}</h2>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">{{ __('auth.mail') }}</label>
                <input id="email" name="email" type="email" required autofocus
                    class="block w-full px-3 py-2 mt-1 font-semibold border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ old('email') }}" />
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium">{{ __('auth.pass') }}</label>
                <input id="password" name="password" type="password" required
                    class="block w-full px-3 py-2 mt-1 font-semibold border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-6">
                <input id="remember_me" name="remember" type="checkbox"
                    class="w-4 h-4 text-indigo-600 rounded focus:ring-indigo-500">
                <label for="remember_me" class="block ml-2 text-sm ">
                    {{ __('auth.remember') }}
                </label>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full px-4 py-2 font-bold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('header.login') }}
                </button>
            </div>
        </form>

        <!-- Password Reset Link -->
        @if (Route::has('password.request'))
            <div class="mt-4 text-center">
                <a href="{{ route('password.request') }}"
                    class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">
                    {{ __('auth.forgot') }}
                </a>
            </div>
        @endif
    </div>
</body>

</html>
