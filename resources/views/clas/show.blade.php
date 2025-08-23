@extends('layouts.app')
@section('title', 'Halaman Detail Kelas')

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('assetes/css/show.css') }}">
    <style>
        body {
            background-color: rgb(94, 201, 183);
        }
    </style>


    <h1>Halaman Detail Kelas</h1>

    <div class="detail-card">
        <div>
            <h3>Nama Kelas: <span>{{ $datakelas->name }}</span></h3>
            <h3>Deskripsi: <span>{{ $datakelas->description }}</span></h3>
        </div>

        <a href="/clas" class="btn-back">Kembali</a>
    </div>
@endsection
