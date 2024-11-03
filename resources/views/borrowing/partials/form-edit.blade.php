<form action="{{ route('peminjaman-buku.update', $borrowing->id) }}" method="POST" style="color: #E2E8F0;">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <x-input-label for="status" style="color: #CBD5E0; font-weight: 600;">{{ __('Status') }}</x-input-label>
        <select id="status" name="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" style="background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568;">
            <option value="" style="background-color: #2D3748; color: #E2E8F0;">Semua Status</option>
            <option value="Dipinjam" {{ $borrowing->status == 'Dipinjam' ? 'selected' : '' }} style="background-color: #2D3748; color: #E2E8F0;">Dipinjam</option>
            <option value="Dikembalikan" {{ $borrowing->status == 'Dikembalikan' ? 'selected' : '' }} style="background-color: #2D3748; color: #E2E8F0;">Dikembalikan</option>
            <option value="ACC" {{ $borrowing->status == 'ACC' ? 'selected' : '' }} style="background-color: #2D3748; color: #E2E8F0;">ACC</option>
            <option value="PENDING" {{ $borrowing->status == 'PENDING' ? 'selected' : '' }} style="background-color: #2D3748; color: #E2E8F0;">PENDING</option>
        </select>
        @error('status')
            <x-input-error-set :message="$message" class="mt-2" style="color: #E53E3E; margin-top: 0.25rem;" />
        @enderror
    </div>

    <div class="mb-4">
        <x-input-label for="total_fine" style="color: #CBD5E0; font-weight: 600;">{{ __('Jumlah Denda Keterlambatan') }} (Masukan 0 jika tidak ada)</x-input-label>
        <x-text-input id="total_fine" class="mt-1 block w-full" type="number" name="total_fine" value="{{ old('total_fine', $borrowing->total_fine) }}" required style="margin-top: 0.25rem; background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; width: 100%; padding: 0.5rem;" />
        @error('total_fine')
            <x-input-error-set :message="$message" class="mt-2" style="color: #E53E3E; margin-top: 0.25rem;" />
        @enderror
    </div>

    <div class="mb-4">
        <x-input-label for="description" style="color: #CBD5E0; font-weight: 600;">{{ __('Keterangan') }}</x-input-label>
        <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" style="margin-top: 0.25rem; background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; width: 100%; padding: 0.5rem;">{{ old('description', $borrowing->description) }}</textarea>
        @error('description')
            <x-input-error-set :message="$message" class="mt-2" style="color: #E53E3E; margin-top: 0.25rem;" />
        @enderror
    </div>

    <div class="flex items-center space-x-4">
        <x-primary-button style="background-color: #4A5568; color: #63B3ED; padding: 0.5rem 1rem; border-radius: 0.375rem;">
            {{ __('Simpan') }}
        </x-primary-button>

        <x-secondary-button href="{{ route('peminjaman-buku.index') }}" style="background-color: #2D3748; color: #CBD5E0; padding: 0.5rem 1rem; border-radius: 0.375rem;">
            Kembali
        </x-secondary-button>
    </div>
</form>
