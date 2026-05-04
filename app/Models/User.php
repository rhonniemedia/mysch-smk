<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, HasUuids, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'nama',
        'nip',
        'email',
        'no_hp',
        'password',
        'foto',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'nip_hash',
        'email_hash',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            // Enkripsi otomatis saat set/get
            'nip'      => 'encrypted',
            'email'    => 'encrypted',
            'no_hp'    => 'encrypted',
        ];
    }

    // -------------------------------------------------------
    // Auto-generate hash setiap kali nip atau email di-set
    // -------------------------------------------------------
    protected static function booted(): void
    {
        static::saving(function (User $user) {
            if ($user->isDirty('nip')) {
                $user->nip_hash = $user->nip
                    ? hash('sha256', $user->nip)
                    : null;
            }

            if ($user->isDirty('email')) {
                $user->email_hash = $user->email
                    ? hash('sha256', $user->email)
                    : null;
            }
        });
    }

    // -------------------------------------------------------
    // Helper: cari user by NIP atau email (via hash)
    // -------------------------------------------------------
    public static function findForLogin(string $identifier): ?static
    {
        $hashed = hash('sha256', $identifier);

        return static::where('nip_hash', $hashed)
            ->orWhere('email_hash', $hashed)
            ->first();
    }
}
