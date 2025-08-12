<?php

namespace App\Http\Controllers;
use App\Models\Clas;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    //fungsi untuk mengarahkan ke halaman index
    public function index(){
        //siapkan data / pangiil data siswa

        $siswas = User::all();



         return view('siswa.index', compact('siswas'));
    }

    //fungsi untuk mengarahkan ke halaman create
    public function create(){

        //SIAPKAN DATA / PANGGIL DATA
        $clases = Clas::all();

        return view('siswa.create', compact('clases'));
    }



    //untuk store data siswa
    public function store(Request $request){
        //validasi data
        $request->validate([
            'name'          => 'required',
            'kelas_id'      => 'required',
            'nisn'          => 'required | unique:users,nisn',
            'alamat'        => 'required',
            'email'         => 'required | unique:users,email',
            'password'      => 'required',
            'no_handphone'  => 'required | unique:users,no_handphone',
            'foto'          => 'required | image | mimes:jpg,jpeg,png,gif',
        ]);



        //siapkan data yang akan dimasukkan
        $datasiswa_store = [
            'clas_id'       =>$request->kelas_id,
            'name'          =>$request->name,
            'nisn'          =>$request->nisn,
            'alamat'        =>$request->alamat,
            'email'         =>$request->email,
            'password'      =>$request->password,
            'no_handphone'  =>$request->no_handphone
        ];

        //upload gambar
        $datasiswa_store['photo'] = $request->file('foto')->store('profilesiswa', 'public');

        // masukan data ke dalama tabel user
        User::create($datasiswa_store);

        // arahkan user ke halaman beranda
        return redirect('/')->with('success', 'Data siswa berhasil disimpan');
    }


    //buat fungsi untik delete data siswa
    public function destroy($id){
        //cari data user didatabase berdasarkan id user ada atau tidak
            $datasiswa = User::find($id);



        //cek apakah data siswa ada atau tidak
        if($datasiswa != null){
            Storage::disk('public')->delete($datasiswa->photo);
            $datasiswa->delete();
        }

        //kembalikan user ke halaman home
        return redirect('/')->with('success', 'Data siswa berhasil dihapus');

    }

    //untuk menampilkan view detail siswa
    public function show($id){
        //cari table user didatabase berdasarkan id user
        $datauser = User::find($id);


        //cek apakah data siswa ada atau tidak
        if($datauser == null){
            return redirect('/')->with('error', 'Data siswa tidak ditemukan');
        }

        //kembalikan user ke halaman show dan kirimkan data user yang diambil berdasarkan id


        return view('siswa.show', compact('datauser'));
    }

    public function edit($id){
         //SIAPKAN DATA / PANGGIL DATA
        $clases = Clas::all();

        //amil data siswa berdasarkan id
        $datauser = User::find($id);

        if($datauser == null){
            return redirect('/')->with('error', 'Data siswa tidak ditemukan');
        }


        //kembalikan user ke halaman edit
        return view('siswa.edit', compact('clases','datauser'));


    }

    public function update(Request $request, $id){
        //validasi data
         $request->validate([
            'name'          => 'required',
            'nisn'          => 'required',
            'alamat'        => 'required',
            'email'         => 'required',
            'no_handphone'  => 'required',

        ]);

        //cari didalam table user apakah ada user yang akan diupdate berdasarkan id
        $datasiswa = User::find($id);




        //siapkan data yang disimpan sebagai update
         $datasiswa_update = [
            'clas_id'       =>$request->kelas_id,
            'name'          =>$request->name,
            'nisn'          =>$request->nisn,
            'alamat'        =>$request->alamat,
            'email'         =>$request->email,
            'no_handphone'  =>$request->no_handphone
        ];



        //cek apakah user merubah password atau tidak



        //cek apakah user merubah foto atau tidak



        //simpan data kedalam database dengan data yang terbaru sesuai upadate
        $datasiswa->update($datasiswa_update);



        //pindahkan user ke halaman index
        return redirect('/')->with('success', 'Data siswa berhasil diupdate');


    }
}
