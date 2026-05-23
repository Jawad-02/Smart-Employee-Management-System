<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/about', 'about')->name('about');

Route::post('/contact', function () {
    $data = request()->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'subject' => ['required', 'string', 'max:255'],
        'message' => ['required', 'string', 'min:10'],
    ]);

    Mail::to('me@jawadmerwah.dev')->send(
        new ContactMessage($data['name'], $data['email'], $data['subject'], $data['message']),
    );

    return back()->with('success', 'Thank you! Your message has been sent successfully.');
})->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();

        return $user->isAdmin()
            ? to_route('admin.dashboard')
            : to_route('profile.edit');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/certificate', [ProfileController::class, 'downloadCertificate'])->name('profile.certificate');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('employees', EmployeeController::class);
});

require __DIR__.'/auth.php';
