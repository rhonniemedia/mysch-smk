<?php

namespace Database\Seeders;

use App\Models\DataKonsKeahlian;
use App\Models\DataProgKeahlian;
use Illuminate\Database\Seeder;

class DataKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pemetaan data berdasarkan input Anda
        $jurusan = [
            [
                'prog' => 'Desain Pemodelan dan Informasi Bangunan',
                'kons' => [
                    ['nama' => 'Desain Pemodelan dan Informasi Bangunan', 'kode' => 'DPIB', 'alias' => '01']
                ]
            ],
            [
                'prog' => 'Teknik Konstruksi dan Properti',
                'kons' => [
                    ['nama' => 'Teknik Konstruksi dan Perumahan', 'kode' => 'TKP', 'alias' => '10'],
                ]
            ],
            [
                'prog' => 'Teknik Elektronika',
                'kons' => [
                    ['nama' => 'Teknik Elektronika Industri', 'kode' => 'TEI', 'alias' => '02'],
                ]
            ],
            [
                'prog' => 'Teknik Ketenagalistrikan',
                'kons' => [
                    ['nama' => 'Teknik Instalasi Tenaga Listrik', 'kode' => 'TITL', 'alias' => '05'],
                    ['nama' => 'Teknik Pembangkit Tenaga Listrik', 'kode' => 'TPTL', 'alias' => '04'],
                ]
            ],
            [
                'prog' => 'Teknik Mesin',
                'kons' => [
                    ['nama' => 'Teknik Pemesinan', 'kode' => 'TM', 'alias' => '06'],
                ]
            ],
            [
                'prog' => 'Teknik Pengelasan dan Fabrikasi Logam',
                'kons' => [
                    ['nama' => 'Teknik Pengelasan', 'kode' => 'TL', 'alias' => '07'],
                ]
            ],
            [
                'prog' => 'Teknik Otomotif',
                'kons' => [
                    ['nama' => 'Teknik Kendaraan Ringan', 'kode' => 'TKR', 'alias' => '08'],
                    ['nama' => 'Teknik Sepeda Motor', 'kode' => 'TSM', 'alias' => '09'],
                ]
            ],
            [
                'prog' => 'Teknik Jaringan Komputer dan Telekomunikasi',
                'kons' => [
                    ['nama' => 'Teknik Komputer dan Jaringan', 'kode' => 'TKJ', 'alias' => '03'],
                ]
            ],
        ];

        foreach ($jurusan as $data) {
            // 1. Buat Program Keahlian (Otomatis generate UUID via HasUuids)[cite: 5]
            $prog = DataProgKeahlian::create([
                'prog_keahlian' => $data['prog']
            ]);

            // 2. Buat Konsentrasi Keahlian yang terhubung ke Program tersebut[cite: 4]
            foreach ($data['kons'] as $kons) {
                DataKonsKeahlian::create([
                    'keahlian' => $kons['nama'],
                    'kode_keahlian' => $kons['kode'],
                    'alias_keahlian' => $kons['alias'],
                    'prog_keahlian_id' => $prog->id // Foreign key menggunakan UUID induk[cite: 4]
                ]);
            }
        }
    }
}
