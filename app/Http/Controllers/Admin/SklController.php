<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataTracerStudy;
use App\Models\DataFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SklController extends Controller
{
    public function download()
    {
        $user = Auth::guard('pelajar')->user();

        // Cek apakah sudah mengisi tracer study
        $sudahIsiTracer = DataTracerStudy::where('data_pelajar_id', $user->id)->exists();

        if (!$sudahIsiTracer) {
            return back()->with('error', 'Anda harus mengisi Tracer Study terlebih dahulu sebelum mengunduh SKL.');
        }

        $file = DataFile::where('pelajar_id', $user->id)
            ->where('kategori', 'SKL')
            ->first();

        if (!$file) {
            return back()->with('error', 'File SKL Anda belum tersedia.');
        }

        $fullPath = storage_path('app/' . $file->path_file);

        if (!file_exists($fullPath)) {
            return back()->with('error', 'File SKL Anda belum tersedia.');
        }

        return response()->download($fullPath, $file->nama_file);
    }
}
