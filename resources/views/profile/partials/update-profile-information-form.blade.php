<section>
    <header>
        <h2 class="text-lg font-medium text-gray-200">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-400">
            {{ __('Update profile kamu.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="nama" style="color: #E2E8F0;">{{ __('Name') }}</x-input-label>
            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" :value="old('nama', $user->nama)" required autofocus autocomplete="nama" style="background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568;" />
            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
        </div>

        <div>
            <x-input-label for="alamat" style="color: #E2E8F0;">{{ __('Alamat') }}</x-input-label>
            <x-text-input id="alamat" name="alamat" type="text" class="mt-1 block w-full" :value="old('alamat', $user->alamat)" required autocomplete="alamat" style="background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568;" />
            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
        </div>

        <div>
            <x-input-label for="telepon" style="color: #E2E8F0;">{{ __('No HP') }}</x-input-label>
            <x-text-input id="telepon" name="telepon" type="number" class="mt-1 block w-full" :value="old('telepon', $user->telepon)" required autocomplete="telepon" style="background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568;" />
            <x-input-error class="mt-2" :messages="$errors->get('telepon')" />
        </div>

        <div>
            <x-input-label for="identitas" style="color: #E2E8F0;">{{ __('NIS / NIP') }}</x-input-label>
            <x-text-input id="identitas" name="identitas" type="text" class="mt-1 block w-full" :value="old('identitas', $user->identitas)" required autocomplete="identitas" style="background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568;" />
            <x-input-error class="mt-2" :messages="$errors->get('identitas')" />
        </div>

        <div>
            <x-input-label for="kelas" style="color: #E2E8F0;">{{ __('Kelas') }}</x-input-label>
            <x-text-input id="kelas" name="kelas" type="text" class="mt-1 block w-full" :value="old('kelas', $user->kelas)" required autocomplete="kelas" style="background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568;" />
            <x-input-error class="mt-2" :messages="$errors->get('kelas')" />
        </div>

        <div>
            <x-input-label for="email" style="color: #E2E8F0;">{{ __('Email') }}</x-input-label>
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" style="background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568;" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-400 hover:text-gray-300">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button style="background-color: #4A5568; color: #63B3ED;">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
