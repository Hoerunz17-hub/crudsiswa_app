@extends('layouts.app')
@section('title', 'Halaman edit Siswa')
@section('css')
    <link rel="stylesheet" href="{{ asset('assetes/css/edit.css') }}">
@endsection
@section('content')

    <div class="edit-container">
        <h1>Halaman edit Siswa</h1>
        <span class="form-title">Formulir untuk memperbarui data siswa.</span>

        <a href="/" class="back-link">← Kembali</a>

        <div class="profile-photo-container">
            <img src="{{ asset('storage/' . $datauser->photo) }}" alt="Photo Siswa" class="profile-photo">
        </div>

        <form action="/siswa/update/{{ $datauser->id }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label for="kelas_id">Kelas</label>
                    <select name="kelas_id">
                        @foreach ($clases as $clas)
                            <option {{ $clas->id == $datauser->clas_id ? 'selected' : '' }} value="{{ $clas->id }}">
                                {{ $clas->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('kelas_id')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" value="{{ $datauser->name }}" placeholder="Masukkan nama siswa">
                    @error('name')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nisn">Nisn</label>
                    <input type="text" name="nisn" value="{{ $datauser->nisn }}" placeholder="Masukkan NISN">
                    @error('nisn')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_handphone">No Handphone</label>
                    <input type="tel" name="no_handphone" value="{{ $datauser->no_handphone }}"
                        placeholder="Masukkan no handphone">
                    @error('no_handphone')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group full-width">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" value="{{ $datauser->alamat }}"
                        placeholder="Masukkan Alamat siswa">
                    @error('alamat')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{ $datauser->email }}" placeholder="Masukkan Email">
                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Masukkan Password">
                    <small class="hint">Tinggalkan kosong jika tidak ingin mengubah password.</small>
                    @error('password')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group full-width">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" placeholder="Masukkan Photo">
                    @error('foto')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="button-container">
                <button type="reset" class="reset-btn">Reset</button>
                <button type="submit" class="submit-btn">Simpan</button>
            </div>
        </form>
    </div>

@endsection
