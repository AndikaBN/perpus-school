<form action="{{ route('pengembalian-buku.store') }}" method="POST" enctype="multipart/form-data" style="color: #E2E8F0;">
    @csrf
    <div class="mb-4">
        <x-input-label for="borrowing_id" style="color: #CBD5E0; font-weight: 600;">{{ __('Peminjaman Buku') }}</x-input-label>
        <select id="borrowing_id" name="borrowing_id" class="mt-1 block w-full border-gray-600 rounded-md shadow-sm" style="background-color: #4A5568; color: #FFFFFF;" required>
            <option value="" selected disabled>Pilih Peminjaman</option>
            @foreach ($peminjaman as $p)
                <option style=" color: #FFFFFF;" value="{{ $p->id }}" {{ old('borrowing_id') == $p->id ? 'selected' : '' }}>
                    Peminjaman ID {{ $p->id }} - {{ $p->buku->nama_buku }}
                </option>
            @endforeach
        </select>
        @error('borrowing_id')
            <x-input-error-set :message="$message" class="mt-2" style="color: #E53E3E;" />
        @enderror
    </div>

    <div class="mb-4">
        <x-input-label for="photo" style="color: #CBD5E0; font-weight: 600;">{{ __('Bukti Pengembalian') }}</x-input-label>
        <input id="photo" class="mt-1 block w-full bg-gray-700 border-gray-600 rounded-md shadow-sm" type="file" name="photo"
            accept="image/jpeg, image/png, image/gif">
        @error('photo')
            <x-input-error-set :message="$message" class="mt-2" style="color: #E53E3E;" />
        @enderror
    </div>

    <br />

    <div class="flex items-center space-x-4">
        <x-primary-button style="background-color: #4A5568; color: #63B3ED; padding: 0.5rem 1rem; border-radius: 0.375rem;">
            {{ __('Simpan') }}
        </x-primary-button>

        <x-secondary-button href="{{ route('pengembalian-buku.index') }}" style="background-color: #2D3748; color: #000000; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none">
            Kembali
        </x-secondary-button>
    </div>
</form>
