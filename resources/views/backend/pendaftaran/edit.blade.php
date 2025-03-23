<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-header {
            background-color: #343a40;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }
        .card {
            max-width: 800px;
            width: 100%;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

    <div class="container">
        <div class="card shadow-sm mx-auto">
            <div class="card-header text-center">Edit Pendaftaran</div>
            <div class="card-body">
                <a href="/" class="btn btn-dark btn-sm mb-3">
                    <i class="fas fa-arrow-left"></i> Kembali</a>

                <form action="{{ route('pendaftaran.update', $pendaftaran->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row row-cols-2">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" value="{{ $pendaftaran->nama_lengkap }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NISN</label>
                            <input type="text" class="form-control" name="nisn" value="{{ $pendaftaran->nisn }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="address" value="{{ $pendaftaran->address }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="{{ $pendaftaran->tanggal_lahir }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-control" name="gender" required>
                                <option value="Laki-laki" {{ $pendaftaran->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $pendaftaran->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Asal Sekolah</label>
                            <input type="text" class="form-control" name="asal_sekolah" value="{{ $pendaftaran->asal_sekolah }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" name="no_hp" value="{{ $pendaftaran->no_hp }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $pendaftaran->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Ayah</label>
                            <input type="text" class="form-control" name="nama_ayah" value="{{ $pendaftaran->nama_ayah }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" name="nama_ibu" value="{{ $pendaftaran->nama_ibu }}" required>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
