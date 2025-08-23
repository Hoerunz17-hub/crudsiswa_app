@extends('layouts.app')
@section('title', 'Halaman Edit Kelas')
@section('css')
    <link rel="stylesheet" href="{{ asset('assetes/css/ngedit.css') }}">
@section('content')

    <div class="edit-container">
        <h1>Halaman Edit Kelas</h1>
        <span class="form-title">Formulir untuk memperbarui data kelas.</span>

        <a href="/clas" class="back-link">← Kembali</a>

        <form action="/clas/update/{{ $datakelas->id }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Kelas</label>
                <input type="text" name="name" placeholder="Masukkan nama kelas" value="{{ $datakelas->name }}">
                @error('name')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <input type="text" name="description" placeholder="Masukkan deskripsi"
                    value="{{ $datakelas->description }}">
                @error('description')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="button-container">
                <button type="reset" class="reset-btn">Reset</button>
                <button type="submit" class="submit-btn">Simpan</button>
            </div>
        </form>
    </div>

@endsection
