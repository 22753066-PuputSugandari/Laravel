@extends('backend.app')

@section('content')
<div class="container-fluid">
    <div class="page-inner">
        <div class="page-header mb-3">
            <h3 class="fw-bold">Teacher List</h3>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#"><i class="icon-home"></i></a>
                </li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Tables</a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Teacher List</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">Data Teacher</h5>
            <a href="{{ route('teacher.create') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Tambah Teacher
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive" style="max-height: 60vh; overflow-y: auto;">
                <table class="table table-striped table-hover" style="font-size: 12px; min-width: 1200px;">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $index => $techer)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $techer->name }}</td>
                            <td>{{ $techer->email }}</td>
                            <td>{{ $techer->phone }}</td>
                            <td class="text-truncate" style="max-width: 150px;">{{ $techer->address }}</td>
                            <td class="text-center">{{ ucfirst($techer->gender) }}</td>
                            <td class="text-center">
                                <span class="badge {{ $techer->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($techer->status) }}
                                </span>
                            </td>
                            <td class="text-center">
                                @if (!empty($techer->image))
                                    <img src="{{ asset('images/' . $techer->image) }}" alt="{{ $techer->name }}" class="rounded" width="35">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td class="text-center"> 
                                <a href="{{ route('teacher.show', $techer->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('teacher.edit', $techer->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('teacher.delete', $techer->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{ $techer->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Tambahkan link pagination -->
                {{ $teachers->links() }}
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000
        });
    @endif

    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            let form = this.closest('.delete-form');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
