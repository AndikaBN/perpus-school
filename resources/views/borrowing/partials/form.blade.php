{{-- Blade Template --}}
<form action="{{ route('peminjaman-buku.store') }}" method="POST">
    @csrf

    @if (auth()->user()->role === 'admin')
        <div class="mb-4">
            <x-input-label for="user_id">{{ __('Nama Peminjam') }}</x-input-label>
            <div class="dropdown">
                <button type="button" onclick="toggleDropdown('userDropdown')" class="dropbtn">Pilih Nama Peminjam</button>
                <div id="userDropdown" class="dropdown-content">
                    <input type="text" placeholder="Cari Nama..." id="userSearch" onkeyup="filterDropdown('userSearch', 'userDropdown')">
                    @foreach ($users as $user)
                        <a href="#" onclick="selectOption('user_id', '{{ $user->id }}', '{{ $user->nama }}')">{{ $user->nama }}</a>
                    @endforeach
                </div>
            </div>
            <input type="hidden" name="user_id" id="user_id" required>
            @error('user_id')
                <x-input-error-set :message="$message" class="mt-2" />
            @enderror
            <p>Nama yang dipilih: <span id="selectedUser"></span></p>
        </div>
    @else
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    @endif

    <div class="mb-4">
        <x-input-label for="book_id">{{ __('Pilih Buku') }}</x-input-label>
        <div class="dropdown">
            <button type="button" onclick="toggleDropdown('bookDropdown')" class="dropbtn">Pilih Buku</button>
            <div id="bookDropdown" class="dropdown-content">
                <input type="text" placeholder="Cari Buku..." id="bookSearch" onkeyup="filterDropdown('bookSearch', 'bookDropdown')">
                @foreach ($buku as $book)
                    <a href="#" onclick="selectOption('book_id', '{{ $book->id }}', '{{ $book->nama_buku }}')">{{ $book->nama_buku }} @if(in_array($book->id, $recommendedBooks)) - Rekomendasi @endif</a>
                @endforeach
            </div>
        </div>
        <input type="hidden" name="book_id" id="book_id" required>
        @error('book_id')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
        <p>Buku yang dipilih: <span id="selectedBook"></span></p>
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

    // Fungsi untuk kapitalisasi kata pertama
    function capitalize(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
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
        background-color: #f6f6f6;
        max-height: 200px;
        overflow-y: auto;
        border: 1px solid #ddd;
        z-index: 1;
        width: 100%;
    }

    .dropdown-content input {
        box-sizing: border-box;
        width: 100%;
        padding: 8px;
        font-size: 14px;
    }

    .dropdown-content a {
        color: black;
        padding: 8px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .show {
        display: block;
    }
</style>
