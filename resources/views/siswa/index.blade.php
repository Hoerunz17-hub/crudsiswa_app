@extends('layouts.app')
@section('title', 'Halaman Utama Siswa')

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('assetes/css/index.css') }}">

    <h1 class="animated-element" style="animation-delay: 0.1s;">Halaman Utama Siswa</h1>
    <h3 class="animated-element" style="animation-delay: 0.2s;">Daftar Siswa</h3>
    <hr class="animated-element" style="animation-delay: 0.3s;">
    <a href="/siswa/create" class="add-button animated-element" style="animation-delay: 0.4s;">Tambah siswa</a>

    <div class="table-wrapper animated-element" style="animation-delay: 0.5s;">
        <table class="modern-table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>KELAS</th>
                    <th>NISN</th>
                    <th>ALAMAT</th>
                    <th>PHOTO</th>
                    <th>OPTION</th>
                </tr>
            </thead>
            <tbody>
                @if ($siswas->isEmpty())
                    <tr>
                        <td colspan="7" class="no-data">
                            Tidak ada data siswa
                        </td>
                    </tr>
                @endif
                @foreach ($siswas as $siswa)
                    <tr class="animated-element" style="animation-delay: {{ 0.6 + $loop->index * 0.1 }}s;">
                        <td>{{ $siswa->id }}</td>
                        <td>{{ $siswa->name }}</td>
                        <td>{{ $siswa->Clas->name }}</td>
                        <td>{{ $siswa->nisn }}</td>
                        <td>{{ $siswa->alamat }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $siswa->photo) }}" alt="Photo Siswa" class="student-photo">
                        </td>
                        <td class="options-links">
                            <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                href="/siswa/delete/{{ $siswa->id }}" class="delete">DELETE</a>
                            <a href="/siswa/edit/{{ $siswa->id }}">EDIT</a>
                            <a href="/siswa/show/{{ $siswa->id }}">DETAIL</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
