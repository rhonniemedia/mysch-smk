<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DataProgKeahlian extends Model
{
    use HasUuids;

    protected $table = 'data_prog_keahlians';

    protected $fillable = [
        'prog_keahlian',
    ];

    /**
     * Relasi: Satu Program Keahlian memiliki banyak Konsentrasi Keahlian
     */
    public function konsKeahlian(): HasMany
    {
        return $this->hasMany(DataKonsKeahlian::class, 'prog_keahlian_id');
    }
}
