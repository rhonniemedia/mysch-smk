<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class DataFile extends Model
{
    use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'pelajar_id',
        'nama_file',
        'path_file',
        'kategori',
        'ekstensi',
    ];

    /**
     * Relasi ke DataPelajar (Satu file milik satu pelajar)
     */
    public function pelajar(): BelongsTo
    {
        return $this->belongsTo(DataPelajar::class, 'pelajar_id');
    }
}
