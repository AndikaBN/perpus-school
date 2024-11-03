<title>{{ config('app.titleDashboard', 'Laravel') }} - {{ $settings->webname }}</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"  style="color: #FFF;">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div style="padding: 3.5rem; background-color: #25324d; ">
        <div
            style="background-color: #1A202C; border-radius: 0.375rem; overflow: hidden; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);">
            @include('alert.alert-info')

            <div style="padding: 1.5rem; background-color: #1A202C; border-bottom: 1px solid #E2E8F0;">
                <div class="max-w-sm mx-auto">
                    <div
                        style="background-color: #2D3748; border-radius: 0.375rem; overflow: hidden; text-align: center; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);">
                        <img src="https://www.svgrepo.com/show/513520/book-closed.svg" class="mx-auto h-24 w-24"
                            alt="Pinjam Buku">
                        <div style="padding: 1rem;">
                            <h3 style="font-size: 1.125rem; font-weight: 600; color: #E2E8F0;">Perpustakaan Sekolah</h3>
                            <p style="color: #CBD5E0;">Pinjam Buku Favorit Kamu yang ada di Perpustakaan
                                {{ $settings->webname }}.</p>
                        </div>
                        <div style="padding: 1rem;">
                            <!-- Tombol Navigasi -->
                            <span
                                style="display: inline-block; background-color: #4A5568; border-radius: 0.375rem; padding: 0.25rem 0.5rem; margin: 0.25rem; color: #63B3ED;">
                                <a href="{{ route('buku.userBooks') }}"
                                    style="text-decoration: none; color: whitesmoke">Semua Buku</a>
                            </span>
                            <span
                                style="display: inline-block; background-color: #4A5568; border-radius: 0.375rem; padding: 0.25rem 0.5rem; margin: 0.25rem; color: #63B3ED;">
                                <a href="{{ route('peminjaman-buku.index') }}"
                                    style="text-decoration: none; color: whitesmoke">Peminjaman Buku</a>
                            </span>
                            <span
                                style="display: inline-block; background-color: #4A5568; border-radius: 0.375rem; padding: 0.25rem 0.5rem; margin: 0.25rem; color: #63B3ED;">
                                <a href="{{ route('pengembalian-buku.index') }}"
                                    style="text-decoration: none; color: whitesmoke">Pengembalian Buku</a>
                            </span>
                            <span
                                style="display: inline-block; background-color: #4A5568; border-radius: 0.375rem; padding: 0.25rem 0.5rem; margin: 0.25rem; color: #63B3ED;">
                                <a href="{{ route('profile.edit') }}"
                                    style="text-decoration: none; color: whitesmoke">Ubah Profile</a>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Bagian Rekomendasi Buku dengan Modal -->
                @if (!empty($recommendedBooks) && $recommendedBooks->count())
                    <div style="margin-top: 1.5rem;">
                        <h3 style="font-size: 1.125rem; font-weight: 600; color: #E2E8F0; margin-bottom: 1rem;">
                            Rekomendasi Buku Untuk Kamu:</h3>
                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem;">
                            @foreach ($recommendedBooks as $book)
                                <div
                                    style="padding: 1rem; background-color: #2D3748; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);">
                                    <h4 style="font-weight: 600; color: #E2E8F0;">{{ $book->nama_buku }}</h4>
                                    <p style="color: #CBD5E0;">Penulis: {{ $book->penulis }}</p>
                                    <p style="color: #CBD5E0;">Tahun Rilis: {{ $book->tahun_rilis }}</p>
                                    <!-- Tombol Detail -->
                                    <button type="button" class="btn btn-link"
                                        style="color: #63B3ED; text-decoration: none;" data-bs-toggle="modal"
                                        data-bs-target="#detailModal-{{ $book->id }}">Detail</button>
                                </div>

                                <!-- Modal Detail Buku -->
                                <div class="modal fade" id="detailModal-{{ $book->id }}" tabindex="-1"
                                    aria-labelledby="detailModalLabel-{{ $book->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailModalLabel-{{ $book->id }}">
                                                    {{ $book->nama_buku }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Penulis:</strong> {{ $book->penulis }}</p>
                                                <p><strong>Tahun Rilis:</strong> {{ $book->tahun_rilis }}</p>
                                                @if ($book->ebook_path)
                                                    <a href="{{ asset('storage/' . $book->ebook_path) }}"
                                                        class="btn btn-primary" target="_blank">Baca eBook</a>
                                                @else
                                                    <p class="text-danger">eBook tidak tersedia.</p>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                   
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
