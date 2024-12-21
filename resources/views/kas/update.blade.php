<x-layout title="Update Kas" :breadcrumb="['Kas', 'Update']">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Data Kas
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('kas.update', $kas->id) }}" method="POST">
                @csrf
                @method('put')
                <!-- ID Anggota -->
                <div class="form-group">
                    <label for="id_anggota">ID Anggota:</label>
                    <input type="text"
                           class="form-control @error('id_anggota') is-invalid @enderror"
                           id="id_anggota"
                           name="id_anggota"
                           value="{{ $kas->id_anggota }}"
                           readonly>
                    @error('id_anggota')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tanggal Kas -->
                <div class="form-group mt-3">
                    <label for="tgl_kas">Tanggal Kas:</label>
                    <input type="date"
                           class="form-control @error('tgl_kas') is-invalid @enderror"
                           id="tgl_kas"
                           name="tgl_kas"
                           value="{{ old('tgl_kas', $kas->tgl_kas) }}"
                           required>
                    @error('tgl_kas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Jumlah -->
                <div class="form-group mt-3">
                    <label for="jumlah">Jumlah:</label>
                    <input type="number"
                           class="form-control @error('jumlah') is-invalid @enderror"
                           id="jumlah"
                           name="jumlah"
                           value="{{ old('jumlah', $kas->jumlah) }}"
                           min="0"
                           required>
                    @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="mt-4 d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" onclick="window.history.back()">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
