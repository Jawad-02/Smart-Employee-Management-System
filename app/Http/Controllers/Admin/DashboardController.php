<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $total = Employee::count();
        $active = Employee::where('status', 'active')->count();
        $inactive = Employee::where('status', 'inactive')->count();
        $departments = Employee::distinct('department')->count('department');

        $departmentStats = Employee::selectRaw('department, COUNT(*) as count')
            ->groupBy('department')
            ->get();

        $recentHires = Employee::with('user')
            ->orderBy('hire_date', 'desc')
            ->take(5)
            ->get();

        $departmentSummary = Employee::selectRaw('department, COUNT(*) as count')
            ->groupBy('department')
            ->orderBy('count', 'desc')
            ->get();

        $stats = [
            'total' => $total,
            'active' => $active,
            'inactive' => $inactive,
            'departments' => $departments,
            'departmentLabels' => $departmentStats->pluck('department'),
            'departmentCounts' => $departmentStats->pluck('count'),
        ];

        return view('dashboard', compact('stats', 'recentHires', 'departmentSummary'));
    }
}
