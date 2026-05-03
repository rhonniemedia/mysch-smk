<?php

namespace App\Http\Controllers;

use App\Models\DataPelajar;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $title = 'Profil';

        $pelajar = DataPelajar::with('konsKeahlian.progKeahlian')
            ->find(Auth::guard('pelajar')->id());

        if ($pelajar) {
            // Menambahkan properti 'jk' secara dinamis ke objek $pelajar
            $pelajar->jk = ($pelajar->jenis_kelamin == 'L') ? 'Laki-laki' : (($pelajar->jenis_kelamin == 'P') ? 'Perempuan' : '-');
        }

        return view('pages.profile', compact('pelajar', 'title'));
    }
}
