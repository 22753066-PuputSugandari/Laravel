@extends('backend.app')

@section('content')
<div class="container" style="min-height: 80vh; overflow-y: auto;">
    <div class="card">
    <h3 class="fw-bold">Detail Student</h3>
</div>

    <div class="table-responsive" style="max-height: 60vh; overflow-y: auto;">
        <table class="table">
            <tr><th>Nama</th><td>{{ e(optional($teacher)->name) }}</td></tr>
            <tr><th>Email</th><td>{{ e(optional($teacher)->email) }}</td></tr>
            <tr><th>Phone</th><td>{{ e(optional($teacher)->phone) }}</td></tr>
            <tr><th>Alamat</th><td>{{ e(optional($teacher)->address) }}</td></tr>
            <tr><th>Gender</th><td>{{ ucfirst(e(optional($teacher)->gender)) }}</td></tr>
            <tr>
                <th>Status</th>
                <td>
                    <span class="badge {{ optional($teacher)->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                        {{ ucfirst(e(optional($teacher)->status)) }}
                    </span>
                </td>
            </tr>
            <tr>
                <th>Foto</th>
                <td>
                    <img src="{{ asset('images/' . (optional($teacher)->image ?? 'default.jpg')) }}" 
                         alt="Teacher Image" 
                         class="img-thumbnail" 
                         width="150">
                </td>
            </tr>
        </table>
        <a href="{{ route('techer') }}" class="btn btn-info btn-sm">Kembali</a>
    </div>
</div>
@endsection
