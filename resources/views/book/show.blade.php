<title>Buku Rekomendasi</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $buku->nama_buku }}
        </h2>
    </x-slot>

    <div style="padding: 3.5rem; background-color: #25324d;">
        <div style="background-color: #1A202C; border-radius: 0.375rem; overflow: hidden; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);">
            <div style="padding: 1.5rem; background-color: #1A202C; border-bottom: 1px solid #E2E8F0;">
                <div class="card" style="background-color: #2D3748; border-radius: 0.375rem; color: #E2E8F0; padding: 1.5rem;">
                    <div class="card-header" style="font-size: 1.25rem; font-weight: 600; color: #E2E8F0;">
                        <h3>{{ $buku->nama_buku }}</h3>
                    </div>
                    <div class="card-body" style="color: #CBD5E0;">
                        <p><strong>Penulis:</strong> {{ $buku->penulis }}</p>
                        <p><strong>Tahun Rilis:</strong> {{ $buku->tahun_rilis }}</p>

                        @if($buku->cover_path)
                            <img src="{{ asset('storage/' . $buku->cover_path) }}" alt="Cover Buku" style="max-width: 100%; border-radius: 0.375rem; margin-bottom: 1rem;">
                        @endif

                        @if($buku->ebook_path)
                            <a href="{{ asset('storage/' . $buku->ebook_path) }}" target="_blank"
                               style="display: inline-block; background-color: #4A5568; color: #63B3ED; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none;">
                               Baca eBook
                            </a>
                        @else
                            <p style="color: #E53E3E;">eBook tidak tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
