<title>Buku</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Buku') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
            @include('alert.alert-info')

            <div class="p-6 dark:bg-gray-900 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0 sm:space-x-4">
                    <form action="{{ route('buku.userBooks') }}" method="GET"
                        class="flex flex-col sm:flex-row items-center mt-4 sm:mt-0 space-y-2 sm:space-y-0 sm:space-x-4">
                        <input type="text" name="search" placeholder="Cari judul buku..."
                            value="{{ request('search') }}"
                            class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block rounded-md p-2 w-full sm:w-auto">

                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
                            Cari
                        </button>
                    </form>
                </div>

                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @forelse ($buku as $item)
                        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                            <img src="{{ asset('storage/' . $item->cover_path) }}" alt="{{ $item->nama_buku }} cover" class="w-full h-48 object-cover mb-4">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $item->nama_buku }}</h3>
                                <p class="text-gray-700 dark:text-gray-300">Penulis: {{ $item->penulis }}</p>
                                <p class="text-gray-700 dark:text-gray-300">Tahun Rilis: {{ $item->tahun_rilis }}</p>
                                <div class="mt-4 flex justify-between items-center">
                                    <a href="{{ route('buku.show', $item->id) }}"
                                        class="text-blue-500 hover:text-blue-700">Detail</a>
                                    @if(auth()->user()->role !== 'siswa')
                                        <x-confirm-delete-modal>
                                            <x-slot name="trigger">
                                                <button @click="isOpen = true"
                                                    class="text-red-600 hover:text-red-900">Hapus</button>
                                            </x-slot>

                                            <x-slot name="title">
                                                Konfirmasi Hapus
                                            </x-slot>

                                            <x-slot name="content">
                                                Apakah Anda yakin ingin menghapus buku ini?
                                            </x-slot>

                                            <x-slot name="footer">
                                                <form id="deleteForm-{{ $item->id }}"
                                                    action="{{ route('buku.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-primary-button type="submit"
                                                        class="bg-red-600 hover:bg-red-700">
                                                        Hapus
                                                    </x-primary-button>
                                                    <x-secondary-button @click="isOpen = false">
                                                        Batal
                                                    </x-secondary-button>
                                                </form>
                                            </x-slot>
                                        </x-confirm-delete-modal>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-500">
                            Tidak ada data yang ditemukan.
                        </div>
                    @endforelse
                </div>

                {{-- <div class="mt-6">
                    {{ $buku->appends(request()->input())->links() }}
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>
