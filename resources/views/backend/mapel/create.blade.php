@extends('backend.app')

@section('content')
<div class="container" style="min-height: 100vh; overflow-y: auto;">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Tambah Mata Pelajaran</div>
                        <a href="{{ route('mapel') }}" class="btn btn-info btn-sm">Kembali</a>
                    </div>
                    <div class="card-body" style="min-height: 70vh; overflow-y: auto;">
                        <form action="{{ route('mapel.store') }}" method="POST">
                            @csrf
                            
                            {{-- Nama Pelajaran --}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nama Pelajaran</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" 
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                        name="name" value="{{ old('name') }}" required autofocus>
                                    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Kode Pelajaran --}}
                            <div class="form-group row mt-3">
                                <label for="code" class="col-md-4 col-form-label text-md-right">Kode Pelajaran</label>
                                <div class="col-md-6">
                                    <input id="code" type="text" 
                                        class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" 
                                        name="code" value="{{ old('code') }}" required>
                                    
                                    @if ($errors->has('code'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Tombol Simpan --}}
                            <div class="form-group row mt-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div> {{-- End Card Body --}}
                </div> {{-- End Card --}}
            </div>
        </div>
    </div>
</div>
@endsection
