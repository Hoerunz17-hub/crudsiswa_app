@extends('layouts.app')
@section('title', 'Halaman Tambah Siswa')
@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('assetes/css/create.css') }}">

    <div class="form-container">
        <h1>Halaman Tambah Siswa</h1>
        <b>Form Tambah Siswa</b>
        <hr>
        <a href="/" class="back-link">Kembali</a>

        <form action="/siswa/store" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="kelas_id">Kelas</label>
                <select name="kelas_id" id="kelas_id">
                    @foreach ($clases as $clas)
                        <option value="{{ $clas->id }}">{{ $clas->name }}</option>
                    @endforeach
                </select>
                @error('kelas_id')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" placeholder="Masukkan nama siswa">
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="nisn">Nisn</label>
                <input type="text" name="nisn" id="nisn" placeholder="Masukkan NISN">
                @error('nisn')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat siswa">
                @error('alamat')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Masukkan Email">
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan Password">
                @error('password')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="no_handphone">No Handphone</label>
                <input type="tel" name="no_handphone" id="no_handphone" placeholder="Masukkan no handphone">
                @error('no_handphone')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto">
                @error('foto')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-buttons">
                <button type="submit">Simpan</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>
@endsection
