<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Siswa Baru</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assetes/css/create.css') }}">
</head>

<body>

    <div class="container">
        <header>
            <a href="/" class="back-link"><i class="fas fa-arrow-left"></i> Kembali</a>
            <h1>Formulir Tambah Siswa</h1>
            <p>Isi data siswa dengan lengkap dan benar.</p>
        </header>

        <form action="/siswa/store" method="POST" enctype="multipart/form-data" class="student-form">
            @csrf

            <div class="form-group">
                <label for="kelas_id"><i class="fas fa-building-user"></i> Kelas</label>
                <div class="select-wrapper">
                    <select name="kelas_id" id="kelas_id">
                        @foreach ($clases as $clas)
                            <option value="{{ $clas->id }}">{{ $clas->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('kelas_id')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="name"><i class="fas fa-user"></i> Nama</label>
                <input type="text" name="name" id="name" placeholder="Masukkan nama siswa"
                    value="{{ old('name') }}">
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="nisn"><i class="fas fa-id-card"></i> NISN</label>
                <input type="text" name="nisn" id="nisn" placeholder="Masukkan NISN"
                    value="{{ old('nisn') }}">
                @error('nisn')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="alamat"><i class="fas fa-map-location-dot"></i> Alamat</label>
                <input type="text" name="alamat" id="alamat" placeholder="Masukkan alamat siswa"
                    value="{{ old('alamat') }}">
                @error('alamat')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan email"
                    value="{{ old('email') }}">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan password">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="no_handphone"><i class="fas fa-phone"></i> Nomor Handphone</label>
                <input type="tel" name="no_handphone" id="no_handphone" placeholder="Masukkan nomor handphone"
                    value="{{ old('no_handphone') }}">
                @error('no_handphone')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group file-upload-wrapper">
                <label for="foto"><i class="fas fa-camera"></i> Foto Profil</label>
                <div class="file-input-container">
                    <input type="file" name="foto" id="foto" class="input-file">
                    <label for="foto" class="file-label">Pilih Foto</label>
                    <span id="file-name" class="file-name">Tidak ada file terpilih</span>
                </div>
                @error('foto')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-secondary"><i class="fas fa-undo"></i> Reset</button>
            </div>
        </form>
    </div>

    <script>
        const fileInput = document.getElementById('foto');
        const fileNameDisplay = document.getElementById('file-name');

        fileInput.addEventListener('change', (event) => {
            const fileName = event.target.files[0] ? event.target.files[0].name : 'Tidak ada file terpilih';
            fileNameDisplay.textContent = fileName;
        });
    </script>

</body>

</html>
