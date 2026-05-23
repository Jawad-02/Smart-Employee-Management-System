<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Mail\WelcomeEmployee;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = Employee::with('user');

        if ($search = $request->get('search')) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })->orWhere('department', 'like', "%{$search}%");
        }

        if ($status = $request->get('status')) {
            $query->where('status', $status);
        }

        if ($department = $request->get('department')) {
            $query->where('department', $department);
        }

        $employees = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();
        $departments = Employee::distinct('department')->pluck('department');

        return view('admin.employees.index', compact('employees', 'departments'));
    }

    public function create()
    {
        return view('admin.employees.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        $userData = $request->safe()->only(['name', 'email', 'password']);

        if ($request->hasFile('avatar')) {
            $userData['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $rawPassword = $userData['password'];

        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => Hash::make($rawPassword),
            'role' => 'employee',
            'avatar' => $userData['avatar'] ?? null,
        ]);

        $employeeData = $request->safe()->except(['name', 'email', 'password', 'avatar']);
        $user->employee()->create($employeeData);

        Mail::to($user)->send(new WelcomeEmployee($user, $rawPassword));

        return to_route('admin.employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        $employee->load('user');

        return view('admin.employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $employee->load('user');

        return view('admin.employees.edit', compact('employee'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->load('user');

        $employee->user->update($request->safe()->only(['name', 'email']));

        if ($request->hasFile('avatar')) {
            if ($employee->user->avatar) {
                Storage::disk('public')->delete($employee->user->avatar);
            }
            $employee->user->update([
                'avatar' => $request->file('avatar')->store('avatars', 'public'),
            ]);
        }

        $employeeData = $request->safe()->except(['name', 'email', 'avatar']);
        $employee->update($employeeData);

        return to_route('admin.employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->load('user');

        if ($employee->user->avatar) {
            Storage::disk('public')->delete($employee->user->avatar);
        }

        $employee->user->delete();
        $employee->delete();

        return to_route('admin.employees.index')->with('success', 'Employee deleted successfully.');
    }
}
