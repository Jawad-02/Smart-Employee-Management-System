<section>
    <h5 class="card-title">{{ __('Profile Information') }}</h5>
    <p class="text-muted small">{{ __("Update your account's profile information and email address.") }}</p>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="text-center mb-4">
            @if ($user->avatar)
                <img src="{{ Storage::url($user->avatar) }}" alt="" class="rounded-circle img-thumbnail" width="120" height="120" style="object-fit: cover;">
            @else
                <div class="rounded-circle bg-secondary d-inline-flex align-items-center justify-content-center text-white" style="width: 120px; height: 120px; font-size: 2.5rem;">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            @endif
            <div class="mt-2">
                <label for="avatar" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-camera me-1"></i>{{ __('Change Photo') }}
                </label>
                <input id="avatar" type="file" name="avatar" class="d-none" accept="image/*" onchange="this.form.submit()">
            </div>
            <x-input-error :messages="$errors->get('avatar')" />
        </div>

        <div class="mb-3">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-warning small mb-1">{{ __('Your email address is unverified.') }}</p>
                    <button form="send-verification" class="btn btn-sm btn-outline-warning">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-success small mt-1">{{ __('A new verification link has been sent to your email address.') }}</p>
                    @endif
                </div>
            @endif
        </div>

        <div class="mb-3">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" name="phone" type="text" :value="old('phone', $user->employee?->phone)" autocomplete="tel" />
            <x-input-error :messages="$errors->get('phone')" />
        </div>

        <div class="d-flex align-items-center gap-3">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <span class="text-success small">{{ __('Saved.') }}</span>
            @endif
        </div>
    </form>
</section>
