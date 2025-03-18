@extends('backend.app')

@section('content')
<div class="container" style="min-height: 100vh; overflow-y: auto;">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Edit Nilai</div>
                        <a href="{{ route('nilai') }}" class="btn btn-info btn-sm">Kembali</a>
                    </div>
                    <div class="card-body" style="min-height: 70vh; overflow-y: auto;">
                        <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- Pilih Siswa --}}
                            <div class="form-group row">
                                <label for="student_id" class="col-md-4 col-form-label text-md-right">Nama Siswa</label>
                                <div class="col-md-6">
                                    <select id="student_id" name="student_id" class="form-control select2">
                                        <option value="">-- Pilih Siswa --</option>
                                        @foreach($students as $student)
                                            <option value="{{ $student->id }}" {{ $student->id == $nilai->student_id ? 'selected' : '' }}>{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('student_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Pilih Guru --}}
                            <div class="form-group row mt-3">
                                <label for="techer_id" class="col-md-4 col-form-label text-md-right">Nama Guru</label>
                                <div class="col-md-6">
                                    <select id="techer_id" name="techer_id" class="form-control select2">
                                        <option value="">-- Pilih Guru --</option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}" {{ $teacher->id == $nilai->techer_id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('teacher_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Pilih Mata Pelajaran --}}
                            <div class="form-group row mt-3">
                                <label for="mapel_id" class="col-md-4 col-form-label text-md-right">Mata Pelajaran</label>
                                <div class="col-md-6">
                                    <select id="mapel_id" name="mapel_id" class="form-control select2">
                                        <option value="">-- Pilih Mata Pelajaran --</option>
                                        @foreach($mapels as $mapel)
                                            <option value="{{ $mapel->id }}" {{ $mapel->id == $nilai->mapel_id ? 'selected' : '' }}>{{ $mapel->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('mapel_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Input Nilai --}}
                            <div class="form-group row mt-3">
                                <label for="nilai" class="col-md-4 col-form-label text-md-right">Nilai</label>
                                <div class="col-md-6">
                                    <input id="nilai" type="number" min="0" max="100"
                                        class="form-control @error('nilai') is-invalid @enderror"
                                        name="nilai" value="{{ old('nilai', $nilai->nilai) }}" required>
                                    @error('nilai')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Tombol Simpan --}}
                            <div class="form-group row mt-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Update
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

@section('script')
<!-- Select2 CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Pilih opsi",
            allowClear: true
        });
    });
</script>
@endsection
