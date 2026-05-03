<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class DataPengumuman extends Model
{
    use HasUuids;

    protected $table = 'data_pengumumans';

    protected $casts = [
        'jadwal_tayang' => 'datetime',
        'konten_dinamis' => 'array',
    ];

    // Scope untuk filter pengumuman yang sudah masuk jadwal tayang
    public function scopeAktif($query)
    {
        return $query->where('jadwal_tayang', '<=', now());
    }

    public function pelajars()
    {
        return $this->belongsToMany(DataPelajar::class, 'data_pengumuman_pelajars', 'pengumuman_id', 'pelajar_id')
            ->withPivot('dibaca_pada')
            ->withTimestamps();
    }
}
