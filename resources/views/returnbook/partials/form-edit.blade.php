<form action="{{ route('pengembalian-buku.update', $pengembalian->id) }}" method="POST" style="color: #E2E8F0;">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <x-input-label for="status" style="color: #CBD5E0; font-weight: 600;">{{ __('Status') }}</x-input-label>
        <select id="status" name="status" class="mt-1 block w-full py-2 px-3 border border-gray-600 bg-gray-800 text-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option style="background-color: #4A5568; color: #FFFFFF;" value="">Semua Status</option>
            <option style="background-color: #4A5568; color: #FFFFFF;" value="ACC" {{ $pengembalian->status == 'ACC' ? 'selected' : '' }}>ACC</option>
            <option style="background-color: #4A5568; color: #FFFFFF;" value="PENDING" {{ $pengembalian->status == 'PENDING' ? 'selected' : '' }}>PENDING</option>
        </select>
        @error('status')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="mb-4">
        <x-input-label for="description" style="color: #CBD5E0; font-weight: 600;">{{ __('Keterangan') }}</x-input-label>
        <textarea id="description" name="description" class="mt-1 block w-full border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" style="background-color: #2D3748; color: #E2E8F0;">{{ $pengembalian->description }}</textarea>
        @error('description')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="flex items-center space-x-4">
        <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800">
            {{ __('Simpan') }}
        </x-primary-button>

        <x-secondary-button href="{{ route('pengembalian-buku.index') }}" >
            Kembali
        </x-secondary-button>
    </div>
</form>
