<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

// class DataPelajar extends Model
class DataPelajar extends Authenticatable
{
    use Notifiable, HasUuids;

    protected $table = 'data_pelajars';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'kelas',
        'rombel',
        'keahlian_id',
        'nis',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'nama_ayah',
        'password',
        'nis_index',
        'nisn_index'
    ];

    protected $casts = [
        'nis' => 'encrypted',
        'nisn' => 'encrypted',
        'tempat_lahir' => 'encrypted',
        'tanggal_lahir' => 'encrypted',
        'nama_ayah' => 'encrypted',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if ($model->nis) {
                $model->setAttribute('nis_index', hash('sha256', $model->nis));
            }
            if ($model->nisn) {
                $model->setAttribute('nisn_index', hash('sha256', $model->nisn));
            }
            if (!isset($model->attributes['password']) && $model->tanggal_lahir) {
                $model->attributes['password'] = Hash::make($model->tanggal_lahir);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('nis')) {
                $model->setAttribute('nis_index', hash('sha256', $model->nis));
            }
            if ($model->isDirty('nisn')) {
                $model->setAttribute('nisn_index', hash('sha256', $model->nisn));
            }
        });
    }

    public function konsKeahlian()
    {
        return $this->belongsTo(DataKonsKeahlian::class, 'keahlian_id');
    }

    public function tracerStudy()
    {
        // Pelajar memiliki satu data tracer study[cite: 3, 4]
        return $this->hasOne(DataTracerStudy::class, 'data_pelajar_id');
    }
}
