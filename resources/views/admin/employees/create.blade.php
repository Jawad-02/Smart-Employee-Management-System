<x-app-layout>
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h5 class="mb-0"><i class="bi bi-person-plus me-2"></i>{{ __('Add Employee') }}</h5>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">{{ __('Employee Information') }}</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.employees.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" />
                    </div>

                    <div class="col-md-6">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" type="email" name="email" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" />
                    </div>

                    <div class="col-md-6">
                        <x-input-label for="password" :value="__('Password')" />
                        <div class="input-group">
                            <x-text-input id="password" type="password" name="password" required />
                            <button class="btn btn-outline-secondary" type="button" data-toggle-password="password">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" />
                    </div>

                    <div class="col-md-6">
                        <x-input-label for="phone" :value="__('Phone')" />
                        <x-text-input id="phone" type="text" name="phone" :value="old('phone')" />
                        <x-input-error :messages="$errors->get('phone')" />
                    </div>

                    <div class="col-md-6">
                        <x-input-label for="department" :value="__('Department')" />
                        <select id="department" name="department" class="form-select" required>
                            <option value="">{{ __('Select Department') }}</option>
                            <option value="Engineering" @selected(old('department') === 'Engineering')>Engineering</option>
                            <option value="Marketing" @selected(old('department') === 'Marketing')>Marketing</option>
                            <option value="Sales" @selected(old('department') === 'Sales')>Sales</option>
                            <option value="HR" @selected(old('department') === 'HR')>HR</option>
                            <option value="Finance" @selected(old('department') === 'Finance')>Finance</option>
                            <option value="Operations" @selected(old('department') === 'Operations')>Operations</option>
                        </select>
                        <x-input-error :messages="$errors->get('department')" />
                    </div>

                    <div class="col-md-6">
                        <x-input-label for="position" :value="__('Position')" />
                        <x-text-input id="position" type="text" name="position" :value="old('position')" required />
                        <x-input-error :messages="$errors->get('position')" />
                    </div>

                    <div class="col-md-6">
                        <x-input-label for="salary" :value="__('Salary')" />
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <x-text-input id="salary" type="number" step="0.01" name="salary" :value="old('salary')" required />
                        </div>
                        <x-input-error :messages="$errors->get('salary')" />
                    </div>

                    <div class="col-md-6">
                        <x-input-label for="hire_date" :value="__('Hire Date')" />
                        <x-text-input id="hire_date" type="date" name="hire_date" :value="old('hire_date')" required />
                        <x-input-error :messages="$errors->get('hire_date')" />
                    </div>

                    <div class="col-md-6">
                        <x-input-label for="status" :value="__('Status')" />
                        <select id="status" name="status" class="form-select" required>
                            <option value="active" @selected(old('status', 'active') === 'active')>{{ __('Active') }}</option>
                            <option value="inactive" @selected(old('status') === 'inactive')>{{ __('Inactive') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" />
                    </div>

                    <div class="col-md-6">
                        <x-input-label for="avatar" :value="__('Avatar')" />
                        <input id="avatar" type="file" name="avatar" class="form-control" accept="image/*">
                        <x-input-error :messages="$errors->get('avatar')" />
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                    <x-primary-button>{{ __('Save Employee') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
