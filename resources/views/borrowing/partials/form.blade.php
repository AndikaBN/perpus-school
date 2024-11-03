{{-- Blade Template --}}
<form action="{{ route('peminjaman-buku.store') }}" method="POST" style="color: #E2E8F0;">
    @csrf

    @if (auth()->user()->role === 'admin')
        <div class="mb-4">
            <x-input-label for="user_id" style="color: #CBD5E0; font-weight: 600;">{{ __('Nama Peminjam') }}</x-input-label>
            <div class="dropdown">
                <button type="button" onclick="toggleDropdown('userDropdown')" class="dropbtn" style="background-color: #04AA6D; color: white; padding: 8px; font-size: 16px; border: none; cursor: pointer; width: 100%;">Pilih Nama Peminjam</button>
                <div id="userDropdown" class="dropdown-content" style="background-color: #2D3748; max-height: 200px; overflow-y: auto; border: 1px solid #4A5568; z-index: 1; width: 100%;">
                    <input type="text" placeholder="Cari Nama..." id="userSearch" onkeyup="filterDropdown('userSearch', 'userDropdown')" style="background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; padding: 8px; font-size: 14px;">
                    @foreach ($users as $user)
                        <a href="#" onclick="selectOption('user_id', '{{ $user->id }}', '{{ $user->nama }}')" style="color: #E2E8F0; padding: 8px 16px; display: block; text-decoration: none;">{{ $user->nama }}</a>
                    @endforeach
                </div>
            </div>
            <input type="hidden" name="user_id" id="user_id" required>
            @error('user_id')
                <x-input-error-set :message="$message" class="mt-2" style="color: #E53E3E; margin-top: 0.25rem;" />
            @enderror
            <p style="color: white">Nama yang dipilih: <span id="selectedUser"></span></p>
        </div>
    @else
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    @endif

    <div class="mb-4">
        <x-input-label for="book_id" style="color: #CBD5E0; font-weight: 600;">{{ __('Pilih Buku') }}</x-input-label>
        <div class="dropdown">
            <button type="button" onclick="toggleDropdown('bookDropdown')" class="dropbtn" style="background-color: #04AA6D; color: white; padding: 8px; font-size: 16px; border: none; cursor: pointer; width: 100%;">Pilih Buku</button>
            <div id="bookDropdown" class="dropdown-content" style="background-color: #2D3748; max-height: 200px; overflow-y: auto; border: 1px solid #4A5568; z-index: 1; width: 100%;">
                <input type="text" placeholder="Cari Buku..." id="bookSearch" onkeyup="filterDropdown('bookSearch', 'bookDropdown')" style="background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; padding: 8px; font-size: 14px;">
                @foreach ($buku as $book)
                    <a href="#" onclick="selectOption('book_id', '{{ $book->id }}', '{{ $book->nama_buku }}')" style="color: #E2E8F0; padding: 8px 16px; display: block; text-decoration: none;">{{ $book->nama_buku }} @if(in_array($book->id, $recommendedBooks)) - Rekomendasi @endif</a>
                @endforeach
            </div>
        </div>
        <input type="hidden" name="book_id" id="book_id" required>
        @error('book_id')
            <x-input-error-set :message="$message" class="mt-2" style="color: #E53E3E; margin-top: 0.25rem;" />
        @enderror
        <p style="color: white;">Buku yang dipilih: <span id="selectedBook"></span></p>
    </div>

    <div class="mb-4">
        <x-input-label for="borrow_date" style="color: #CBD5E0; font-weight: 600;">{{ __('Tanggal Pinjam') }}</x-input-label>
        <x-text-input id="borrow_date" class="mt-1 block w-full" type="date" name="borrow_date" value="{{ old('borrow_date') }}" required style="margin-top: 0.25rem; background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; width: 100%; padding: 0.5rem;" />
        @error('borrow_date')
            <x-input-error-set :message="$message" class="mt-2" style="color: #E53E3E; margin-top: 0.25rem;" />
        @enderror
    </div>

    <div class="mb-4">
        <x-input-label for="return_date" style="color: #CBD5E0; font-weight: 600;">{{ __('Tanggal Pengembalian') }}</x-input-label>
        <x-text-input id="return_date" class="mt-1 block w-full" type="date" name="return_date" value="{{ old('return_date') }}" required style="margin-top: 0.25rem; background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; width: 100%; padding: 0.5rem;" />
        @error('return_date')
            <x-input-error-set :message="$message" class="mt-2" style="color: #E53E3E; margin-top: 0.25rem;" />
        @enderror
    </div>

    <div class="flex justify-end">
        <x-primary-button style="background-color: #4A5568; color: #63B3ED; padding: 0.5rem 1rem; border-radius: 0.375rem;">
            {{ __('Simpan') }}
        </x-primary-button>
    </div>
</form>

<script>
    // Fungsi untuk menampilkan dropdown
    function toggleDropdown(dropdownId) {
        document.getElementById(dropdownId).classList.toggle("show");
    }

    // Fungsi untuk menyaring dropdown
    function filterDropdown(searchInputId, dropdownId) {
        const input = document.getElementById(searchInputId).value.toUpperCase();
        const dropdown = document.getElementById(dropdownId);
        const items = dropdown.getElementsByTagName("a");
        for (let i = 0; i < items.length; i++) {
            const txtValue = items[i].textContent || items[i].innerText;
            items[i].style.display = txtValue.toUpperCase().includes(input) ? "" : "none";
        }
    }

    // Fungsi untuk memilih opsi dan menampilkan teks yang dipilih
    function selectOption(inputId, value, text) {
        document.getElementById(inputId).value = value;
        const displaySpan = inputId === 'user_id' ? 'selectedUser' : 'selectedBook';
        document.getElementById(displaySpan).innerText = text;
        toggleDropdown(inputId === 'user_id' ? 'userDropdown' : 'bookDropdown'); // Close dropdown
    }

    // Klik di luar untuk menutup dropdown
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn') && !event.target.matches('.dropdown-content') && !event.target.matches('.dropdown-content input')) {
            const dropdowns = document.getElementsByClassName("dropdown-content");
            for (let i = 0; i < dropdowns.length; i++) {
                const openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>

<style>
    .dropbtn {
        background-color: #04AA6D;
        color: white;
        padding: 8px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    .dropdown-content {
        display: none;
        position: relative;
        background-color: #2D3748;
        max-height: 200px;
        overflow-y: auto;
        border: 1px solid #4A5568;
        z-index: 1;
        width: 100%;
    }

    .dropdown-content input {
        box-sizing: border-box;
        width: 100%;
        padding: 8px;
        font-size: 14px;
        background-color: #2D3748;
        color: #E2E8F0;
    }

    .dropdown-content a {
        color: #E2E8F0;
        padding: 8px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #4A5568;
    }

    .show {
        display: block;
    }
</style>
