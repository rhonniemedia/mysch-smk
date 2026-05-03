<?php

namespace App\Auth;

use App\Models\DataPelajar;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\Hash;

class PelajarUserProvider extends EloquentUserProvider
{
    public function retrieveByCredentials(array $credentials)
    {
        $username = $credentials['username'] ?? null;
        if (!$username) return null;

        $blindIndex = hash('sha256', $username);

        // Cari berdasarkan nisn_index atau nis_index
        return DataPelajar::where('nisn_index', $blindIndex)
            ->orWhere('nis_index', $blindIndex)
            ->first();
    }

    public function validateCredentials($user, array $credentials)
    {
        return Hash::check($credentials['password'], $user->password);
    }
}
