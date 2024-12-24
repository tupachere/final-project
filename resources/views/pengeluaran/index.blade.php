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
                    <a href="{{ route('pengeluaran.export') }}" id="btne" class="btn btn-sm btn-success">Export Excel</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- Tabel Data Pengeluaran --}}
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengeluaran</th>
                        <th>Tanggal Keluar</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Pengeluaran</th>
                        <th>Tanggal Keluar</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->pengeluaran ?? 'Pengeluaran Tidak Ditemukan' }}</td> <!-- Menampilkan Pengeluaran -->
                            <td>{{ $k->tgl_keluar }}</td> <!-- Tanggal Keluar -->
                            <td>Rp {{ number_format($k->jumlah, 0, ',', '.') }}</td>
                            <td>
                                <!-- Tombol Delete dengan Modal -->
                                <button type="button" style="color: #ec0909; background: transparent; border: none;" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $k->id }}">
                                    <i class="fa-solid fa-trash fa-xl"></i>
                                </button>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="deleteModal{{ $k->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Hapus Pengeluaran</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data <strong>{{ $k->pengeluaran }}</strong> dengan ID <strong>{{ $k->id }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="btns" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <form action="{{ route('pengeluaran.destroy', $k->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" id="btnp" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
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
