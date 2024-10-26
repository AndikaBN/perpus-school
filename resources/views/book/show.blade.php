<title>Buku</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $buku->nama_buku }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-6">
        <div class="dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 sm:p-6 dark:bg-gray-900 border-b border-gray-200">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ $buku->nama_buku }}</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Penulis:</strong> {{ $buku->penulis }}</p>
                        <p><strong>Tahun Rilis:</strong> {{ $buku->tahun_rilis }}</p>
                        @if($buku->cover_path)
                            <img src="{{ asset('storage/' . $buku->cover_path) }}" alt="Cover Buku" class="img-fluid mb-3">
                        @endif
                        @if($buku->ebook_path)
                            <a href="{{ asset('storage/' . $buku->ebook_path) }}" class="btn btn-primary" target="_blank">Baca eBook</a>
                        @else
                            <p class="text-danger">eBook tidak tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>