<x-layout title="Anggota List" :breadcrumb="['Anggota','List Anggota']">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <i class="fas fa-table me-1"></i>
                    Data Table
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('anggota.create') }}" class="btn btn-sm btn-primary">Tambah Data Anggota</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>TTL</th>
                        <th>Alamat</th>
                        <th>Divisi</th>
                        <th>Foto</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>TTL</th>
                        <th>Alamat</th>
                        <th>Divisi</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ( $anggota as $k )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->id }}</td>
                            <td>{{ $k->nama }}</td>
                            <td>{{ $k->gender }}</td>
                            <td>{{ $k->ttl }}</td>
                            <td>{{ $k->alamat }}</td>
                            <td>{{ $k->divisi }}</td>
                            <td>
                                @empty($k->foto)
                                <img src="{{url('images/nophoto.jpg')}}"
                                    alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                                @else
                                <img src="{{url('images')}}/{{$k->foto}}"
                                    alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                                @endempty
                            </td>
                            <td>
                                <a href="{{ route('anggota.edit', $k->id) }}" style="color: #019dfe; margin-right: 12px;">
                                    <i class="fa-solid fa-pen-to-square fa-xl"></i>
                                </a>

                                <button type="button" class="fa-solid fa-trash fa-xl" style="color: #ec0909;" data-bs-toggle="modal" data-bs-target="#exampleModal{{$k->id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$k->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Anggota</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Apakah anda yakin akan menghapus data anggota ini!!! {{$k->nama}}
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                        <form action="{{ route('anggota.destroy', $k->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>

                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
