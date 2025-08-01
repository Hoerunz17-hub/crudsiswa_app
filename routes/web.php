<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return view('siswa.index');
});

Route::get('/siswa/create', function () {
    return view('siswa.create');
});

Route::post('/siswa/store', [SiswaController::class, 'store']);

