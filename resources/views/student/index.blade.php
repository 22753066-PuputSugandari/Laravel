@extends('backend.app')

@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header" style="margin-bottom: 10px;">
            <h3 class="fw-bold mb-3">Student List</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#"><i class="icon-home"></i></a>
                </li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Tables</a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Student List</a></li>
            </ul>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="card-title">Data Student</div>
                    <a href="{{ route('student.create') }}" class="btn btn-light btn-sm">
                        <i class="fa fa-plus"></i> Tambah Student
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" style="font-size: 11px; margin-bottom: 0;">
                        <thead class="text-center bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Class</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $index => $student)
                                <tr>
                                    <td class="text-center" style="padding: 5px;">{{ $loop->iteration }}</td>
                                    <td style="padding: 5px;">{{ $student->name }}</td>
                                    <td style="padding: 5px;">{{ $student->email }}</td>
                                    <td style="padding: 5px;">{{ $student->phone }}</td>
                                    <td class="text-center" style="padding: 5px;">{{ $student->class }}</td>
                                    <td class="text-center" style="padding: 5px;">{{ ucfirst($student->gender) }}</td>
                                    <td class="text-center" style="padding: 5px;">
                                        <span class="badge {{ $student->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                            {{ ucfirst($student->status) }}
                                        </span>
                                    </td>
                                    <td class="text-center" style="padding: 5px;">
                                        <img src="{{ asset('images/' . $student->image) }}" alt="{{ $student->name }}" class="rounded-circle" width="30">
                                    </td>
                                    <td class="text-center" style="padding: 5px;">
                                        <div class="d-flex justify-content-center align-items-center gap-1">
                                            <a href="{{ route('student.show', $student->id) }}" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('student.delete', $student->id) }}" method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{ $student->id }}">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $students->links() }}
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
