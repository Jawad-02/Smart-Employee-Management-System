<x-app-layout>
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h5 class="mb-0"><i class="bi bi-speedometer2 me-2"></i>{{ __('Dashboard') }}</h5>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-6 col-lg-3">
            <div class="card bg-primary text-white border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <h6 class="card-title">{{ __('Total Employees') }}</h6>
                    <p class="display-6 mb-0 fw-bold" id="totalEmployees">0</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card bg-success text-white border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <h6 class="card-title">{{ __('Active') }}</h6>
                    <p class="display-6 mb-0 fw-bold" id="activeEmployees">0</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card bg-secondary text-white border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <h6 class="card-title">{{ __('Inactive') }}</h6>
                    <p class="display-6 mb-0 fw-bold" id="inactiveEmployees">0</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card bg-info text-white border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <h6 class="card-title">{{ __('Departments') }}</h6>
                    <p class="display-6 mb-0 fw-bold" id="totalDepartments">0</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h6 class="mb-0"><i class="bi bi-clock-history me-2"></i>{{ __('Recent Hires') }}</h6>
                    <a href="{{ route('admin.employees.index') }}" class="btn btn-sm btn-outline-primary">{{ __('View All') }}</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Department') }}</th>
                                <th>{{ __('Hire Date') }}</th>
                                <th>{{ __('Status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentHires as $hire)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            @if ($hire->user->avatar)
                                                <img src="{{ Storage::url($hire->user->avatar) }}" alt="" class="rounded-circle" width="28" height="28" style="object-fit: cover;">
                                            @else
                                                <span class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.7rem; font-weight: 600;">
                                                    {{ strtoupper(substr($hire->user->name, 0, 1)) }}
                                                </span>
                                            @endif
                                            <span>{{ $hire->user->name }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $hire->department }}</td>
                                    <td>{{ $hire->hire_date->format('M d, Y') }}</td>
                                    <td>
                                        <span class="badge bg-{{ $hire->status === 'active' ? 'success' : 'secondary' }}">
                                            {{ ucfirst($hire->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-3 text-muted">{{ __('No employees yet.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white">
                    <h6 class="mb-0"><i class="bi bi-building me-2"></i>{{ __('Department Summary') }}</h6>
                </div>
                <div class="card-body">
                    @forelse ($departmentSummary as $dept)
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0" style="width: 120px;">
                                <small class="fw-medium">{{ $dept->department }}</small>
                            </div>
                            <div class="flex-grow-1 mx-3">
                                <div class="progress" style="height: 8px;">
                                    @php
                                        $maxCount = $departmentSummary->max('count');
                                        $width = $maxCount > 0 ? ($dept->count / $maxCount) * 100 : 0;
                                    @endphp
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $width }}%"></div>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="badge bg-primary rounded-pill">{{ $dept->count }}</span>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted text-center mb-0">{{ __('No departments yet.') }}</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h6 class="mb-0"><i class="bi bi-bar-chart me-2"></i>{{ __('Employee Status') }}</h6>
                </div>
                <div class="card-body">
                    <canvas id="statusChart" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h6 class="mb-0"><i class="bi bi-pie-chart me-2"></i>{{ __('Employees by Department') }}</h6>
                </div>
                <div class="card-body">
                    <canvas id="departmentChart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h6 class="mb-1"><i class="bi bi-lightning me-2"></i>{{ __('Quick Actions') }}</h6>
                <p class="text-muted small mb-0">{{ __('Manage your workforce efficiently.') }}</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.employees.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-1"></i>{{ __('Add Employee') }}
                </a>
                <a href="{{ route('admin.employees.index') }}" class="btn btn-outline-primary">
                    <i class="bi bi-people me-1"></i>{{ __('All Employees') }}
                </a>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const stats = @json($stats ?? []);
            document.getElementById('totalEmployees').textContent = stats.total ?? 0;
            document.getElementById('activeEmployees').textContent = stats.active ?? 0;
            document.getElementById('inactiveEmployees').textContent = stats.inactive ?? 0;
            document.getElementById('totalDepartments').textContent = stats.departments ?? 0;

            new Chart(document.getElementById('statusChart'), {
                type: 'bar',
                data: {
                    labels: ['Active', 'Inactive'],
                    datasets: [{
                        label: 'Employees',
                        data: [stats.active ?? 0, stats.inactive ?? 0],
                        backgroundColor: ['#198754', '#6c757d']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
                }
            });

            new Chart(document.getElementById('departmentChart'), {
                type: 'pie',
                data: {
                    labels: stats.departmentLabels ?? [],
                    datasets: [{
                        data: stats.departmentCounts ?? [],
                        backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#dc3545', '#0dcaf0', '#6f42c1', '#fd7e14', '#20c997']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { position: 'bottom' } }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
