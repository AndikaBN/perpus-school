<title>Buku</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" style="color: #FFF;">
            {{ __('Daftar Buku') }}
        </h2>
    </x-slot>

    <div style="padding: 3.5rem; background-color: #25324d;">
        <div style="background-color: #1A202C; border-radius: 0.375rem; overflow: hidden; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);">
            @include('alert.alert-info')

            <div style="padding: 1.5rem; background-color: #1A202C; border-bottom: 1px solid #E2E8F0;">
                <div class="flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('buku.create') }}" style="display: inline-block; background-color: #4A5568; color: #63B3ED; border-radius: 0.375rem; padding: 0.5rem 1rem; text-decoration: none;">
                        Tambah
                    </a>

                    <form action="{{ route('buku.index') }}" method="GET" class="flex flex-col sm:flex-row items-center mt-4 sm:mt-0 space-y-2 sm:space-y-0 sm:space-x-4">
                        <input type="text" name="search" placeholder="Cari judul buku..." value="{{ request('search') }}"
                            style="background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; padding: 0.5rem;">
                        
                        <button type="submit" style="background-color: #4A5568; color: #63B3ED; padding: 0.5rem 1rem; border-radius: 0.375rem;">
                            Cari
                        </button>
                    </form>
                </div>

                <div class="mt-4 overflow-x-auto">
                    <table style="width: 100%; background-color: #1A202C; border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th style="padding: 0.75rem; text-align: left; color: #E2E8F0; border-bottom: 1px solid #4A5568;">Nama</th>
                                <th style="padding: 0.75rem; text-align: left; color: #E2E8F0; border-bottom: 1px solid #4A5568;">Penulis</th>
                                <th style="padding: 0.75rem; text-align: left; color: #E2E8F0; border-bottom: 1px solid #4A5568;">Tahun Rilis</th>
                                <th style="padding: 0.75rem; text-align: left; color: #E2E8F0; border-bottom: 1px solid #4A5568;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($buku as $item)
                                <tr style="background-color: #2D3748;">
                                    <td style="padding: 0.75rem; color: #E2E8F0;">{{ $item->nama_buku }}</td>
                                    <td style="padding: 0.75rem; color: #E2E8F0;">{{ $item->penulis }}</td>
                                    <td style="padding: 0.75rem; color: #E2E8F0;">{{ $item->tahun_rilis }}</td>
                                    <td style="padding: 0.75rem; color: #E2E8F0;">
                                        @if(auth()->user()->role !== 'siswa')
                                            <button onclick="if(confirm('Apakah Anda yakin ingin menghapus buku ini?')) document.getElementById('deleteForm-{{ $item->id }}').submit();" style="color: #E53E3E; background-color: transparent; border: none; cursor: pointer;">
                                                Hapus
                                            </button>
                                            <form id="deleteForm-{{ $item->id }}" action="{{ route('buku.destroy', $item->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="padding: 0.75rem; text-align: center; color: #CBD5E0;">Tidak ada data yang ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4" style="color: #CBD5E0;">
                    {{ $buku->appends(request()->input())->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
