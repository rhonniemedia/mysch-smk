<?php

namespace App\Imports;

use App\Models\DataKonsKeahlian;
use App\Models\DataPelajar;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class DataPelajarImport implements ToCollection, WithHeadingRow, SkipsEmptyRows
{
    public array $errors = [];
    public int $successCount = 0;

    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            $rowNum = $index + 2;

            // Cast semua nilai ke string untuk menghindari error validasi
            $data = collect($row)->map(function ($value) {
                return is_null($value) ? null : (string) $value;
            })->toArray();

            // Validasi menggunakan $data (bukan $row)
            $validator = validator($data, [
                'nama'           => 'required|string',
                'jenis_kelamin'  => 'required|in:L,P',
                'kelas'          => 'required|string',
                'rombel'         => 'required|string',
                'kode_keahlian'  => 'required|string',
                'nis'            => 'required|string',
                'nisn'           => 'required|string',
                'tempat_lahir'   => 'required|string',
                'tanggal_lahir'  => 'required|string',
                'nama_ayah'      => 'nullable|string',
            ], [
                'nama.required'          => 'Nama wajib diisi.',
                'nama.string'            => 'Nama harus berupa teks.',
                'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
                'jenis_kelamin.in'       => 'Jenis kelamin harus L atau P.',
                'kelas.required'         => 'Kelas wajib diisi.',
                'kelas.string'           => 'Kelas harus berupa teks.',
                'rombel.required'        => 'Rombel wajib diisi.',
                'rombel.string'          => 'Rombel harus berupa teks.',
                'kode_keahlian.required' => 'Kode keahlian wajib diisi.',
                'kode_keahlian.string'   => 'Kode keahlian harus berupa teks.',
                'nis.required'           => 'NIS wajib diisi.',
                'nis.string'             => 'NIS harus berupa teks.',
                'nisn.required'          => 'NISN wajib diisi.',
                'nisn.string'            => 'NISN harus berupa teks.',
                'tempat_lahir.required'  => 'Tempat lahir wajib diisi.',
                'tempat_lahir.string'    => 'Tempat lahir harus berupa teks.',
                'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
                'tanggal_lahir.string'   => 'Tanggal lahir harus berupa teks.',
            ]);

            if ($validator->fails()) {
                $this->errors[] = [
                    'baris' => $rowNum,
                    'nama'  => $data['nama'] ?? '-',   // ← $data
                    'pesan' => implode(', ', $validator->errors()->all()),
                ];
                continue;
            }

            // Cari keahlian_id menggunakan $data
            $keahlian = DataKonsKeahlian::where('kode_keahlian', strtoupper(trim($data['kode_keahlian'])))->first();

            if (!$keahlian) {
                $this->errors[] = [
                    'baris' => $rowNum,
                    'nama'  => $data['nama'],
                    'pesan' => "Kode keahlian '{$data['kode_keahlian']}' tidak ditemukan.",
                ];
                continue;
            }

            // Cek duplikat via blind index menggunakan $data
            $nisIndex  = hash('sha256', trim($data['nis']));
            $nisnIndex = hash('sha256', trim($data['nisn']));

            $duplikat = DataPelajar::where('nis_index', $nisIndex)
                ->orWhere('nisn_index', $nisnIndex)
                ->first();

            if ($duplikat) {
                $this->errors[] = [
                    'baris' => $rowNum,
                    'nama'  => $data['nama'],
                    'pesan' => "NIS atau NISN sudah terdaftar (duplikat).",
                ];
                continue;
            }

            // Create menggunakan $data
            DataPelajar::create([
                'nama'          => trim($data['nama']),
                'jenis_kelamin' => strtoupper(trim($data['jenis_kelamin'])),
                'kelas'         => trim($data['kelas']),
                'rombel'        => trim($data['rombel']),
                'keahlian_id'   => $keahlian->id,
                'nis'           => trim($data['nis']),
                'nisn'          => trim($data['nisn']),
                'tempat_lahir'  => trim($data['tempat_lahir']),
                'tanggal_lahir' => trim($data['tanggal_lahir']),
                'nama_ayah'     => trim($data['nama_ayah'] ?? ''),
            ]);

            $this->successCount++;
        }
    }
}
