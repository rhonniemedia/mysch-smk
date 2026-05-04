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
        $pengumuman = DataPengumuman::aktif()->findOrFail($uuid);
        $pelajar = auth()->guard('pelajar')->user();

        $totalAlumni = DataPelajar::count();
        $totalMengisi = DataTracerStudy::count();
        $persentase = ($totalAlumni > 0) ? round(($totalMengisi / $totalAlumni) * 100) : 0;

        $meta = $pengumuman->konten_dinamis;
        $meta['partisipasi'] = $persentase . '%';

        $pengumuman->pelajars()->syncWithoutDetaching([
            $pelajar->id => ['dibaca_pada' => now()]
        ]);

        // Cek apakah pelajar sudah mengisi tracer study
        $sudahIsiTracer = DataTracerStudy::where('data_pelajar_id', $pelajar->id)->exists();

        return view($pengumuman->template_blade, [
            'pengumuman'     => $pengumuman,
            'meta'           => $meta,
            'judul'          => $pengumuman->judul,
            'title'          => 'Pengumuman',
            'sudahIsiTracer' => $sudahIsiTracer, // tambahkan ini
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
