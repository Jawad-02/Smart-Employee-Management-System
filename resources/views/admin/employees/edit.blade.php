<x-app-layout>
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h5 class="mb-0"><i class="bi bi-pencil me-2"></i>{{ __('Edit Employee') }}</h5>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">{{ __('Employee Information') }}</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.employees.update', $employee) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" type="text" name="name" :value="old('name', $employee->user->name)" required autofocus />
                        <x-input-error :messages="$errors->get('name')" />
                    </div>

                    <div class="col-md-6">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" type="email" name="email" :value="old('email', $employee->user->email)" required />
                        <x-input-error :messages="$errors->get('email')" />
                    </div>

                    <div class="col-md-6">
                        <x-input-label for="phone" :value="__('Phone')" />
                        <x-text-input id="phone" type="text" name="phone" :value="old('phone', $employee->phone)" />
                        <x-input-error :messages="$errors->get('phone')" />
                    </div>

                    <div class="col-md-6">
                        <x-input-label for="department" :value="__('Department')" />
                        <select id="department" name="department" class="form-select" required>
                            <option value="">{{ __('Select Department') }}</option>
                            @foreach (['Engineering', 'Marketing', 'Sales', 'HR', 'Finance', 'Operations'] as $dept)
                                <option value="{{ $dept }}" @selected(old('department', $employee->department) === $dept)>{{ $dept }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('department')" />
                    </div>

                    <div class="col-md-6">
                        <x-input-label for="position" :value="__('Position')" />
                        <x-text-input id="position" type="text" name="position" :value="old('position', $employee->position)" required />
                        <x-input-error :messages="$errors->get('position')" />
                    </div>

                    <div class="col-md-6">
                        <x-input-label for="salary" :value="__('Salary')" />
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <x-text-input id="salary" type="number" step="0.01" name="salary" :value="old('salary', $employee->salary)" required />
                        </div>
                        <x-input-error :messages="$errors->get('salary')" />
                    </div>

                    <div class="col-md-6">
                        <x-input-label for="hire_date" :value="__('Hire Date')" />
                        <x-text-input id="hire_date" type="date" name="hire_date" :value="old('hire_date', $employee->hire_date->format('Y-m-d'))" required />
                        <x-input-error :messages="$errors->get('hire_date')" />
                    </div>

                    <div class="col-md-6">
                        <x-input-label for="status" :value="__('Status')" />
                        <select id="status" name="status" class="form-select" required>
                            <option value="active" @selected(old('status', $employee->status) === 'active')>{{ __('Active') }}</option>
                            <option value="inactive" @selected(old('status', $employee->status) === 'inactive')>{{ __('Inactive') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" />
                    </div>

                    <div class="col-md-6">
                        <x-input-label for="avatar" :value="__('Avatar')" />
                        @if ($employee->user->avatar)
                            <div class="mb-2">
                                <img src="{{ Storage::url($employee->user->avatar) }}" alt="" class="rounded border" width="100" height="100" style="object-fit: cover;">
                            </div>
                        @else
                            <div class="mb-2 d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white" style="width: 50px; height: 50px; font-size: 1.2rem;">
                                    {{ strtoupper(substr($employee->user->name, 0, 1)) }}
                                </div>
                                <small class="text-muted">{{ __('No avatar set') }}</small>
                            </div>
                        @endif
                        <input id="avatar" type="file" name="avatar" class="form-control" accept="image/*">
                        <x-input-error :messages="$errors->get('avatar')" />
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                    <x-primary-button>{{ __('Update Employee') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
