<?php

namespace App\Http\Controllers;
use App\Models\Clas;

use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //fungsi untuk mengarahkan ke halaman index
    public function index(){
         return view('siswa.index');
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
}
