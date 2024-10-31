<title>{{ config('app.titleDashboard', 'Laravel') }} - {{ $settings->webname }}</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('alert.alert-info')
                    <br />

                    <div class="max-w-sm mx-auto">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-center">
                            <img src="https://www.svgrepo.com/show/513520/book-closed.svg" class="mx-auto h-24 w-24"
                                alt="Pinjam Buku">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Perpustakaan Sekolah</div>
                                <p class="dark:text-gray-100 text-base">
                                    Pinjam Buku Favorit Kamu yang ada di Perpustakaan {{ $settings->webname }}.
                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                                <!-- Navigation Buttons -->
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    <a href="{{ route('buku.userBooks') }}">Semua Buku</a>
                                </span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    <a href="{{ route('peminjaman-buku.index') }}">Peminjaman Buku</a>
                                </span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    <a href="{{ route('pengembalian-buku.index') }}">Pengembalian Buku</a>
                                </span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    <a href="{{ route('profile.edit') }}">Ubah Profile</a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Recommended Books Section with Modals -->
                    @if (!empty($recommendedBooks) && $recommendedBooks->count())
                        <div class="mt-6 px-6">
                            <h3 class="text-lg font-semibold mb-4">Rekomendasi Buku Untuk Kamu:</h3>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach ($recommendedBooks as $book)
                                    <div class="p-4 bg-gray-200 rounded-lg shadow-md">
                                        <h4 class="font-semibold">{{ $book->nama_buku }}</h4>
                                        <p class="text-sm text-gray-600">{{ $book->penulis }}</p>
                                        <p class="text-sm text-gray-600">{{ $book->tahun_rilis }}</p>
                                        <!-- Detail Button -->
                                        <button type="button" class="text-blue-500 underline" data-bs-toggle="modal" data-bs-target="#detailModal-{{ $book->id }}">Detail</button>
                                    </div>

                                    <!-- Modal Detail Buku -->
                                    <div class="modal fade" id="detailModal-{{ $book->id }}" tabindex="-1" aria-labelledby="detailModalLabel-{{ $book->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailModalLabel-{{ $book->id }}">{{ $book->nama_buku }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Penulis:</strong> {{ $book->penulis }}</p>
                                                    <p><strong>Tahun Rilis:</strong> {{ $book->tahun_rilis }}</p>
                                                    @if($book->ebook_path)
                                                        <a href="{{ asset('storage/' . $book->ebook_path) }}" class="btn btn-primary" target="_blank">Baca eBook</a>
                                                    @else
                                                        <p class="text-danger">eBook tidak tersedia.</p>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <p class="text-center text-gray-500"></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
