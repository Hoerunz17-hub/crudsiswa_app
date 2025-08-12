<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>halaman edit siswa</title>
</head>

<body>
    <h1>Halaman edit Siswa</h1>
    <b>Form edit Siswa</b>
    <br>
    <hr>
    <a href="/">Kembali</a><br>
    <br>
    <img src="{{ asset('storage/' . $datauser->photo) }}" alt="Photo Siswa" width="150"><br>
    <form action="/siswa/update/{{ $datauser->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Kelas</label>
            <br>
            <select name="kelas_id">

                @foreach ($clases as $clas)
                    <option {{ $clas->id == $datauser->clas_id ? 'selected' : '' }} value="{{ $clas->id }}">
                        {{ $clas->name }}</option>
                @endforeach

            </select><br>
            @error('kelas_id')
                <small><span style="color: red;">{{ $message }}</span></small>
            @enderror
        </div>
        <br>

        <div>
            <label for="">Nama</label>
            <br>

            <input type="text" name="name" value="{{ $datauser->name }}" placeholder="Masukkan nama siswa"><br>
            @error('name')
                <small><span style="color: red;">{{ $message }}</span></small>
            @enderror

        </div>
        <br>

        <div>
            <label for="">Nisn</label>
            <br>
            <input type="text" name="nisn" value="{{ $datauser->nisn }}" placeholder="Masukkan NISN"><br>
            @error('nisn')
                <small><span style="color: red;">{{ $message }}</span></small>
            @enderror
        </div>
        <br>

        <div>
            <label for="">Alamat</label>
            <br>
            <input type="text" name="alamat" value="{{ $datauser->alamat }}"
                placeholder="Masukkan Alamat siswa"><br>
            @error('alamat')
                <small><span style="color: red;">{{ $message }}</span></small>
            @enderror

        </div>
        <br>

        <div>
            <label for="">Email</label>
            <br>
            <input type="text" name="email" value="{{ $datauser->email }}" placeholder="Masukkan Email"><br>
            @error('email')
                <small><span style="color: red;">{{ $message }}</span></small>
            @enderror
        </div>
        <br>

        <div>
            <label for="">Password</label>
            <br>
            <input type="password" name="password" placeholder="Masukkan Password"><br>
            <small><span style="color: red;">tambahkan password jika ingin mengubah password</span></small><br>
            @error('password')
                <small><span style="color: red;">{{ $message }}</span></small>
            @enderror
        </div>
        <br>

        <div>
            <label for="">No Handphone</label>
            <br>
            <input type="tel" name="no_handphone" value="{{ $datauser->no_handphone }}"
                placeholder="Masukkan no handphone"><br>
            @error('no_handphone')
                <small><span style="color: red;">{{ $message }}</span></small>
            @enderror
        </div>
        <br>

        <div>
            <label for="">Foto</label>
            <br>
            <input type="file" name="foto" placeholder="Masukkan Photo">
            @error('foto')
                <small><span style="color: red;">{{ $message }}</span></small>
            @enderror
        </div>
        <br>

        <button type="submit">Simpan</button>
        <button type="reset">Reset</button>
    </form>

</body>

</html>
