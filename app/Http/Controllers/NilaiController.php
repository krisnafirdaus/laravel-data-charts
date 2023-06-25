<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mahasiswa;

class NilaiController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('nilai')->get();
        $grades = [];

        foreach ($mahasiswas as $mahasiswa) {
            $total = $mahasiswa->nilai->quis + $mahasiswa->nilai->tugas + $mahasiswa->nilai->absensi + $mahasiswa->nilai->praktek + $mahasiswa->nilai->uas;
            $average = $total / 5;

            if ($average <= 65) {
                $grade = 'D';
            } elseif ($average <= 75) {
                $grade = 'C';
            } elseif ($average <= 85) {
                $grade = 'B';
            } else {
                $grade = 'A';
            }

            $grades[] = $grade;
        }

        // Menghitung jumlah setiap grade
        $gradeCounts = array_count_values($grades);

        return view('nilai.index', compact('mahasiswas', 'gradeCounts'));
    }

    public function chart()
    {
        $mahasiswas = Mahasiswa::all();
        $grades = [];

        foreach ($mahasiswas as $mahasiswa) {
            if (!isset($mahasiswa->quis, $mahasiswa->tugas, $mahasiswa->absensi, $mahasiswa->praktek, $mahasiswa->uas)) {
                continue; // skip to the next iteration if any attribute is missing
            }
            
            $total = $mahasiswa->quis + $mahasiswa->tugas + $mahasiswa->absensi + $mahasiswa->praktek + $mahasiswa->uas;
            $average = $total / 5;

            if ($average <= 65) {
                $grade = 'D';
            } elseif ($average <= 75) {
                $grade = 'C';
            } elseif ($average <= 85) {
                $grade = 'B';
            } else {
                $grade = 'A';
            }

            $grades[] = $grade;
        }

        // Menghitung jumlah setiap grade
        $gradeCounts = array_count_values($grades);

        $gradeLabels = array_keys($gradeCounts);
        $gradeData = array_values($gradeCounts);

        return view('nilai.chart', compact('gradeLabels', 'gradeData'));
    }
    
}
