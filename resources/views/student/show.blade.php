@extends('backend.app')

@section('content')

<div class="container" style="min-height: 80vh; overflow-y: auto;">
    <div class="card">
        <div class="card-header">
            <h3 class="fw-bold">Detail Student</h3>
        </div>
        <div class="card-body" style="max-height: 60vh; overflow-y: auto;">
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <td>{{ $student->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $student->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $student->phone }}</td>
                </tr>
                <tr>
                    <th>Class</th>
                    <td>{{ $student->class ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $student->address }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ ucfirst($student->gender) }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <span class="badge {{ $student->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($student->status) }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Foto</th>
                    <td>
                        <img src="{{ $student->image ? asset('images/' . $student->image) : asset('images/default.png') }}" 
                             alt="{{ $student->name }}" 
                             class="rounded" width="100">
                    </td>
                </tr>
            </table>
            <a href="{{ route('techer') }}" class="btn btn-info btn-sm">Kembali</a>
</div>
</div>
@endsection
