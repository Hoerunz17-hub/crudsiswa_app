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
}
