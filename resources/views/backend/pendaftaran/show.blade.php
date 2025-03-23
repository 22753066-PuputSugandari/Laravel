@extends('backend.app')

@section('content')
    <div class="container">
        <h1 class="fw-bold mb-3 text-center">Detail Pendaftaran</h1>
        
        <div class="card shadow-sm ms-4 me-4">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $pendaftaran->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>NISN</th>
                        <td>{{ $pendaftaran->nisn }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td>{{ $pendaftaran->address }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $pendaftaran->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $pendaftaran->gender }}</td>
                    </tr>
                    <tr>
                        <th>Asal Sekolah</th>
                        <td>{{ $pendaftaran->asal_sekolah }}</td>
                    </tr>
                    <tr>
                        <th>Nomor HP</th>
                        <td>{{ $pendaftaran->no_hp }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ayah</th>
                        <td>{{ $pendaftaran->nama_ayah }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ibu</th>
                        <td>{{ $pendaftaran->nama_ibu }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $pendaftaran->email }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge 
                                @if($pendaftaran->status == 'Pending') bg-warning
                                @elseif($pendaftaran->status == 'Diterima') bg-success
                                @elseif($pendaftaran->status == 'Ditolak') bg-danger
                                @endif">
                                {{ $pendaftaran->status }}
                            </span>

                            <div class="mt-2">
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#statusModal">Ubah Status</button>
                            </div>
                        </td>
                    </tr>
                </table>
                
                <a href="{{ route('pendaftaran') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>

    <!-- Modal Ubah Status -->
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Ubah Status Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pendaftaran.updatestatus', $pendaftaran->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label for="status" class="form-label">Pilih Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="Diterima" {{ $pendaftaran->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="Ditolak" {{ $pendaftaran->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>

                        <div class="mt-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endsection
@endsection