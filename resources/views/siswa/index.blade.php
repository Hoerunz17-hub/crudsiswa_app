<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama Siswa</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Inter Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }

        .modal {
            transition: opacity 0.2s ease-in-out;
        }

        .modal.hidden {
            opacity: 0;
            pointer-events: none;
        }
    </style>
</head>

<body class="bg-gray-100 p-8">

    <!-- Main Container -->
    <div class="container mx-auto max-w-7xl">

        <!-- Header -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Halaman Utama Siswa</h1>
            <h3 class="text-xl md:text-2xl text-gray-600">Daftar Siswa</h3>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-start space-y-4 sm:space-y-0 sm:space-x-4 mb-6">
            <a href="/siswa/create"
                class="bg-blue-600 text-white font-medium py-3 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300 transform hover:scale-105 text-center">
                Tambah Siswa
            </a>
            <a href="/clas"
                class="bg-gray-700 text-white font-medium py-3 px-6 rounded-lg shadow-md hover:bg-gray-800 transition duration-300 transform hover:scale-105 text-center">
                Menu Kelas
            </a>
        </div>

        <!-- Table Container -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Kelas</th>
                            <th scope="col" class="px-6 py-3">NISN</th>
                            <th scope="col" class="px-6 py-3">Alamat</th>
                            <th scope="col" class="px-6 py-3">Foto</th>
                            <th scope="col" class="px-6 py-3 text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($siswas->isEmpty())
                            <tr class="bg-white border-b">
                                <td colspan="7" class="px-6 py-4 text-center text-red-500 font-semibold">
                                    Tidak ada data siswa
                                </td>
                            </tr>
                        @else
                            @foreach ($siswas as $siswa)
                                <tr class="bg-white border-b hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $siswa->id }}</td>
                                    <td class="px-6 py-4">{{ $siswa->name }}</td>
                                    <td class="px-6 py-4">{{ $siswa->Clas->name }}</td>
                                    <td class="px-6 py-4">{{ $siswa->nisn }}</td>
                                    <td class="px-6 py-4">{{ $siswa->alamat }}</td>
                                    <td class="px-6 py-4">
                                        <img src="{{ asset('storage/' . $siswa->photo) }}" alt="Photo Siswa"
                                            class="w-16 h-16 object-cover rounded-md shadow-sm">
                                    </td>
                                    <td class="px-6 py-4 text-center space-y-2 sm:space-y-0 sm:space-x-2">
                                        <button type="button"
                                            class="delete-btn text-red-600 hover:text-red-900 font-medium px-2"
                                            data-url="/siswa/delete/{{ $siswa->id }}">HAPUS</button>
                                        <a href="/siswa/edit/{{ $siswa->id }}"
                                            class="text-blue-600 hover:text-blue-900 font-medium px-2">UBAH</a>
                                        <a href="/siswa/show/{{ $siswa->id }}"
                                            class="text-indigo-600 hover:text-indigo-900 font-medium px-2">DETAIL</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Confirmation Modal -->
        <div id="delete-modal"
            class="modal fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center p-4 hidden">
            <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-sm">
                <div class="text-center">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Konfirmasi Penghapusan</h3>
                    <p class="text-sm text-gray-500 mb-6">Apakah Anda yakin ingin menghapus data siswa ini? Tindakan ini
                        tidak dapat dibatalkan.</p>
                </div>
                <div class="flex justify-center space-x-4">
                    <button id="cancel-btn" type="button"
                        class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none">
                        Batal
                    </button>
                    <a id="confirm-delete-btn" href="#"
                        class="py-2 px-4 bg-red-600 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-red-700 focus:outline-none">
                        Ya, Hapus
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            const deleteModal = document.getElementById('delete-modal');
            const confirmDeleteBtn = document.getElementById('confirm-delete-btn');
            const cancelBtn = document.getElementById('cancel-btn');

            let deleteUrl = '';

            // Listen for clicks on all delete buttons
            deleteButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    deleteUrl = e.target.getAttribute('data-url');
                    confirmDeleteBtn.href = deleteUrl;
                    deleteModal.classList.remove('hidden');
                });
            });

            // Listen for clicks on the cancel button
            cancelBtn.addEventListener('click', () => {
                deleteModal.classList.add('hidden');
            });

            // Listen for clicks outside the modal to close it
            deleteModal.addEventListener('click', (e) => {
                if (e.target === deleteModal) {
                    deleteModal.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>
