<x-app-layout>
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h5 class="mb-0"><i class="bi bi-person-gear me-2"></i>{{ __('Profile') }}</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-4">
                        @if ($user->avatar)
                            <img src="{{ Storage::url($user->avatar) }}" alt="" class="rounded-circle img-thumbnail" width="80" height="80" style="object-fit: cover;">
                        @else
                            <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white" style="width: 80px; height: 80px; font-size: 2rem; font-weight: 600;">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        @endif
                        <div>
                            <h4 class="mb-1">{{ $user->name }}</h4>
                            <span class="badge bg-{{ $user->isAdmin() ? 'danger' : 'primary' }} me-2">
                                <i class="bi bi-shield me-1"></i>{{ ucfirst($user->role) }}
                            </span>
                            @if ($user->employee)
                                <span class="text-muted small">{{ $user->employee->department }} &middot; {{ $user->employee->position }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        @if ($user->employee)
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-briefcase me-2"></i>{{ __('Employment Details') }}</h5>
                        <hr>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="text-muted small text-uppercase mb-1">{{ __('Employee ID') }}</label>
                                <p class="fw-semibold mb-0">{{ $user->employee->id }}</p>
                            </div>
                            <div class="col-sm-6">
                                <label class="text-muted small text-uppercase mb-1">{{ __('Department') }}</label>
                                <p class="fw-semibold mb-0">{{ $user->employee->department }}</p>
                            </div>
                            <div class="col-sm-6">
                                <label class="text-muted small text-uppercase mb-1">{{ __('Position') }}</label>
                                <p class="fw-semibold mb-0">{{ $user->employee->position }}</p>
                            </div>
                            <div class="col-sm-6">
                                <label class="text-muted small text-uppercase mb-1">{{ __('Phone') }}</label>
                                <p class="fw-semibold mb-0">{{ $user->employee->phone ?? '—' }}</p>
                            </div>
                            <div class="col-sm-6">
                                <label class="text-muted small text-uppercase mb-1">{{ __('Hire Date') }}</label>
                                <p class="fw-semibold mb-0">{{ $user->employee->hire_date->format('M d, Y') }}</p>
                            </div>
                            <div class="col-sm-6">
                                <label class="text-muted small text-uppercase mb-1">{{ __('Status') }}</label>
                                <p class="fw-semibold mb-0">
                                    @if ($user->employee->status === 'active')
                                        <span class="badge bg-success">{{ __('Active') }}</span>
                                    @elseif ($user->employee->status === 'inactive')
                                        <span class="badge bg-secondary">{{ __('Inactive') }}</span>
                                    @else
                                        <span class="badge bg-warning text-dark">{{ ucfirst($user->employee->status) }}</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <label class="text-muted small text-uppercase mb-1">{{ __('Salary') }}</label>
                                <p class="fw-semibold mb-0">${{ number_format($user->employee->salary, 2) }}</p>
                            </div>
                        </div>

                        <hr>
                        <a href="{{ route('profile.certificate') }}" class="btn btn-outline-primary">
                            <i class="bi bi-filetype-pdf me-1"></i>{{ __('Download Employment Certificate') }}
                        </a>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-12">
            <div class="card border-0 shadow-sm border-danger">
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
