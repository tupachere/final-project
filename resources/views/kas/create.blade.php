<x-layout title="Tambah Kas" :breadcrumb="['Kas', 'Tambah']">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tambah Data Kas
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form action="{{ route('kas.store') }}" method="POST">
                @csrf
                <!-- Combobox Nama Anggota -->
                <div class="form-group">
                    <label for="id_anggota">Nama Anggota:</label>
                    <select class="form-control @error('id_anggota') is-invalid @enderror" id="id_anggota" name="id_anggota" required>
                        <option value="" disabled selected>Pilih Nama Anggota</option>
                        @foreach ($anggota as $a)
                            <option value="{{ $a->id }}">{{ $a->nama }}</option>
                        @endforeach
                    </select>
                    @error('id_anggota')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tanggal Kas -->
                <div class="form-group mt-3">
                    <label for="tgl_kas">Tanggal Kas:</label>
                    <input type="date" class="form-control @error('tgl_kas') is-invalid @enderror" id="tgl_kas" name="tgl_kas" value="{{ old('tgl_kas', now()->format('Y-m-d')) }}" required>
                    @error('tgl_kas')
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

<!-- Tambahkan Script Select2 untuk Search Input -->
@push('scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#id_anggota').select2({
                placeholder: "Cari Nama Anggota...",
                allowClear: true,
                width: '100%' // Agar menyesuaikan dengan form
            });
        });
    </script>
@endpush
