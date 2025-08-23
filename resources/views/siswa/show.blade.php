@extends('layouts.app')
@section('title', 'Halaman Detail Siswa')
@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('assetes/css/style.css') }}">
    <style>
        body {
            background-color: aquamarine;
        }
    </style>
@endsection

<h1>Halaman Detail Siswa</h1>

<div class="card">
    {{-- Foto Profil --}}
    <img src="{{ asset('storage/' . $datauser->photo) }}" alt="Foto Siswa">

    <div class="info">
        <h3>Nama Siswa: {{ $datauser->name }}</h3>
        <h3>NISN Siswa: {{ $datauser->nisn }}</h3>
        <h3>Kelas Siswa: {{ $datauser->Clas->name }}</h3>
        <h3>Email Siswa: {{ $datauser->email }}</h3>
        <h3>Alamat Siswa: {{ $datauser->alamat }}</h3>
        <h3>No Handphone Siswa: {{ $datauser->no_handphone }}</h3>
    </div>

    <a href="/" class="btn-back">Kembali</a>
</div>
@endsection
