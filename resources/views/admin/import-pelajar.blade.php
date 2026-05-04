@extends('layouts.admin')

@section('title', 'Import Data Pelajar')

@section('content')
<div class="max-w-3xl mx-auto flex flex-col gap-6">

    {{-- Header --}}
    <div>
        <p class="text-xs text-secondary uppercase tracking-widest font-semibold mb-1">Admin / Import Data</p>
        <h1 class="text-foreground text-2xl md:text-3xl font-bold">Import Data Pelajar</h1>
    </div>

    {{-- Notifikasi Sukses --}}
    @if(session('import_success'))
    <div class="flex items-start gap-3 bg-green-50 border border-green-200 rounded-xl p-4">
        <i data-lucide="check-circle" class="size-5 text-success shrink-0 mt-0.5"></i>
        <p class="text-sm text-green-700 font-medium">
            {{ session('import_success') }} data berhasil diimport.
        </p>
    </div>
    @endif

    {{-- Tabel Error --}}
    @if(session('import_errors') && count(session('import_errors')) > 0)
    <div class="flex flex-col gap-3">
        <div class="flex items-center gap-2 text-error">
            <i data-lucide="alert-triangle" class="size-5"></i>
            <p class="font-bold text-sm">{{ count(session('import_errors')) }} baris gagal diimport:</p>
        </div>
        <div class="rounded-xl border border-red-200 overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-red-50 text-red-700">
                    <tr>
                        <th class="text-left px-4 py-3 font-bold w-16">Baris</th>
                        <th class="text-left px-4 py-3 font-bold">Nama</th>
                        <th class="text-left px-4 py-3 font-bold">Keterangan Error</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-red-100">
                    @foreach(session('import_errors') as $err)
                    <tr class="bg-white">
                        <td class="px-4 py-3 text-secondary">{{ $err['baris'] }}</td>
                        <td class="px-4 py-3 font-medium">{{ $err['nama'] }}</td>
                        <td class="px-4 py-3 text-error">{{ $err['pesan'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    {{-- Form Upload --}}
    <div class="bg-white rounded-2xl border border-border p-8 flex flex-col gap-6">
        <div class="flex items-center gap-4">
            <div class="size-12 bg-primary/10 rounded-xl flex items-center justify-center">
                <i data-lucide="file-spreadsheet" class="size-6 text-primary"></i>
            </div>
            <div>
                <h2 class="text-lg font-bold text-foreground">Upload File Excel</h2>
                <p class="text-xs text-secondary">Format: .xlsx / .xls / .csv, maks. 5MB</p>
            </div>
        </div>

        @error('file')
        <div class="flex items-center gap-2 bg-red-50 border border-red-200 rounded-xl p-3">
            <i data-lucide="alert-circle" class="size-4 text-error shrink-0"></i>
            <p class="text-sm text-error">{{ $message }}</p>
        </div>
        @enderror

        <form action="{{ route('import.pelajar.store') }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col gap-5" x-data="{ fileName: '', loading: false }" @submit="loading = true">
            @csrf
            <div class="border-2 border-dashed border-border rounded-xl p-8 text-center hover:border-primary/40 transition-colors"
                @dragover.prevent @drop.prevent="fileName = $event.dataTransfer.files[0]?.name; $refs.fileInput.files = $event.dataTransfer.files">
                <i data-lucide="upload-cloud" class="size-10 text-secondary mx-auto mb-3"></i>
                <p class="text-sm text-secondary mb-2">Drag & drop file di sini atau</p>
                <label class="inline-block bg-primary/10 text-primary font-bold text-sm px-4 py-2 rounded-xl cursor-pointer hover:bg-primary/20 transition-colors">
                    Pilih File
                    <input type="file" name="file" accept=".xlsx,.xls,.csv" class="hidden" x-ref="fileInput"
                        @change="fileName = $event.target.files[0]?.name">
                </label>
                <p x-show="fileName" x-text="'📄 ' + fileName" class="mt-3 text-sm font-medium text-foreground"></p>
            </div>

            <button type="submit" :disabled="loading || !fileName"
                class="flex items-center justify-center gap-2 bg-primary text-white font-bold py-3.5 rounded-xl hover:bg-primary-hover transition-colors disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer">
                <svg x-show="loading" class="animate-spin size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" x-cloak>
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                <i x-show="!loading" data-lucide="upload" class="size-4"></i>
                <span x-text="loading ? 'Memproses...' : 'Import Sekarang'"></span>
            </button>
        </form>

        {{-- Template Download --}}
        <div class="flex items-center gap-3 bg-muted rounded-xl p-4">
            <i data-lucide="info" class="size-4 text-secondary shrink-0"></i>
            <p class="text-xs text-secondary flex-1">
                Belum punya template?
                <a href="{{ route('import.pelajar.template') }}" class="text-primary font-bold hover:underline">
                    Download template Excel
                </a>
            </p>
        </div>
    </div>
</div>
@endsection