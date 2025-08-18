<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman tambah kelas</title>
</head>

<body>
    <h1>Halaman Tambah Kelas</h1>
    <b>Form Tambah Kelas</b>
    <br>
    <a href="/clas">Kembali</a>
    <br>
    <form action="/clas/update/{{ $datakelas->id }}" method="POST">
        @csrf
        <div>
            <label for="">Nama Kelas</label>
            <br>
            <input type="text" name="name" placeholder="Masukkan nama kelas" value="{{ $datakelas->name }}"><br>
            @error('name')
                <small><span style="color: red;">{{ $message }}</span></small>
            @enderror
        </div>
        <div>
            <label for="">deskripsi</label>
            <br>
            <input type="text" name="description" value="{{ $datakelas->description }}"><br>
            @error('description')
                <small><span style="color: red;">{{ $message }}</span></small>
            @enderror
        </div>
        <br>
        <button type="submit">Simpan</button>
        <button type="reset">Reset</button>
    </form>
</body>

</html>
