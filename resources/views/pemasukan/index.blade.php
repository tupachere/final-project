<x-layout title="Pemasukan" :breadcrumb="['Pemasukan', 'Pemasukan Sanggar']">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <i class="fas fa-table me-1"></i>
                    Pemasukan Sanggar
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('pemasukan.create') }}" class="btn btn-sm btn-primary">Tambah Data Pemasukan</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- Tabel Data Pemasukan --}}
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Sumber Pemasukan</th>
                        <th>Tanggal Masuk</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Sumber Pemasukan</th>
                        <th>Tanggal Masuk</th>
                        <th>Jumlah</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->id }}</td> <!-- Menampilkan ID pemasukan -->
                            <td>{{ $k->pemasukan ?? 'Pemasukan Tidak Ditemukan' }}</td> <!-- Menampilkan Pemasukan -->
                            <td>{{ $k->tgl_masuk }}</td> <!-- Tanggal Masuk -->
                            <td>Rp {{ number_format($k->jumlah, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Total Pemasukan --}}
            <div class="mt-4">
                <h5>Total Pemasukan: Rp {{ number_format($data->sum('jumlah'), 0, ',', '.') }}</h5>
            </div>
        </div>
    </div>
</x-layout>
