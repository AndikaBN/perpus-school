<title>Buku</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Buku') }}
        </h2>
    </x-slot>

    <div style="padding: 1.5rem;" x-data="liveSearch()">
        <div style="background-color: white; border-radius: 0.375rem; overflow: hidden; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);">
            @include('alert.alert-info')

            <div style="padding: 1.5rem; background-color: #1A202C; border-bottom: 1px solid #E2E8F0;">
                <div style="display: flex; flex-direction: column; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <form @submit.prevent="searchBooks" style="display: flex; flex-direction: column; align-items: center; margin-top: 1rem; gap: 1rem;">
                        <input type="text" name="search" placeholder="Cari judul buku..." x-model="search" @input="searchBooks" style="border: 1px solid #CBD5E0; padding: 0.5rem; border-radius: 0.375rem; width: 100%; max-width: 300px;">
                    </form>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1.5rem; margin-top: 1.5rem;">
                    <template x-for="item in books" :key="item.id">
                        <div style="background-color: white; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); overflow: hidden;">
                            <img :src="'/storage/' + item.cover_path" :alt="item.nama_buku + ' cover'" style="width: 100%; height: 12rem; object-fit: cover;">
                            <div style="padding: 1rem;">
                                <h3 style="font-size: 1.125rem; font-weight: 600; color: #1A202C;" x-text="item.nama_buku"></h3>
                                <p style="color: #4A5568;" x-text="'Penulis: ' + item.penulis"></p>
                                <p style="color: #4A5568;" x-text="'Tahun Rilis: ' + item.tahun_rilis"></p>
                                <div style="margin-top: 1rem; display: flex; justify-content: space-between; align-items: center;">
                                    <a :href="'/buku/' + item.id" style="color: #3B82F6;">Detail</a>
                                    <template x-if="userRole !== 'siswa'">
                                        <x-confirm-delete-modal>
                                            <x-slot name="trigger">
                                                <button @click="isOpen = true" style="color: #E53E3E;">Hapus</button>
                                            </x-slot>

                                            <x-slot name="title">
                                                Konfirmasi Hapus
                                            </x-slot>

                                            <x-slot name="content">
                                                Apakah Anda yakin ingin menghapus buku ini?
                                            </x-slot>

                                            <x-slot name="footer">
                                                <form :id="'deleteForm-' + item.id" :action="'/buku/' + item.id" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-primary-button type="submit" style="background-color: #E53E3E; color: white;">Hapus</x-primary-button>
                                                    <x-secondary-button @click="isOpen = false">Batal</x-secondary-button>
                                                </form>
                                            </x-slot>
                                        </x-confirm-delete-modal>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </template>
                    <div x-show="books.length === 0" style="grid-column: span 4; text-align: center; color: #A0AEC0;">
                        Tidak ada data yang ditemukan.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function liveSearch() {
            return {
                search: '',
                books: @json($buku),
                userRole: '{{ auth()->user()->role }}',
                searchBooks() {
                    if (this.search.length >= 3) {
                        fetch(`{{ route('buku.search') }}?search=${this.search}`)
                            .then(response => response.json())
                            .then(data => {
                                this.books = data;
                            });
                    } else {
                        this.books = @json($buku);
                    }
                }
            };
        }
    </script>
</x-app-layout>
