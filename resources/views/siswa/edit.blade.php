<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa Dinamis</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-900 text-gray-200 min-h-screen flex items-center justify-center py-12 px-4">
    <div class="max-w-xl w-full bg-gray-800 rounded-2xl shadow-xl p-8 space-y-8" x-data="{
        photoPreview: '{{ asset('storage/' . $datauser->photo) }}',
        formChanged: false,
        updatePhotoPreview(event) {
            const reader = new FileReader();
            reader.onload = (e) => {
                this.photoPreview = e.target.result;
            };
            reader.readAsDataURL(event.target.files[0]);
            this.formChanged = true;
        },
        checkFormChanged() {
            const form = document.getElementById('edit-form');
            const formData = new FormData(form);
            const originalData = {
                name: '{{ $datauser->name }}',
                nisn: '{{ $datauser->nisn }}',
                alamat: '{{ $datauser->alamat }}',
                email: '{{ $datauser->email }}',
                no_handphone: '{{ $datauser->no_handphone }}',
                kelas_id: '{{ $datauser->clas_id }}'
            };
    
            let changed = false;
            for (let key in originalData) {
                if (formData.get(key) !== originalData[key]) {
                    changed = true;
                    break;
                }
            }
    
            if (formData.get('password') && formData.get('password').length > 0) {
                changed = true;
            }
    
            this.formChanged = changed;
        }
    }"
        x-init="checkFormChanged()">

        <div class="text-center" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <h1 class="text-3xl font-bold text-white">Perbarui Data Siswa</h1>
            <p class="mt-2 text-sm text-gray-400">Silakan ubah informasi yang diperlukan di bawah.</p>
        </div>

        <a href="/"
            class="text-indigo-400 hover:text-indigo-300 font-semibold flex items-center transition-colors duration-200"
            x-transition:enter="ease-out duration-300 delay-100" x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>

        <form id="edit-form" action="/siswa/update/{{ $datauser->id }}" method="POST" enctype="multipart/form-data"
            class="space-y-6" @input="checkFormChanged()">
            @csrf

            <div class="flex flex-col items-center justify-center space-y-4"
                x-transition:enter="ease-out duration-300 delay-200" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100">
                <div class="relative w-36 h-36 rounded-full border-4 border-indigo-500 shadow-lg">
                    <img :src="photoPreview" alt="Photo Siswa" class="w-full h-full object-cover rounded-full">
                </div>
                <div class="relative">
                    <input type="file" name="foto" id="foto"
                        class="absolute inset-0 opacity-0 cursor-pointer" @change="updatePhotoPreview">
                    <label for="foto"
                        class="py-2 px-4 bg-indigo-500 text-white rounded-full font-medium cursor-pointer hover:bg-indigo-600 transition-colors duration-200">
                        Ganti Foto
                    </label>
                </div>
                @error('foto')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-4" x-transition:enter="ease-out duration-300 delay-300"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-400">Nama Lengkap</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $datauser->name) }}"
                        class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg shadow-sm placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                    @error('name')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="kelas_id" class="block text-sm font-medium text-gray-400">Kelas</label>
                    <select name="kelas_id" id="kelas_id"
                        class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                        @foreach ($clases as $clas)
                            <option {{ $clas->id == $datauser->clas_id ? 'selected' : '' }}
                                value="{{ $clas->id }}">
                                {{ $clas->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('kelas_id')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="nisn" class="block text-sm font-medium text-gray-400">NISN</label>
                    <input type="text" name="nisn" id="nisn" value="{{ old('nisn', $datauser->nisn) }}"
                        class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg shadow-sm placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                    @error('nisn')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-400">Alamat</label>
                    <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $datauser->alamat) }}"
                        class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg shadow-sm placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                    @error('alamat')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-400">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $datauser->email) }}"
                        class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg shadow-sm placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                    @error('email')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="no_handphone" class="block text-sm font-medium text-gray-400">No. Handphone</label>
                    <input type="tel" name="no_handphone" id="no_handphone"
                        value="{{ old('no_handphone', $datauser->no_handphone) }}"
                        class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg shadow-sm placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                    @error('no_handphone')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-400">Password</label>
                    <input type="password" name="password" id="password"
                        placeholder="Kosongkan jika tidak ingin mengubah"
                        class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg shadow-sm placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                    <p class="mt-1 text-xs text-gray-500">Hanya isi jika Anda ingin mengganti password.</p>
                    @error('password')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-6" x-transition:enter="ease-out duration-300 delay-400"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <button type="reset"
                    class="py-2 px-4 rounded-lg font-medium text-gray-300 bg-gray-700 hover:bg-gray-600 transition-colors duration-200">
                    Batal
                </button>
                <button type="submit" :disabled="!formChanged"
                    class="py-2 px-4 rounded-lg font-medium transition-all duration-300"
                    :class="formChanged ? 'bg-indigo-600 hover:bg-indigo-700 text-white' :
                        'bg-gray-500 text-gray-400 cursor-not-allowed'">
                    <span x-show="formChanged">Simpan Perubahan</span>
                    <span x-show="!formChanged">Tidak ada perubahan</span>
                </button>
            </div>
        </form>
    </div>
</body>

</html>
