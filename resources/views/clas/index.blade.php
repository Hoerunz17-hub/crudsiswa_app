@extends('layouts.app')
@section('title', 'Halaman Utama Kelas')

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('assetes/css/clas.css') }}">

    <h1 class="animated-element" style="animation-delay: 0.1s;">Halaman Utama Kelas</h1>
    <h3 class="animated-element" style="animation-delay: 0.2s;">Daftar Kelas</h3>
    <hr class="animated-element" style="animation-delay: 0.3s;">
    <a href="/clas/create" class="add-button animated-element" style="animation-delay: 0.4s;">Tambah kelas</a>

    <div class="table-wrapper animated-element" style="animation-delay: 0.5s;">
        <table class="modern-table">
            <thead>
                <tr class="animated-element" style="animation-delay: 0.6s;">
                    <th>NO</th>
                    <th>NAMA KELAS</th>
                    <th>DESKRIPSI</th>
                    <th>OPTION</th>
                </tr>
            </thead>
            <tbody>
                @if ($classes->isEmpty())
                    <tr class="animated-element" style="animation-delay: 0.7s;">
                        <td colspan="4" class="no-data">
                            Tidak ada data kelas
                        </td>
                    </tr>
                @endif
                @foreach ($classes as $class)
                    <tr class="animated-element" style="animation-delay: {{ 0.7 + $loop->index * 0.1 }}s;">
                        <td>{{ $class->id }}</td>
                        <td>{{ $class->name }}</td>
                        <td>{{ $class->description }}</td>
                        <td class="options-links">
                            <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                href="/clas/delete/{{ $class->id }}" class="delete">DELETE</a>
                            <a href="/clas/edit/{{ $class->id }}">EDIT</a>
                            <a href="/clas/show/{{ $class->id }}">DETAIL</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
