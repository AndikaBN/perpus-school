<form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data" style="color: #E2E8F0;">
    @csrf

    <div class="mb-4">
        <label for="book_title" style="color: #CBD5E0; font-weight: 600;">{{ __('Judul Buku') }}</label>
        <input id="book_title" type="text" name="book_title" value="{{ old('book_title') }}" required
            style="margin-top: 0.25rem; background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; width: 100%; padding: 0.5rem;">
        @error('book_title')
            <p style="color: #E53E3E; margin-top: 0.25rem;">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="author" style="color: #CBD5E0; font-weight: 600;">{{ __('Nama Pengarang') }}</label>
        <input id="author" type="text" name="author" value="{{ old('author') }}" required
            style="margin-top: 0.25rem; background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; width: 100%; padding: 0.5rem;">
        @error('author')
            <p style="color: #E53E3E; margin-top: 0.25rem;">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="release_year" style="color: #CBD5E0; font-weight: 600;">{{ __('Tahun Rilis') }}</label>
        <input id="release_year" type="number" name="release_year" value="{{ old('release_year') }}" required
            style="margin-top: 0.25rem; background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; width: 100%; padding: 0.5rem;">
        @error('release_year')
            <p style="color: #E53E3E; margin-top: 0.25rem;">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="ebook" style="color: #CBD5E0; font-weight: 600;">{{ __('E-book') }}</label>
        <input id="ebook" type="file" name="ebook"
            style="margin-top: 0.25rem; background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; width: 100%; padding: 0.5rem;">
        @error('ebook')
            <p style="color: #E53E3E; margin-top: 0.25rem;">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="cover" style="color: #CBD5E0; font-weight: 600;">{{ __('Cover') }}</label>
        <input id="cover" type="file" name="cover"
            style="margin-top: 0.25rem; background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; width: 100%; padding: 0.5rem;">
        @error('cover')
            <p style="color: #E53E3E; margin-top: 0.25rem;">{{ $message }}</p>
        @enderror
    </div>

    <br />

    <div class="flex items-center space-x-4">
        <button type="submit" style="background-color: #4A5568; color: #63B3ED; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none;">
            {{ __('Simpan') }}
        </button>

        <a href="{{ route('buku.index') }}" style="background-color: #2D3748; color: #63B3ED; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none;">
            Kembali
        </a>
    </div>
</form>
