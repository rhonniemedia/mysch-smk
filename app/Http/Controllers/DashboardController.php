<?php

namespace App\Http\Controllers;

use App\Models\DataPelajar;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Beranda';

        $pelajar = DataPelajar::with('konsKeahlian.progKeahlian')
            ->find(Auth::guard('pelajar')->id());

        return view('pages.dashboard', compact('pelajar', 'title'));
    }
}
