<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataPelajar;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(Request $request)
    {
        $title  = 'Data Pelajar';
        $search = $request->input('search');

        $pelajars = DataPelajar::with(['konsKeahlian'])
            ->when($search, function ($query, $search) {
                $blindIndex = hash('sha256', $search);

                $query->where(function ($q) use ($search, $blindIndex) {
                    // Pencarian plain text
                    $q->where('nama',        'like', "%{$search}%")
                        ->orWhere('kelas',      'like', "%{$search}%")
                        ->orWhere('rombel',     'like', "%{$search}%")
                        // Pencarian via blind index (exact match NIS/NISN)
                        ->orWhere('nis_index',  $blindIndex)
                        ->orWhere('nisn_index', $blindIndex);
                });
            })
            ->orderBy('nama', 'asc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.data-pelajar', compact('pelajars', 'title', 'search'));
    }
}
