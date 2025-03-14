@extends('backend.app')

@section('content')
<div class="container" style="min-height: 100vh; overflow-y: auto;">
    <div class="page-inner">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title">Edit Mata Pelajaran</div>
                <a href="{{ route('mapel') }}" class="btn btn-info btn-sm">Kembali</a>
            </div>

            <div class="card-body" style="min-height: 100vh; overflow-y: auto;">
                <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Input Name --}}
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                   name="name" value="{{ old('name', $mapel->name) }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Input Code --}}
                    <div class="form-group row">
                        <label for="code" class="col-md-4 col-form-label text-md-right">Kode Mata Pelajaran</label>
                        <div class="col-md-6">
                            <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" 
                                   name="code" value="{{ old('code', $mapel->code) }}" required>
                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="form-group row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
