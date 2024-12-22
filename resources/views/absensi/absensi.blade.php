<x-layout title="Tambah Absensi" :breadcrumb="['Absensi', 'Tambah']">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-check-circle me-1"></i>
            Tambah Absensi Anggota
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form Tambah Absensi --}}
            <form action="{{ route('absensi.store') }}" method="POST">
                @csrf

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Anggota</th>
                            <th>Tanggal</th>
                            <th>Status Kehadiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\Anggota::all() as $anggota)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $anggota->nama }}</td>
                                <td>
                                    <input type="hidden" name="absensi[{{ $anggota->id }}][anggota_id]" value="{{ $anggota->id }}">
                                    <input type="date" class="form-control @error('absensi.'.$anggota->id.'.tanggal') is-invalid @enderror"
                                        name="absensi[{{ $anggota->id }}][tanggal]"
                                        value="{{ old('absensi.'.$anggota->id.'.tanggal', now()->format('Y-m-d')) }}" required>
                                    @error('absensi.'.$anggota->id.'.tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                               name="absensi[{{ $anggota->id }}][status]"
                                               id="hadir_{{ $anggota->id }}"
                                               value="hadir"
                                               {{ old('absensi.'.$anggota->id.'.status') == 'hadir' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="hadir_{{ $anggota->id }}">Hadir</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                               name="absensi[{{ $anggota->id }}][status]"
                                               id="tidak_hadir_{{ $anggota->id }}"
                                               value="tidak hadir"
                                               {{ old('absensi.'.$anggota->id.'.status') == 'tidak hadir' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="tidak_hadir_{{ $anggota->id }}">Tidak Hadir</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                               name="absensi[{{ $anggota->id }}][status]"
                                               id="izin_{{ $anggota->id }}"
                                               value="izin"
                                               {{ old('absensi.'.$anggota->id.'.status') == 'izin' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="izin_{{ $anggota->id }}">Izin</label>
                                    </div>
                                    @error('absensi.'.$anggota->id.'.status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mt-4">Simpan Absensi</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
