@extends('layouts.app')

@section('title', 'Talent Overview - Dashboard')

@section('content')

<!-- ===== PENGUMUMAN ===== -->
<div class="flex flex-col gap-3">
    <!-- Card Kelulusan -->
    <a href="{{ route('announcement.show', 'kelulusan') }}"
        class="w-full text-left group flex items-center gap-5 p-5 bg-white rounded-2xl border-2 border-border hover:border-success hover:shadow-lg transition-all duration-300">
        <div class="size-14 bg-success/10 rounded-2xl flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-300">
            <i data-lucide="award" class="size-7 text-success"></i>
        </div>
        <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2 mb-1">
                <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold bg-success/10 text-success-dark uppercase tracking-wide">Kelulusan</span>
                <span class="text-xs text-secondary">02 Mei 2026</span>
            </div>
            <h3 class="font-bold text-foreground text-base">Pengumuman Hasil Kelulusan TP 2025/2026</h3>
            <p class="text-secondary text-sm mt-0.5 line-clamp-1">Seluruh siswa kelas XII dinyatakan lulus ujian akhir tahun pelajaran 2025/2026...</p>
        </div>
        <i data-lucide="chevron-right" class="size-5 text-secondary group-hover:text-success group-hover:translate-x-1 transition-all duration-300 shrink-0"></i>
    </a>

    <!-- Card Yudisium -->
    <a href="{{ route('announcement.show', 'yudisium') }}"
        class="w-full text-left group flex items-center gap-5 p-5 bg-white rounded-2xl border-2 border-border hover:border-primary hover:shadow-lg transition-all duration-300">
        <div class="size-14 bg-primary/10 rounded-2xl flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-300">
            <i data-lucide="calendar-check" class="size-7 text-primary"></i>
        </div>
        <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2 mb-1">
                <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold bg-primary/10 text-primary uppercase tracking-wide">Yudisium</span>
                <span class="text-xs text-secondary">28 Apr 2026</span>
            </div>
            <h3 class="font-bold text-foreground text-base">Jadwal Pelaksanaan Yudisium 2026</h3>
            <p class="text-secondary text-sm mt-0.5 line-clamp-1">Informasi lengkap jadwal dan persyaratan yudisium...</p>
        </div>
        <i data-lucide="chevron-right" class="size-5 text-secondary group-hover:text-primary group-hover:translate-x-1 transition-all duration-300 shrink-0"></i>
    </a>
</div>
<!-- END PENGUMUMAN -->

@endsection