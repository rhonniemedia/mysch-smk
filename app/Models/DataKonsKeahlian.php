<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DataKonsKeahlian extends Model
{
    use HasUuids;

    protected $table = 'data_kons_keahlians';

    protected $fillable = [
        'keahlian',
        'kode_keahlian',
        'alias_keahlian',
        'prog_keahlian_id',
    ];

    /**
     * Relasi: Konsentrasi Keahlian dimiliki oleh satu Program Keahlian[cite: 4]
     */
    public function progKeahlian(): BelongsTo
    {
        return $this->belongsTo(DataProgKeahlian::class, 'prog_keahlian_id');
    }

    /**
     * Relasi: Konsentrasi Keahlian memiliki banyak Data Pelajar
     */
    public function pelajar(): HasMany
    {
        return $this->hasMany(DataPelajar::class, 'keahlian_id');
    }
}
