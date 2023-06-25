<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nama', 'quis', 'tugas', 'absensi', 'praktek', 'uas'];

    public function getGradeAttribute()
    {
        $total = $this->quis + $this->tugas + $this->absensi + $this->praktek + $this->uas;
        $average = $total / 5;

        if ($average <= 65) {
            return 'D';
        } elseif ($average <= 75) {
            return 'C';
        } elseif ($average <= 85) {
            return 'B';
        } else {
            return 'A';
        }
    }

    public static function gradeCounts() {
        $counts = [
            'A' => 0,
            'B' => 0,
            'C' => 0,
            'D' => 0
        ];
    
        $mahasiswas = self::all();
        foreach ($mahasiswas as $mahasiswa) {
            $counts[$mahasiswa->grade]++;
        }
    
        return $counts;
    }
    
}
