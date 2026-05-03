<?php

namespace App\Http\Controllers;

use App\Models\DataPelajar;
use App\Models\DataTracerStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataTracerStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Tracer Study';
        $pelajarId = Auth::guard('pelajar')->id();

        $pelajar = DataPelajar::with(['tracerStudy', 'konsKeahlian.progKeahlian'])
            ->findOrFail($pelajarId);

        // Hitung Statistik Partisipasi
        $totalAlumni = DataPelajar::count();
        $totalMengisi = DataTracerStudy::count();

        // Hitung persentase (pastikan tidak pembagian dengan nol)
        $persentase = ($totalAlumni > 0) ? round(($totalMengisi / $totalAlumni) * 100) : 0;

        return view('pages.tracer', compact('pelajar', 'title', 'persentase'));
    }

    public function store(Request $request)
    {
        $pelajarId = Auth::guard('pelajar')->id();

        // Validasi input sesuai schema database[cite: 4]
        $validated = $request->validate([
            'no_hp'              => 'required|string|max:20',
            'status_pasca_lulus' => 'required|in:Bekerja,Wirausaha,Melanjutkan Kuliah,Mencari Kerja',
            'instansi'           => 'nullable|string|max:255',
            'kesan_sekolah'      => 'required|string',
        ], [
            'no_hp.required'              => 'Nomor HP wajib diisi.',
            'no_hp.max'                   => 'Nomor HP maksimal 20 karakter.',
            'status_pasca_lulus.required' => 'Status pasca lulus wajib dipilih.',
            'status_pasca_lulus.in'       => 'Status yang dipilih tidak valid.',
            'kesan_sekolah.required'      => 'Kesan selama bersekolah wajib diisi.',
        ]);

        // UpdateOrCreate: Jika data sudah ada maka update, jika belum maka buat baru
        DataTracerStudy::updateOrCreate(
            ['data_pelajar_id' => $pelajarId],
            $validated
        );

        // Flash session untuk trigger modal di blade
        return redirect()->route('tracer.index')
            ->with('tracer_success', true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DataTracerStudy $tracerStudy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataTracerStudy $tracerStudy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataTracerStudy $tracerStudy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataTracerStudy $tracerStudy)
    {
        //
    }
}
