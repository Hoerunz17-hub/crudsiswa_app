<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Detail Kelas</title>

</head>

<body>

    <h1>Halaman Detail Kelas</h1>

    <div>


        <div>
            <h3>Nama Kelas: {{ $datakelas->name }}</h3>
            <h3>Deskripsi: {{ $datakelas->description }}</h3>

        </div>

        <a href="/clas" class="btn-back">Kembali</a>
    </div>

</body>

</html>
