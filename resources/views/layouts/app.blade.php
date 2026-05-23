<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/svg+xml" href="/logo.svg">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('head')
    </head>
    <body class="bg-light d-flex flex-column min-vh-100">
        @include('layouts.navigation')

        <main class="flex-grow-1 py-4">
            <div class="container">
                {{ $slot }}
            </div>
        </main>

        <footer class="bg-white border-top py-3 mt-auto">
            <div class="container text-center">
                <p class="text-muted small mb-0">&copy; {{ date('Y') }} SEMS. All rights reserved.</p>
            </div>
        </footer>

        @stack('scripts')

        <script>
            document.addEventListener('click', function (e) {
                const btn = e.target.closest('[data-toggle-password]');
                if (!btn) return;
                const input = document.getElementById(btn.getAttribute('data-toggle-password'));
                if (!input) return;
                const icon = btn.querySelector('i');
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.replace('bi-eye', 'bi-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.replace('bi-eye-slash', 'bi-eye');
                }
            });
        </script>
    </body>
</html>
