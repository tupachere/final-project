<x-layout title="Pengeluaran" :breadcrumb="['Pengeluaran', 'Pengeluaran Sanggar']">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <i class="fas fa-table me-1"></i>
                    Pengeluaran Sanggar
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('pengeluaran.create') }}" class="btn btn-sm btn-primary">Tambah Data Pengeluaran</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- Tabel Data Pengeluaran --}}
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Pengeluaran</th>
                        <th>Tanggal Keluar</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Pengeluaran</th>
                        <th>Tanggal Keluar</th>
                        <th>Jumlah</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->id }}</td> <!-- Menampilkan ID pengeluaran -->
                            <td>{{ $k->pengeluaran ?? 'Pengeluaran Tidak Ditemukan' }}</td> <!-- Menampilkan Pengeluaran -->
                            <td>{{ $k->tgl_keluar }}</td> <!-- Tanggal Keluar -->
                            <td>Rp {{ number_format($k->jumlah, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Total Pemasukan --}}
            <div class="mt-4">
                <h5>Total Pengeluaran: Rp {{ number_format($data->sum('jumlah'), 0, ',', '.') }}</h5>
            </div>
        </div>
    </div>
</x-layout>
