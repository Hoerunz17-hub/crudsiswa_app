<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    <style>
        /* Menggunakan @import untuk memuat file CSS eksternal, jika diperlukan */
        /* @import url('path/ke/file-eksternal.css'); */

        .navigation-container {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            width: 100% !important;
            margin-top: 40px !important;
        }

        .nav-link {
            display: inline-block !important;
            padding: 14px 28px !important;
            margin: 15px !important;
            border-radius: 50px !important;
            color: white !important;
            text-decoration: none !important;
            font-size: 17px !important;
            font-weight: bold !important;
            text-align: center !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
        }

        .nav-link.siswa {
            background-color: #4682b4 !important;
        }

        .nav-link.kelas {
            background-color: #ff6347 !important;
        }

        /* Efek hover menggunakan class */
        .nav-link:hover {
            transform: translateY(-6px) !important;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2) !important;
        }

        .nav-link.siswa:hover {
            background-color: #3b6b94 !important;
        }

        .nav-link.kelas:hover {
            background-color: #e5533d !important;
        }

        /* Menghilangkan onmouseover dan onmouseout karena sudah ditangani oleh :hover */
    </style>
</head>

<body>
    <div class="navigation-container">
        <a href="/" class="nav-link siswa">
            Halaman Utama Siswa
        </a>
        <a href="/clas" class="nav-link kelas">
            Halaman Utama Kelas
        </a>
    </div>

    <hr />
    @yield('content')
    @yield('css')
</body>

</html>
