<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'nama'  => 'Roni Saputra',
                'nip'   => '198808312015051002',
                'email' => 'rhonnie.media@gmail.com',
                'no_hp' => '082175768400',
            ],
            [
                'nama'  => 'Sumarwan',
                'nip'   => '197909022008041001',
                'email' => 'sanggang1979@gmail.com',
                'no_hp' => '085274030344',
            ],
            [
                'nama'  => 'Prismar',
                'nip'   => '197503192000121002',
                'email' => 'boengprismar75@gmail.com',
                'no_hp' => '081377989408',
            ],
        ];

        // Auto-generate hash dan password dengan format khusus
        $users = array_map(function ($user) {
            // Format password: MySch + no_hp + *
            $rawPassword = 'MySch' . $user['no_hp'] . '*';

            return [
                'nama'       => $user['nama'],
                // Enkripsi nilai asli untuk keamanan database
                'nip'        => encrypt($user['nip']),
                'email'      => encrypt($user['email']),
                'no_hp'      => encrypt($user['no_hp']),

                // Hash SHA256 untuk keperluan query/login cepat
                'nip_hash'   => hash('sha256', $user['nip']),
                'email_hash' => hash('sha256', $user['email']),

                // Password di-hash menggunakan kombinasi MySch[no_hp]*
                'password'   => Hash::make($rawPassword),
                'foto'       => null,
            ];
        }, $users);

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
