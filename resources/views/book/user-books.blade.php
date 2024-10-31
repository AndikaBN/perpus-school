<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Buku') }}
        </h2>
    </x-slot>

    <div style="padding: 1.5rem;">
        <div style="background-color: white; border-radius: 0.375rem; overflow: hidden; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);">
            @include('alert.alert-info')

            <div style="padding: 1.5rem; background-color: #1A202C; border-bottom: 1px solid #E2E8F0;">
                <div style="display: flex; flex-direction: column; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <form action="{{ route('buku.userBooks') }}" method="GET" style="display: flex; flex-direction: column; align-items: center; margin-top: 1rem; gap: 1rem;">
                        <input type="text" name="search" placeholder="Cari judul buku..." value="{{ request('search') }}" style="border: 1px solid #CBD5E0; padding: 0.5rem; border-radius: 0.375rem; width: 100%; max-width: 300px;">
                        <button type="submit" style="padding: 0.5rem 1rem; background-color: #3B82F6; color: white; border-radius: 0.375rem;">Cari</button>
                    </form>
                </div>

                <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 1.5rem; margin-top: 1.5rem;">
                    @forelse ($buku as $item)
                        <div style="background-color: white; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); overflow: hidden;">
                            <img src="{{ asset('storage/' . $item->cover_path) }}" alt="{{ $item->nama_buku }} cover" style="width: 100%; height: 12rem; object-fit: cover;">
                            <div style="padding: 1rem;">
                                <h3 style="font-size: 1.125rem; font-weight: 600; color: #1A202C;">{{ $item->nama_buku }}</h3>
                                <p style="color: #4A5568;">Penulis: {{ $item->penulis }}</p>
                                <p style="color: #4A5568;">Tahun Rilis: {{ $item->tahun_rilis }}</p>
                                <div style="margin-top: 1rem; display: flex; justify-content: space-between; align-items: center;">
                                    @if(auth()->user()->role === 'siswa')
                                        <!-- Tombol untuk membuka modal Bootstrap -->
                                        <button type="button" class="btn btn-link" style="color: #3B82F6;" data-bs-toggle="modal" data-bs-target="#detailModal-{{ $item->id }}">Detail</button>
                                    @else
                                        <a href="{{ route('buku.show', $item->id) }}" style="color: #3B82F6;">Detail</a>
                                        <x-confirm-delete-modal>
                                            <x-slot name="trigger">
                                                <button class="btn btn-link" style="color: #E53E3E;">Hapus</button>
                                            </x-slot>
                                            <x-slot name="title">
                                                Konfirmasi Hapus
                                            </x-slot>
                                            <x-slot name="content">
                                                Apakah Anda yakin ingin menghapus buku ini?
                                            </x-slot>
                                            <x-slot name="footer">
                                                <form id="deleteForm-{{ $item->id }}" action="{{ route('buku.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-primary-button type="submit" style="background-color: #E53E3E; color: white;">Hapus</x-primary-button>
                                                    <x-secondary-button data-bs-dismiss="modal">Batal</x-secondary-button>
                                                </form>
                                            </x-slot>
                                        </x-confirm-delete-modal>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Modal Detail Buku Bootstrap -->
                        <div class="modal fade" id="detailModal-{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel-{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel-{{ $item->id }}">{{ $item->nama_buku }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Penulis:</strong> {{ $item->penulis }}</p>
                                        <p><strong>Tahun Rilis:</strong> {{ $item->tahun_rilis }}</p>
                                        @if($item->ebook_path)
                                            <a href="{{ asset('storage/' . $item->ebook_path) }}" class="btn btn-primary" target="_blank">Baca eBook</a>
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
                    @empty
                        <div style="grid-column: span 5; text-align: center; color: #A0AEC0;">
                            Tidak ada data yang ditemukan.
                        </div>
                    @endforelse
                </div>

                <div style="margin-top: 1.5rem;">
                    {{ $buku->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
