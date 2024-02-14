<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('partials.favicon')

    @stack('social-meta')

    <title>{{ $pageTitle }}</title>

    <!-- Fonts -->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="bg-white">
    <div class="relative overflow-hidden">
        <header class="relative">
            <div class="py-6 bg-indigo-500">
                <nav class="relative flex items-center justify-between px-4 mx-auto max-w-7xl sm:px-6"
                     aria-label="Global">
                    <div class="flex items-center flex-1">
                        <div class="flex items-center justify-between w-full">
                            <a href="{{ route('page.home') }}">
                                <span class="sr-only">LaravelCasts</span>
                                <img class="w-auto h-8 sm:h-10"
                                     src="{{ asset('images/tv_logo.png') }}"
                                     alt="An illustrated TV as logo for LaraCasts">
                            </a>
                        </div>
                        <div class="flex ml-10 space-x-8">
                            <a href="{{ route('page.home') }}" class="text-2xl font-medium text-white">Laravel<span
                                    class="font-bold">Casts</span></a>
                        </div>
                    </div>
                    <div class="flex items-center space-x-6">

                        @guest
                            <a class="text-base font-medium text-white hover:text-gray-300" href="{{ route('login') }}">Login</a>
                        @else
                            <a href="{{ route('page.dashboard') }}"
                               class="inline-flex items-center px-4 py-2 text-base font-medium text-white bg-gray-600 border border-transparent rounded-md hover:bg-gray-700">Dashboard</a>
                        @endguest
                    </div>
                </nav>
            </div>
        </header>
        {{ $slot }}

        @include('partials.footer')

    </div>
</div>

<!-- Scripts -->
@stack('scripts')

</body>
</html>
