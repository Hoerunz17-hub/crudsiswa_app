<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman utama</title>
</head>

<body>
    <h1>Halaman Utama Kelas</h1>
    <h3>Daftar Kelas</h3>
    <hr>
    <a href="/clas/create">Tambah kelas</a> <a href="/">halaman utama</a>

    <table border="10" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA KELAS</th>
                <th>DESKRIPSI</th>
                <th>OPTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
                <tr>
                    <td>{{ $class->id }}</td>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->description }}</td>
                    <td>
                        <a href="/clas/delete/{{ $class->id }}">DELETE</a>
                        <a href="/clas/edit/{{ $class->id }}">EDIT</a>
                        <a href="/clas/show/{{ $class->id }}">DETAIL</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
