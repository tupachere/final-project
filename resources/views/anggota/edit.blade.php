<x-layout title="Edit Anggota" :breadcrumb="['Anggota','Edit']">

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit data anggota
            </div>
            <div class="card-body">
                <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="id">ID:</label>
                        <input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" value="{{ $anggota->id }}" readonly>
                        @error('id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $anggota->nama }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                            <option value="" disabled selected>Select Gender</option>
                            <option value="Laki - Laki" {{ old('gender', $anggota->gender) == 'Laki - Laki' ? 'selected' : '' }}>Laki - Laki</option>
                            <option value="Perempuan" {{ old('gender', $anggota->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ttl">Tempat, tanggal lahir:</label>
                        <input type="text" class="form-control @error('ttl') is-invalid @enderror" id="ttl" name="ttl" value="{{ old('ttl', $anggota->ttl) }}">
                        @error('ttl')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea
                            class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat', $anggota->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="divisi">Divisi:</label>
                        <select class="form-control @error('divisi') is-invalid @enderror" id="divisi" name="divisi">
                            <option value="" disabled selected>Pilih Divisi</option>
                            <option value="tari" {{ old('divisi', $anggota->divisi) == 'tari' ? 'selected' : '' }}>Tari</option>
                            <option value="karawitan" {{ old('divisi', $anggota->divisi) == 'karawitan' ? 'selected' : '' }}>Karawitan</option>
                            <option value="pentas seni" {{ old('divisi', $anggota->divisi) == 'pentas seni' ? 'selected' : '' }}>Pentas Seni</option>
                            <option value="reog" {{ old('divisi', $anggota->divisi) == 'reog' ? 'selected' : '' }}>Reog</option>
                        </select>
                        @error('divisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Anggota:</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                        @if(isset($anggota->foto) && !empty($anggota->foto))
                            <img src="{{ url('images/' . $anggota->foto) }}" alt="Foto Produk" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                        @else
                            <img src="{{ url('images/nophoto.jpg') }}" alt="No Foto" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                        @endif

                    </div>
                    <button type="button" class="btn btn-secondary mt-4" onclick="window.history.back()">Kembali</button>

                    <button type="submit" class="btn btn-primary mt-4">Submit</button>

                </form>
            </div>
        </div>
</x-layout>
