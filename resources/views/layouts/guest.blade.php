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
    </head>
    <body class="bg-light">
        <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center py-5">
            <div class="mb-4">
                <a href="/">
                    <img src="/logo.svg" alt="SEMS" width="72" height="72" class="d-block mx-auto">
                </a>
            </div>

            <div class="card shadow-sm" style="max-width: 450px; width: 100%;">
                <div class="card-body p-4">
                    {{ $slot }}
                </div>
            </div>
        </div>

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
