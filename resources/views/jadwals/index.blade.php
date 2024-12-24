<x-layout title="Jadwal Kegiatan" :breadcrumb="['Jadwal','Index']">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <i class="fas fa-table me-1"></i>
                    Jadwal Kegiatan
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('jadwals.create') }}" class="btn btn-sm btn-primary">Tambah Jadwal</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Alamat</th>
                            <th>Divisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jadwals as $jadwal)
                            <tr>
                                <td>{{ $jadwal->nama_kegiatan }}</td>
                                <td>{{ $jadwal->tanggal }}</td>
                                <td>{{ $jadwal->waktu }}</td>
                                <td>{{ $jadwal->alamat }}</td>
                                <td>{{ ucfirst($jadwal->divisi) }}</td>
                                <td>
                                    <a href="{{ route('jadwals.edit', $jadwal->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    <!-- Tombol untuk membuka modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $jadwal->id }}">
                                        Hapus
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{ $jadwal->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $jadwal->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $jadwal->id }}">Hapus Jadwal Kegiatan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus jadwal kegiatan <strong>{{ $jadwal->nama_kegiatan }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" id="btns" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <form action="{{ route('jadwals.destroy', $jadwal->id) }}" method="POST" style="display: inline;">
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
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data jadwal.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
