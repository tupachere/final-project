<x-layout title="Laporan Absensi" :breadcrumb="['Laporan', 'Absensi']">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Laporan Absensi
        </div>
        <div class="card-body">
            <!-- Form untuk filter berdasarkan tanggal -->
            <form action="{{ route('absensi.laporan') }}" method="GET">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="start_date">Tanggal Mulai:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="end_date">Tanggal Akhir:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary mt-4">Filter</button>
                        <a href="{{ route('absensi.laporan') }}" class="btn btn-secondary mt-4">hapus</a>
                    </div>
                </div>
            </form>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Anggota</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($absensi as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->anggota->nama }}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td>{{ ucfirst($data->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tombol untuk mendownload PDF -->
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('absensi.laporan.pdf', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" class="btn btn-primary">Download Laporan PDF</a>
            </div>
        </div>
    </div>
</x-layout>
