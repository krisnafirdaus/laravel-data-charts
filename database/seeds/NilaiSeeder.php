<?php

use Illuminate\Database\Seeder;
use App\Nilai;

class NilaiSeeder extends Seeder
{
    public function run()
    {
        Nilai::create([
            'mahasiswa_id' => 1,
            'quis' => 1,
            'tugas' => 1,
            'absensi' => 1,
            'praktek' => 1,
            'uas' => 1,
        ]);
    }
}
