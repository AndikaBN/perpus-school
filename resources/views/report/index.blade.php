<title>Laporan</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"  style="color: #FFF;">
            {{ __('Laporan Peminjaman') }}
        </h2>
    </x-slot>

    <div style="padding: 3.5rem; background-color: #25324d;">
        <div style="background-color: #1A202C; border-radius: 0.375rem; overflow: hidden; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);">
            @include('alert.alert-info') <!-- Memasukkan alert jika ada -->

            <div style="padding: 1.5rem; background-color: #1A202C; border-bottom: 1px solid #E2E8F0;">
                <form action="{{ route('laporan.cetak') }}" method="get" class="mb-4">
                    <div class="flex items-center space-x-4">
                        <label for="start_date" class="font-medium text-gray-300">Mulai Tanggal:</label>
                        <input type="date" id="start_date" name="start_date" required
                            style="background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; padding: 0.5rem;">

                        <label for="end_date" class="font-medium text-gray-300">Sampai Tanggal:</label>
                        <input type="date" id="end_date" name="end_date" required
                            style="background-color: #2D3748; color: #E2E8F0; border: 1px solid #4A5568; border-radius: 0.375rem; padding: 0.5rem;">

                        <button type="submit"
                            style="background-color: #4A5568; color: #63B3ED; padding: 0.5rem 1rem; border-radius: 0.375rem;">
                            Cetak
                        </button>
                    </div>
                </form>
            </div>

            <div style="padding: 1.5rem; background-color: #1A202C;">
                <h3 class="text-lg font-semibold text-gray-200 mb-4">Peminjaman Terakhir</h3>

                @if ($peminjaman->isEmpty())
                    <p style="color: #CBD5E0;">Tidak ada data untuk periode yang dipilih.</p>
                @else
                    <div class="overflow-x-auto">
                        <table style="width: 100%; background-color: #1A202C; border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th style="padding: 0.75rem; text-align: left; color: #E2E8F0; border-bottom: 1px solid #4A5568;">Nomor Peminjaman</th>
                                    <th style="padding: 0.75rem; text-align: left; color: #E2E8F0; border-bottom: 1px solid #4A5568;">Nama Peminjam</th>
                                    <th style="padding: 0.75rem; text-align: left; color: #E2E8F0; border-bottom: 1px solid #4A5568;">Judul Buku</th>
                                    <th style="padding: 0.75rem; text-align: left; color: #E2E8F0; border-bottom: 1px solid #4A5568;">Tanggal Pinjam</th>
                                    <th style="padding: 0.75rem; text-align: left; color: #E2E8F0; border-bottom: 1px solid #4A5568;">Tanggal Kembali</th>
                                    <th style="padding: 0.75rem; text-align: left; color: #E2E8F0; border-bottom: 1px solid #4A5568;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peminjaman as $p)
                                    <tr style="background-color: #2D3748;">
                                        <td style="padding: 0.75rem; color: #E2E8F0;">{{ $p->no_peminjaman }}</td>
                                        <td style="padding: 0.75rem; color: #E2E8F0;">{{ $p->user->nama }}</td>
                                        <td style="padding: 0.75rem; color: #E2E8F0;">{{ $p->buku->nama_buku }}</td>
                                        <td style="padding: 0.75rem; color: #E2E8F0;">{{ \Carbon\Carbon::parse($p->tgl_peminjaman)->format('d M Y') }}</td>
                                        <td style="padding: 0.75rem; color: #E2E8F0;">{{ \Carbon\Carbon::parse($p->tgl_pengembalian)->format('d M Y') }}</td>
                                        <td style="padding: 0.75rem; color: #E2E8F0;">{{ $p->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
