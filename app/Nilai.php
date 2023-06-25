<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mahasiswa;

class Nilai extends Model
{
    protected $fillable = ['mahasiswa_id', 'quis', 'tugas', 'absensi', 'praktek', 'uas'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
