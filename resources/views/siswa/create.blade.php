<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>halaman tambah siswa</title>
</head>
<body>
    <h1>Halaman Tambah Siswa</h1>
    <b>Form Tambah Siswa</b>
    <br>
    <hr>
    <a href="/">Kembali</a>
    <br>
    <form action="" method="POST">
       <div>
          <label for="">Kelas</label>
          <br>
          <select name="kelas_id">
            <option value="XII">XII PPLG-1</option>
            <option value="XII">XII PPLG-2</option>
            <option value="XII">XII PPLG-3</option>
          </select>
        </div>
        <br>

        <div>
          <label for="">Nama</label>
          <br>
          <input type="text" name="name" placeholder="Masukkan nama siswa">
        </div>
        <br>

        <div>
          <label for="">Nisn</label>
          <br>
          <input type="text" name="nisn" placeholder="Masukkan NISN">
        </div>
        <br>

        <div>
          <label for="">Alamat</label>
          <br>
          <input type="text" name="alamat" placeholder="Masukkan Alamat siswa">
        </div>
        <br>

        <div>
          <label for="">Email</label>
          <br>
          <input type="text" name="email" placeholder="Masukkan Email">
        </div>
        <br>

        <div>
          <label for="">Password</label>
          <br>
          <input type="password" name="password" placeholder="Masukkan Password">
        </div>
        <br>

        <div>
          <label for="">No Handphone</label>
          <br>
          <input type="number" name="no_handphone" placeholder="Masukkan no handphone">
        </div>
        <br>

        <div>
          <label for="">Foto</label>
          <br>
          <input type="file" name="foto" placeholder="Masukkan Photo">
        </div>
        <br>

        <button type="submit">Simpan</button>
        <button type="reset">Reset</button>
    </form>

</body>
</html>
