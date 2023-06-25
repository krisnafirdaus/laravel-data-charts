<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        $gradeCounts = Mahasiswa::gradeCounts();

        return view('nilai.index', ['mahasiswas' => $mahasiswas, 'gradeCounts' => $gradeCounts]);
    }

    public function create()
    {
        return view('nilai.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'quis' => 'required',
            'tugas' => 'required',
            'absensi' => 'required',
            'praktek' => 'required',
            'uas' => 'required',
        ]);

        Mahasiswa::create($validatedData);

        return redirect('/')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }
}
