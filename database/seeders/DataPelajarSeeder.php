<?php

namespace Database\Seeders;

use App\Models\DataKonsKeahlian;
use App\Models\DataPelajar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DataPelajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID Konsentrasi Keahlian agar relasi tepat[cite: 7]
        $pplg = DataKonsKeahlian::where('kode_keahlian', 'TKJ')->first();
        $tkr = DataKonsKeahlian::where('kode_keahlian', 'TKR')->first();
        $dpib = DataKonsKeahlian::where('kode_keahlian', 'DPIB')->first();

        $pelajars = [
            [
                'nama' => 'Budi Santoso',
                'jenis_kelamin' => 'L',
                'kelas' => 'XII',
                'rombel' => 'TKJ 1',
                'keahlian_id' => $pplg->id,
                'nis' => '2223001',
                'nisn' => '0051234567',
                'tempat_lahir' => 'Curup',
                'tanggal_lahir' => '15052007',
                'nama_ayah' => 'Slamet Santoso',
            ],
            [
                'nama' => 'Siti Aminah',
                'jenis_kelamin' => 'P',
                'kelas' => 'XII',
                'rombel' => 'DPIB 2',
                'keahlian_id' => $dpib->id,
                'nis' => '2223045',
                'nisn' => '0069876543',
                'tempat_lahir' => 'Bengkulu',
                'tanggal_lahir' => '20102007',
                'nama_ayah' => 'Rahmat Hidayat',
            ],
            [
                'nama' => 'Farhan Saputra',
                'jenis_kelamin' => 'L',
                'kelas' => 'XI',
                'rombel' => 'TKR 1',
                'keahlian_id' => $tkr->id,
                'nis' => '2324112',
                'nisn' => '0075544332',
                'tempat_lahir' => 'Rejang Lebong',
                'tanggal_lahir' => '01012008',
                'nama_ayah' => 'Mulyadi',
            ],
        ];

        // Auto-generate index dan password sebelum insert
        $pelajars = array_map(function ($pelajar) {
            $pelajar['nis_index']  = hash('sha256', $pelajar['nis']);
            $pelajar['nisn_index'] = hash('sha256', $pelajar['nisn']);
            $pelajar['password']   = Hash::make($pelajar['tanggal_lahir']);
            return $pelajar;
        }, $pelajars);

        foreach ($pelajars as $pelajar) {
            DataPelajar::create($pelajar);
        }
    }
}
