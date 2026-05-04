<?php

namespace App\Http\Controllers;

use App\Imports\DataPelajarImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportDataPelajarController extends Controller
{
    public function index()
    {
        return view('admin.import-pelajar', ['title' => 'Import Data Pelajar']);
    }

    public function store(Request $request)
    {
        set_time_limit(600);

        $request->validate([
            'file' => [
                'required',
                'file',
                'max:5120',
                function ($attribute, $value, $fail) {
                    $extension = strtolower($value->getClientOriginalExtension());
                    $allowed = ['xlsx', 'xls', 'csv'];
                    if (!in_array($extension, $allowed)) {
                        $fail('File harus berformat xlsx, xls, atau csv.');
                    }
                },
            ],
        ], [
            'file.required' => 'File wajib dipilih.',
            'file.max'      => 'Ukuran file maksimal 5MB.',
        ]);

        $import = new DataPelajarImport();
        Excel::import($import, $request->file('file'));

        return back()->with([
            'import_success' => $import->successCount,
            'import_errors'  => $import->errors,
        ]);
    }

    public function template()
    {
        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="template_import_pelajar.csv"',
        ];

        $columns = [
            'nama',
            'jenis_kelamin',
            'kelas',
            'rombel',
            'kode_keahlian',
            'nis',
            'nisn',
            'tempat_lahir',
            'tanggal_lahir',
            'nama_ayah'
        ];

        $callback = function () use ($columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            // Contoh data
            fputcsv($file, ['Budi Santoso', 'L', 'XII', 'TKJ 1', 'TKJ', '2223001', '0051234567', 'Curup', '15052007', 'Slamet']);
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
