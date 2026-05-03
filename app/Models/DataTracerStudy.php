<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class DataTracerStudy extends Model
{
    use HasUuids; // Mengaktifkan fitur UUID otomatis[cite: 1]

    protected $fillable = [
        'data_pelajar_id',
        'no_hp',
        'status_pasca_lulus',
        'instansi',
        'kesan_sekolah',
    ];

    protected $casts = [
        'no_hp' => 'encrypted', // Enkripsi nomor HP[cite: 1]
    ];

    /**
     * Relasi ke DataPelajar[cite: 1]
     */
    public function pelajar()
    {
        return $this->belongsTo(DataPelajar::class, 'data_pelajar_id');
    }
}
