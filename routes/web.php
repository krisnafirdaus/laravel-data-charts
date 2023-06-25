<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\NilaiController;

Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswas.index');
Route::get('/create', [MahasiswaController::class, 'create'])->name('mahasiswas.create');
Route::post('/', [MahasiswaController::class, 'store'])->name('mahasiswas.store');

