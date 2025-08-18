<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SiswaController;

//Route siswa
Route::get('/', [SiswaController::class, 'index']);

Route::get('/siswa/create', [SiswaController::class, 'create']);

Route::post('/siswa/store', [SiswaController::class, 'store']);

Route::get('/siswa/delete/{id}', [SiswaController::class, 'destroy']);

Route::get('/siswa/show/{id}', [SiswaController::class, 'show']);

Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);

Route::post('/siswa/update/{id}', [SiswaController::class, 'update']);


//Route kelas
Route::get('/clas', [ClassController::class, 'index']);
Route::get('/clas/create', [ClassController::class, 'create']);
Route::post('/clas/store', [ClassController::class, 'store']);
Route::get('/clas/delete/{id}', [ClassController::class, 'destroy']);
Route::get('/clas/show/{id}', [ClassController::class, 'show']);
Route::get('/clas/edit/{id}', [ClassController::class, 'edit']);
Route::post('/clas/update/{id}', [ClassController::class, 'update']);
