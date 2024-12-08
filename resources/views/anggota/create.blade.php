<x-layout title="Tambah Anggota" :breadcrumb="['Angggota','Tambah']">

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tambah data anggota
            </div>
            <div class="card-body">
                <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="id">ID:</label>
                        <input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" value="{{ old('id') }}" required>
                        @error('id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                            <option value="" disabled selected>Select Gender</option>
                            <option value="Laki - Laki" {{ old('gender') == 'Laki - Laki' ? 'selected' : '' }}>Laki - Laki</option>
                            <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ttl">Tempat, tanggal lahir:</label>
                        <input type="text" class="form-control @error('ttl') is-invalid @enderror" id="ttl" name="ttl" value="{{ old('ttl') }}">
                        @error('ttl')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea
                            class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="divisi">Divisi:</label>
                        <select
                            class="form-control @error('divisi') is-invalid @enderror" id="divisi" name="divisi">
                            <option value="" disabled selected>Pilih Divisi</option>
                            <option value="tari" {{ old('divisi') == 'tari' ? 'selected' : '' }}>Tari</option>
                            <option value="karawitan" {{ old('divisi') == 'karawitan' ? 'selected' : '' }}>Karawitan</option>
                            <option value="pentas seni" {{ old('divisi') == 'pentas seni' ? 'selected' : '' }}>Pentas Seni</option>
                            <option value="reog" {{ old('divisi') == 'reog' ? 'selected' : '' }}>Reog</option>
                        </select>
                        @error('divisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Anggota:</label>
                        <input type="file" class="form-control" id="foto" name="foto">

                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
</x-layout>