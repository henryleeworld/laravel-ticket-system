<!DOCTYPE html>
<html x-data="data" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css'])
    </head>
    <body>
        <div class="flex h-screen bg-gray-50" :class="{ 'overflow-hidden': isSideMenuOpen }">
            <!-- Desktop sidebar -->
            @include('layouts.navigation')
            <!-- Mobile sidebar -->
            <!-- Backdrop -->
            @include('layouts.navigation-mobile')
            <div class="flex flex-col flex-1 w-full">
                @include('layouts.top-menu')
                <main class="h-full overflow-y-auto">
                    <div class="container px-6 mx-auto grid">
                        @if (isset($header))
                            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                                {{ $header }}
                            </h2>
                        @endif

                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
        <!-- Scripts -->
        @vite(['resources/js/app.js'])
        <script src="{{ asset('js/init-alpine.js') }}"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputElement = document.querySelector('input[type="file"]');

            const pond = FilePond.create(inputElement, {
                server: {
                    url: '{{ route('tickets.upload') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            });
        });
        </script>
    </body>
</html>
