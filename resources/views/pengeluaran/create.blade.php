<x-layout title="Pengeluaran" :breadcrumb="['Pengeluaran', 'Sanggar']">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tambah Pengeluaran
        </div>
        <div class="card-body">
            <form action="{{ route('pengeluaran.store') }}" method="POST">
                @csrf

                <!-- Pengeluaran -->
                <div class="form-group mt-3">
                    <label for="pengeluaran">Pengeluaran:</label>
                    <textarea class="form-control @error('pengeluaran') is-invalid @enderror" id="pengeluaran" name="pengeluaran" rows="3">{{ old('pengeluaran') }}</textarea>
                    @error('pengeluaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tanggal Kas -->
                <div class="form-group mt-3">
                    <label for="tgl_keluar">Tanggal Pengeluaran:</label>
                    <input type="date" class="form-control @error('tgl_keluar') is-invalid @enderror" id="tgl_keluar" name="tgl_keluar" value="{{ old('tgl_keluar', now()->format('Y-m-d')) }}" required>
                    @error('tgl_keluar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Jumlah -->
                <div class="form-group mt-3">
                    <label for="jumlah">Jumlah:</label>
                    <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" required>
                    @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>
    </div>
</x-layout>
