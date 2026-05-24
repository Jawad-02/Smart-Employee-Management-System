<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} — About</title>
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
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">
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

        <main class="flex-grow-1">
            <div class="container py-5">

                <!-- Hero -->
                <div class="row align-items-center g-4 mb-5">
                    <div class="col-lg-4 text-center text-lg-end">
                        <img src="/me.jpg" alt="Jawad Merwah" class="rounded-circle shadow border border-2 border-white" width="220" height="220" style="object-fit: cover;">
                    </div>
                    <div class="col-lg-8">
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 mb-3">
                            <i class="bi bi-person me-1"></i>Creator & Developer
                        </span>
                        <h1 class="display-5 fw-bold mb-2">Jawad Merwah</h1>
                        <p class="lead text-muted mb-3">Full Stack Web Developer</p>
                        <p class="text-muted mb-4">
                            Passionate about building clean, functional web applications. I specialize in Laravel, PHP, and modern frontend technologies.
                        </p>
                        <div class="d-flex gap-2">
                            <a href="https://github.com/Jawad-02" target="_blank" class="btn btn-dark btn-sm">
                                <i class="bi bi-github me-1"></i>GitHub
                            </a>
                            <a href="https://www.linkedin.com/in/jawad-merwah-659b36296/" target="_blank" class="btn btn-primary btn-sm">
                                <i class="bi bi-linkedin me-1"></i>LinkedIn
                            </a>
                            <a href="https://www.upwork.com/freelancers/~01cf1ba17b659b7d92" target="_blank" class="btn btn-success btn-sm">
                                <i class="bi bi-box-arrow-up-right me-1"></i>Upwork
                            </a>
                        </div>
                    </div>
                </div>

                <!-- About Project -->
                <div class="row g-4 mb-5">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-5">
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <div class="bg-primary bg-opacity-10 rounded-3 p-3">
                                        <i class="bi bi-info-circle text-primary" style="font-size: 1.5rem;"></i>
                                    </div>
                                    <div>
                                        <h4 class="mb-1">About This Project</h4>
                                        <p class="text-muted mb-0">Smart Employee Management System (SEMS)</p>
                                    </div>
                                </div>

                                <p>
                                    This website has been created by <strong>Jawad Merwah</strong> for showcase purposes.
                                    It is an open-source project built with <strong>Laravel 13</strong>, <strong>Bootstrap 5</strong>,
                                    and <strong>MySQL</strong>, featuring role-based access control, employee CRUD operations,
                                    PDF certificate generation, and more.
                                </p>
                                <p>
                                    Feel free to explore the source code, report issues, or contribute on GitHub.
                                </p>

                                <a href="https://github.com/Jawad-02/Smart-Employee-Management-System" target="_blank" class="btn btn-dark mt-2">
                                    <i class="bi bi-github me-1"></i>View Source Code on GitHub
                                </a>

                                <hr class="my-4">

                                <div class="row g-3">
                                    <div class="col-sm-4">
                                        <div class="text-center p-3 bg-light rounded-3">
                                            <i class="bi bi-cup-hot fs-2 text-primary mb-2 d-block"></i>
                                            <h6 class="mb-1">Built with Passion</h6>
                                            <small class="text-muted">by Jawad Merwah</small>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-center p-3 bg-light rounded-3">
                                            <i class="bi bi-code-slash fs-2 text-primary mb-2 d-block"></i>
                                            <h6 class="mb-1">Open Source</h6>
                                            <small class="text-muted">Free to use and modify</small>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-center p-3 bg-light rounded-3">
                                            <i class="bi bi-briefcase fs-2 text-primary mb-2 d-block"></i>
                                            <h6 class="mb-1">Business Ready</h6>
                                            <small class="text-muted">Custom solutions available</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 p-4 bg-primary bg-opacity-10 rounded-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <i class="bi bi-envelope text-primary" style="font-size: 1.5rem;"></i>
                                        <div>
                                            <h6 class="mb-1">Need a custom system for your business?</h6>
                                            <p class="text-muted small mb-0">
                                                Don't feel shy — reach out using the form below and I'll get back to you.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="row g-4">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-5">
                                <div class="text-center mb-4">
                                    <div class="bg-primary bg-opacity-10 rounded-3 p-3 d-inline-block mb-3">
                                        <i class="bi bi-chat-dots text-primary" style="font-size: 1.5rem;"></i>
                                    </div>
                                    <h4>Get In Touch</h4>
                                    <p class="text-muted">Have a question or want to work together? Send me a message.</p>
                                </div>

                                @if (session('success'))
                                    <div class="alert alert-success d-flex align-items-center gap-2">
                                        <i class="bi bi-check-circle"></i>
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('contact') }}">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="name" class="form-label">Your Name</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="John Doe">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Your Email</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="john@example.com">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="subject" class="form-label">Subject</label>
                                            <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required placeholder="What's this about?">
                                            @error('subject')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="message" class="form-label">Message</label>
                                            <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" rows="5" required placeholder="Your message here...">{{ old('message') }}</textarea>
                                            @error('message')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary px-5">
                                                <i class="bi bi-send me-1"></i>Send Message
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <footer class="bg-white border-top py-4 mt-4">
            <div class="container">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-2">
                    <p class="text-muted small mb-0">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                    <div class="d-flex gap-3">
                        <a href="https://github.com/Jawad-02" target="_blank" class="text-muted small text-decoration-none">
                            <i class="bi bi-github"></i> GitHub
                        </a>
                        <a href="https://www.linkedin.com/in/jawad-merwah-659b36296/" target="_blank" class="text-muted small text-decoration-none">
                            <i class="bi bi-linkedin"></i> LinkedIn
                        </a>
                        <a href="https://www.upwork.com/freelancers/~01cf1ba17b659b7d92" target="_blank" class="text-muted small text-decoration-none">
                            <i class="bi bi-box-arrow-up-right"></i> Upwork
                        </a>
                    </div>
                </div>
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
