<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\DataPengumuman;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DataPengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Pengumuman Hasil Kelulusan TP 2025/2026',
                'slug' => Str::slug('Pengumuman Hasil Kelulusan TP 2025/2026'),
                'kategori' => 'Kelulusan',
                'template_blade' => 'pages.announcement.templates.kelulusan',
                'jadwal_tayang' => '2026-05-04 16:30:00',
                'konten_dinamis' => [
                    'icon' => 'award',
                    'no_sk' => 'B/400.3.11.1/32/SMKN1RL/2026',
                    'predikat' => 'Sangat Memuaskan',
                    'pesan' => 'dari satuan pendidikan berdasarkan Surat Keputusan (SK) Kepala SMK Negeri 1 
                                Rejang Lebong Nomor: 421.5/068/O/SMKN1/2026, Tanggal 12 Februari 2026 tentang Kriteria Kenaikan Kelas dan Kelulusan Peserta Didik Kelas XII SMK Negeri 1 Rejang Lebong Tahun Ajaran 2025/2026.',
                    'tgl_yudisium' => '20 Juni 2026',
                    'lokasi' => 'Aula SMKN 1 RL',
                    'countdown_label' => 'Countdown Yudisium',
                    'hari_lagi' => '49 Hari Lagi',
                    'deskripsi' => 'Pengumuman Kelulusan Peserta Didik Tahun Ajaran 2025/2026'
                ],
            ],
            [
                'judul' => 'Surat Keterangan Lulus (SKL) Dapat Diunduh Mulai Hari Ini',
                'slug' => Str::slug('Surat Keterangan Lulus (SKL) Dapat Diunduh Mulai Hari Ini'),
                'kategori' => 'Dokumen',
                'template_blade' => 'pages.announcement.templates.skl',
                'jadwal_tayang' => '2026-05-04 16:30:00',
                'konten_dinamis' => [
                    'icon' => 'file-badge',
                    'berlaku_hingga' => 'Terbit Ijazah',
                    'deskripsi' => 'Surat Keterangan Lulus (SKL) dapat digunakan sebagai pengganti ijazah sementara untuk keperluan pendaftaran perguruan tinggi atau melamar pekerjaan.'
                ],
            ],
            [
                'judul' => 'Wajib Isi Tracer Study',
                'slug' => Str::slug('Wajib Isi Tracer Study'),
                'kategori' => 'Tracer Study',
                'template_blade' => 'pages.announcement.templates.tracer_info',
                'jadwal_tayang' => '2026-04-20 07:00:00', // Sesuai contoh[cite: 1]
                'konten_dinamis' => [
                    'icon' => 'clipboard-list',
                    'deadline' => '30 Juni 2026',
                    'partisipasi' => '68%',
                    'deskripsi' => 'Seluruh peserta didik yang dinyatakan LULUS diwajibkan mengisi formulir tracer study agar dapat mendownload Surat Keterangan Lulus (SKL).'
                ],
            ],
        ];

        foreach ($data as $item) {
            DataPengumuman::create($item);
        }
    }
}
