@extends('backend.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Mata Pelajaran</h3>
            
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Mata Pelajaran</a>
                </li>
            </ul>
        </div>
    </div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="card-title">Data Mata Pelajaran</div>
                <a href="{{ route('mapel.create') }}" class="btn btn-success">Tambah Mapel</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover" width="100%" id='mapel'>
                <thead class="table-info">
                    <tr>
                        <th>No</th>
                        <th>Nama Pelajaran</th>
                        <th>Kode Pelajaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('script')

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#mapel').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('mapel') }}",
    dom: '<"top d-flex justify-content-between mb-3"lf>rt<"bottom"ip><"clear">',
    columns: [
        { 
            data: null, 
            name: 'no', 
            render: function (data, type, row, meta) {
                return meta.row + 1; 
            }
        },
        { data: 'name', name: 'name' }, 
        { data: 'code', name: 'code' },
        { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
});

    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Tampilkan notifikasi
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000
        });
    @endif

    // SweetAlert hapus
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            let form = this.closest('form');
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

