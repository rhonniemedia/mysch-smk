<?php

namespace App\Http\Controllers;

use App\Models\DataPengumuman;
use App\Models\DataTracerStudy;
use App\Models\DataPelajar;
use Illuminate\Http\Request;

class DataPengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Pengumuman';
        $pelajarId = auth()->guard('pelajar')->id();

        $listPengumuman = DataPengumuman::aktif()
            ->with(['pelajars' => function ($query) use ($pelajarId) {
                $query->where('pelajar_id', $pelajarId);
            }])
            ->orderBy('jadwal_tayang', 'desc')
            ->get()
            ->each(function ($p) {
                $p->is_read = $p->pelajars->isNotEmpty();
            });

        return view('pages.announcement.index', compact('listPengumuman', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($uuid)
    {
        // 1. Ambil data pengumuman
        $pengumuman = DataPengumuman::aktif()->findOrFail($uuid);
        $pelajar = auth()->guard('pelajar')->user();

        // 2. Hitung statistik partisipasi dari DataTracerStudy
        $totalAlumni = DataPelajar::count();
        $totalMengisi = DataTracerStudy::count();
        $persentase = ($totalAlumni > 0) ? round(($totalMengisi / $totalAlumni) * 100) : 0;

        // 3. Gabungkan persentase ke dalam meta (konten_dinamis)
        $meta = $pengumuman->konten_dinamis;
        $meta['partisipasi'] = $persentase . '%';

        // 4. Catat riwayat baca lewat relasi di DataPengumuman (bukan dari $pelajar)
        $pengumuman->pelajars()->syncWithoutDetaching([
            $pelajar->id => ['dibaca_pada' => now()]
        ]);

        return view($pengumuman->template_blade, [
            'pengumuman' => $pengumuman,
            'meta'       => $meta,
            'judul'      => $pengumuman->judul,
            'title'      => 'Pengumuman'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataPengumuman $dataPengumuman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataPengumuman $dataPengumuman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPengumuman $dataPengumuman)
    {
        //
    }
}
