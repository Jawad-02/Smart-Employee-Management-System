<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user()->load('employee'),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->safe()->except(['avatar', 'phone']));

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $user->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        if ($user->employee && $request->filled('phone')) {
            $user->employee->update(['phone' => $request->phone]);
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function downloadCertificate(Request $request): mixed
    {
        $user = $request->user()->load('employee');

        abort_if(! $user->employee, 404, 'No employee record found.');

        $pdf = Pdf::loadView('profile.partials.employment-certificate', compact('user'));

        return $pdf->download("Employment_Certificate_{$user->name}.pdf");
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
