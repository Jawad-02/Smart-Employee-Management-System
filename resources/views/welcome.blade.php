<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Smart Employee Management System') }}</title>
    <link rel="icon" type="image/svg+xml" href="/logo.svg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <div class="min-vh-100 d-flex flex-column">
        <nav class="navbar navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ url('/') }}">
                    <img src="/logo.svg" alt="SEMS" width="30" height="30" class="me-2">
                    SEMS
                </a>
                <div>
                    <a href="{{ route('about') }}" class="btn btn-outline-primary btn-sm me-2">
                        <i class="bi bi-info-circle me-1"></i>About
                    </a>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-speedometer2 me-1"></i>Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Login
                        </a>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="flex-grow-1 d-flex align-items-center">
            <div class="container py-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 mb-3">
                                <i class="bi bi-gear-wide-connected me-1"></i>Employee Management
                            </span>
                            <h1 class="display-4 fw-bold mb-3">
                                Smart Employee<br>
                                <span class="text-primary">Management System</span>
                            </h1>
                            <p class="lead text-muted mb-4">
                                Streamline your workforce management with our comprehensive platform.
                                Manage employees, track performance, and gain insights with ease.
                            </p>
                        </div>

                        @auth
                            <div class="d-flex gap-3">
                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-lg px-4">
                                        <i class="bi bi-speedometer2 me-2"></i>Go to Dashboard
                                    </a>
                                    <a href="{{ route('admin.employees.index') }}" class="btn btn-outline-primary btn-lg px-4">
                                        <i class="bi bi-people me-2"></i>View Employees
                                    </a>
                                @else
                                    <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-lg px-4">
                                        <i class="bi bi-person me-2"></i>My Profile
                                    </a>
                                    <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-lg px-4">
                                        <i class="bi bi-house me-2"></i>Dashboard
                                    </a>
                                @endif
                            </div>
                        @else
                            <div class="d-flex gap-3">
                                <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                                </a>
                                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg px-4">
                                    <i class="bi bi-person-plus me-2"></i>Register
                                </a>
                            </div>
                        @endauth

                        <div class="mt-5 pt-3 border-top">
                            <div class="row g-4 text-center">
                                <div class="col-4">
                                    <h3 class="fw-bold text-primary mb-0">25+</h3>
                                    <small class="text-muted">Employees</small>
                                </div>
                                <div class="col-4">
                                    <h3 class="fw-bold text-primary mb-0">6</h3>
                                    <small class="text-muted">Departments</small>
                                </div>
                                <div class="col-4">
                                    <h3 class="fw-bold text-primary mb-0">2</h3>
                                    <small class="text-muted">Roles</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card shadow-lg border-0">
                            <div class="card-body p-5">
                                @auth
                                    <div class="text-center py-4">
                                        <i class="bi bi-check-circle text-success" style="font-size: 4rem;"></i>
                                        <h4 class="mt-3">Welcome back, {{ auth()->user()->name }}!</h4>
                                        <p class="text-muted">You are logged in as <strong>{{ ucfirst(auth()->user()->role) }}</strong></p>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger mt-2">
                                                <i class="bi bi-box-arrow-right me-1"></i>Logout
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="login-email" class="form-label">Email</label>
                                            <input id="login-email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="name@example.com">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="login-password" class="form-label">Password</label>
                                            <div class="input-group">
                                                <input id="login-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="********">
                                                <button class="btn btn-outline-secondary" type="button" data-toggle-password="login-password">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </div>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                            <label class="form-check-label" for="remember">Remember me</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100 mb-2">Login</button>
                                        @if (Route::has('password.request'))
                                            <div class="text-center">
                                                <a href="{{ route('password.request') }}" class="text-decoration-none small">Forgot your password?</a>
                                            </div>
                                        @endif
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-white border-top py-3">
            <div class="container text-center">
                <p class="text-muted small mb-0">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            </div>
        </footer>
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
