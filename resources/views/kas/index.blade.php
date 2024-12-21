<x-layout title="Pembayaran Kas" :breadcrumb="['Kas', 'Pembayaran Kas']">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <i class="fas fa-table me-1"></i>
                    Data Pembayaran Kas
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('kas.create') }}" class="btn btn-sm btn-primary">Tambah Data Kas</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- Pesan Status --}}
            @if(session('status') == 'updated')
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @elseif(session('status') == 'deleted')
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif

            {{-- Tabel Data Kas --}}
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Pembayaran</th>
                        <th>Tanggal</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Pembayaran</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->id_anggota }}</td> <!-- Menampilkan ID Anggota -->
                            <td>{{ $k->anggota->nama ?? 'Nama Tidak Ditemukan' }}</td> <!-- Menampilkan Nama Anggota -->
                            <td>Rp {{ number_format($k->jumlah, 0, ',', '.') }}</td>
                            <td>{{ $k->tgl_kas }}</td> <!-- Tanggal Kas -->
                            <td>
                                <a href="{{ route('kas.edit', $k->id) }}" style="color: #019dfe; margin-right: 13px;">
                                    <i class="fa-solid fa-pen-to-square fa-xl"></i>
                                </a>

                                <!-- Tombol Delete dengan Modal -->
                                <button type="button" style="color: #ec0909; background: transparent; border: none;" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $k->id }}">
                                    <i class="fa-solid fa-trash fa-xl"></i>
                                </button>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="deleteModal{{ $k->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Hapus Pembayaran Kas</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data kas untuk <strong>{{ $k->anggota->nama }}</strong> dengan ID <strong>{{ $k->id_anggota }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <form action="{{ route('kas.destroy', $k->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
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
        </div>
    </div>
</x-layout>
