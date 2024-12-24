<x-layout title="Edit Jadwal Kegiatan" :breadcrumb="['Jadwal', 'Edit']">

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i>
            Edit Jadwal Kegiatan
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('jadwals.update', $jadwal->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_kegiatan">Nama Kegiatan:</label>
                    <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror"
                           id="nama_kegiatan" name="nama_kegiatan"
                           value="{{ old('nama_kegiatan', $jadwal->nama_kegiatan) }}" required>
                    @error('nama_kegiatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                           id="tanggal" name="tanggal"
                           value="{{ old('tanggal', $jadwal->tanggal) }}" required>
                    @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="waktu">Waktu:</label>
                    <input type="time" class="form-control @error('waktu') is-invalid @enderror"
                           id="waktu" name="waktu"
                           value="{{ old('waktu', $jadwal->waktu) }}">
                    @error('waktu')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat', $jadwal->alamat) }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="divisi">Divisi:</label>
                    <select class="form-control @error('divisi') is-invalid @enderror" id="divisi" name="divisi">
                        <option value="" disabled>Pilih Divisi</option>
                        <option value="tari" {{ old('divisi', $jadwal->divisi) == 'tari' ? 'selected' : '' }}>Tari</option>
                        <option value="karawitan" {{ old('divisi', $jadwal->divisi) == 'karawitan' ? 'selected' : '' }}>Karawitan</option>
                        <option value="pentas seni" {{ old('divisi', $jadwal->divisi) == 'pentas seni' ? 'selected' : '' }}>Pentas Seni</option>
                        <option value="reog" {{ old('divisi', $jadwal->divisi) == 'reog' ? 'selected' : '' }}>Reog</option>
                    </select>
                    @error('divisi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mt-4">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

</x-layout>
