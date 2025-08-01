<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //untuk store data siswa
    public function store(Request $request){
        //validasi data
        $request->validate([
            'name'          => 'required',
            'kelas_id'      => 'required',
            'nisn'          => 'required',
            'alamat'        => 'required',
            'email'         => 'required',
            'password'      => 'required',
            'no_handphone'  => 'required',
        ]);



        //siapkan data yang akan dimasukkan
        $datasiswa_store = [
            'clas_id'       =>$request->kelas_id,
            'name'          =>$request->name,
            'photo'         =>'foto.jpg',
            'nisn'          =>$request->nisn,
            'alamat'        =>$request->alamat,
            'email'         =>$request->email,
            'password'      =>$request->password,
            'no_handphone'  =>$request->no_handphone
        ];

        // masukan data ke dalama tabel user
        User::create($datasiswa_store);

        // arahkan user ke halaman beranda
        return redirect('/')->with('success', 'Data siswa berhasil disimpan');
    }
}
