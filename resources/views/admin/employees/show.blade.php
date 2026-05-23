<x-app-layout>
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-person me-2"></i>{{ __('Employee Details') }}</h5>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.employees.edit', $employee) }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil"></i> {{ __('Edit') }}
                </a>
                <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> {{ __('Back') }}
                </a>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    @if ($employee->user->avatar)
                        <img src="{{ Storage::url($employee->user->avatar) }}" alt="" class="rounded-circle img-thumbnail" width="200" height="200" style="object-fit: cover;">
                    @else
                        <div class="rounded-circle bg-secondary d-inline-flex align-items-center justify-content-center text-white" style="width: 200px; height: 200px; font-size: 4rem;">
                            {{ strtoupper(substr($employee->user->name, 0, 1)) }}
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <table class="table table-borderless">
                        <tr>
                            <th class="w-25">{{ __('Name') }}</th>
                            <td>{{ $employee->user->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Email') }}</th>
                            <td>{{ $employee->user->email }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Phone') }}</th>
                            <td>{{ $employee->phone ?? '—' }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Department') }}</th>
                            <td>{{ $employee->department }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Position') }}</th>
                            <td>{{ $employee->position }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Salary') }}</th>
                            <td>${{ number_format($employee->salary, 2) }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Hire Date') }}</th>
                            <td>{{ $employee->hire_date->format('M d, Y') }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Status') }}</th>
                            <td>
                                <span class="badge bg-{{ $employee->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($employee->status) }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
