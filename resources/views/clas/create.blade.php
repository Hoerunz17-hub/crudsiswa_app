@extends('layouts.app')
@section('title', 'Halaman Tambah Kelas')
@section('content')

    <link rel="stylesheet" href="{{ asset('assetes/css/buat.css') }}">

    <div class="form-container">
        <h1>Halaman Tambah Kelas</h1>
        <b>Form Tambah Kelas</b>
        <hr>
        <a href="/clas" class="back-link">Kembali</a>

        <form action="/clas/store" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Kelas</label>
                <input type="text" name="name" id="name" placeholder="Masukkan nama kelas">
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <input type="text" name="description" id="description" placeholder="Masukkan deskripsi kelas">
                @error('description')
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
