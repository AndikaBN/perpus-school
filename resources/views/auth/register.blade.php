<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" style="background-color: #25324d; padding: 2rem; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); color: #E2E8F0;">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama')" style="color: #E2E8F0;" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" style="background-color: #2D3748; color: #E2E8F0; border-color: #4A5568;" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" style="color: #E2E8F0;" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" style="background-color: #2D3748; color: #E2E8F0; border-color: #4A5568;" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Identity (NIP, NIK, NIS) -->
        <div class="mt-4">
            <x-input-label for="identitas" :value="__('Identitas (NIS)')" style="color: #E2E8F0;" />
            <x-text-input id="identitas" class="block mt-1 w-full" type="number" name="identitas" :value="old('identitas')" required style="background-color: #2D3748; color: #E2E8F0; border-color: #4A5568;" />
            <x-input-error :messages="$errors->get('identitas')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="telepon" :value="__('No HP')" style="color: #E2E8F0;" />
            <x-text-input id="telepon" class="block mt-1 w-full" type="number" name="telepon" :value="old('telepon')" required style="background-color: #2D3748; color: #E2E8F0; border-color: #4A5568;" />
            <x-input-error :messages="$errors->get('telepon')" class="mt-2" />
        </div>

        <!-- Class -->
        <div class="mt-4">
            <x-input-label for="class" :value="__('Kelas')" style="color: #E2E8F0;" />
            <x-text-input id="class" class="block mt-1 w-full" type="text" name="class" :value="old('class')" required style="background-color: #2D3748; color: #E2E8F0; border-color: #4A5568;" />
            <x-input-error :messages="$errors->get('class')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="adress" :value="__('Alamat')" style="color: #E2E8F0;" />
            <x-text-input id="adress" class="block mt-1 w-full" type="text" name="adress" :value="old('adress')" required style="background-color: #2D3748; color: #E2E8F0; border-color: #4A5568;" />
            <x-input-error :messages="$errors->get('adress')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Daftar Sebagai')" style="color: #E2E8F0;" />
            <x-text-input id="role" class="block mt-1 w-full" type="text" name="role" value="siswa" readonly style="background-color: #2D3748; color: #E2E8F0; border-color: #4A5568;" />
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" style="color: #E2E8F0;" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" style="background-color: #2D3748; color: #E2E8F0; border-color: #4A5568;" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" style="color: #E2E8F0;" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" style="background-color: #2D3748; color: #E2E8F0; border-color: #4A5568;" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Register Button -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm" href="{{ route('login') }}" style="color: #63B3ED; text-decoration: none;">
                {{ __('Masuk') }}
            </a>

            <x-primary-button class="ms-4" style="background-color: #4A5568; color: #63B3ED;">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
