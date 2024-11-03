<form method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Nama Web -->
    <div class="mb-4">
        <x-input-label for="webname" style="color: #E2E8F0;">{{ __('Nama Sekolah') }}</x-input-label>
        <x-text-input id="webname" class="mt-1 block w-full" type="text" name="webname" :value="old('webname', $settings['webname'] ?? '')" required style="background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568;" />
        @error('webname')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <!-- description -->
    <div class="mb-4">
        <x-input-label for="description" style="color: #E2E8F0;">{{ __('Deskripsi') }}</x-input-label>
        <textarea id="description" name="description" rows="4" class="mt-1 block w-full shadow-sm" style="background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem;">{{ old('description', $settings['description'] ?? '') }}</textarea>
        @error('description')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <!-- Upload Logo -->
    <div class="mb-4">
        <x-input-label for="logo" style="color: #E2E8F0;">{{ __('Logo') }}</x-input-label>
        <input id="logo" type="file" name="logo" class="mt-1 block w-full" accept="image/jpeg, image/png, image/gif" style="background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568;">
        <small style="color: #A0AEC0;">File yang diizinkan: JPEG, PNG, GIF</small>
        @if ($settings->logo)
            <div class="mt-2">
                <p style="color: #A0AEC0;">Logo saat ini:</p>
                <img src="{{ asset('storage/' . $settings->logo) }}" alt="Current Logo" class="mt-1 h-20">
            </div>
        @endif
        @error('logo')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <!-- Upload Favicon -->
    <div class="mb-4">
        <x-input-label for="favicon" style="color: #E2E8F0;">{{ __('Favicon') }}</x-input-label>
        <input id="favicon" type="file" name="favicon" class="mt-1 block w-full" accept="image/x-icon" style="background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568;">
        <small style="color: #A0AEC0;">File yang diizinkan: ICO</small>
        @if ($settings->favicon)
            <div class="mt-2">
                <p style="color: #A0AEC0;">Favicon saat ini:</p>
                <img src="{{ asset('storage/' . $settings->favicon) }}" alt="Current Favicon" class="mt-1 h-12">
            </div>
        @endif
        @error('favicon')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <!-- Tombol Simpan -->
    <div class="flex justify-end">
        <x-primary-button style="background-color: #4A5568; color: #63B3ED;">
            {{ __('Simpan') }}
        </x-primary-button>
    </div>
</form>
