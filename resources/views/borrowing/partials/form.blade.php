{{-- @if (auth()->user()->role !== 'siswa')
    <div class="mt-1 block w-full bg-white border-gray-300 rounded-md shadow-sm">


        Admin Tidak Bisa Menambah Pinjaman Buku, Tugas Admin Mengedit Status Pinjaman
    </div>
@endif
 --}}


<form action="{{ route('peminjaman-buku.store') }}" method="POST">
    @csrf

    @if (auth()->user()->role === 'admin')
        <div class="mb-4">
            <x-input-label for="user_id">{{ __('Nama Peminjam') }}</x-input-label>
            <select id="user_id" name="user_id" class="mt-1 block w-full select2" required>
                <option value="">Pilih Nama Peminjam</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->nama }}</option>
                @endforeach
            </select>
            @error('user_id')
                <x-input-error-set :message="$message" class="mt-2" />
            @enderror
        </div>
    @endif


    <div class="mb-4">
        <x-input-label for="book_id">{{ __('Pilih Buku') }}</x-input-label>
        <select id="book_id" name="book_id" class="mt-1 block w-full" required>
            <option value="">Pilih Buku</option>
            @foreach ($buku as $book)
                <option value="{{ $book->id }}">
                    {{ $book->nama_buku }}
                    @if (in_array($book->id, $recommendedBooks))
                        - Rekomendasi
                    @endif
                </option>
            @endforeach
        </select>
        @error('book_id')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="mb-4">
        <x-input-label for="borrow_date">{{ __('Tanggal Pinjam') }}</x-input-label>
        <x-text-input id="borrow_date" class="mt-1 block w-full" type="date" name="borrow_date"
            value="{{ old('borrow_date') }}" required />
        @error('borrow_date')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="mb-4">
        <x-input-label for="return_date">{{ __('Tanggal Pengembalian') }}</x-input-label>
        <x-text-input id="return_date" class="mt-1 block w-full" type="date" name="return_date"
            value="{{ old('return_date') }}" required />
        @error('return_date')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="flex justify-end">
        <x-primary-button>
            {{ __('Simpan') }}
        </x-primary-button>
    </div>
</form>
