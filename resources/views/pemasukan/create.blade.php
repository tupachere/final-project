<x-layout title="Pemasukan" :breadcrumb="['Pemasukan', 'Sanggar']">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tambah Pemasukan
        </div>
        <div class="card-body">
            <form action="{{ route('pemasukan.store') }}" method="POST">
                @csrf

                <!-- Pemasukan -->
                <div class="form-group mt-3">
                    <label for="pemasukan">Pemasukan:</label>
                    <textarea class="form-control @error('pemasukan') is-invalid @enderror" id="pemasukan" name="pemasukan" rows="3">{{ old('pemasukan') }}</textarea>
                    @error('pemasukan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tanggal Kas -->
                <div class="form-group mt-3">
                    <label for="tgl_masuk">Tanggal pemasukan:</label>
                    <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" id="tgl_masuk" name="tgl_masuk" value="{{ old('tgl_masuk', now()->format('Y-m-d')) }}" required>
                    @error('tgl_masuk')
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
