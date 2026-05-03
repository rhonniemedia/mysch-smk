@extends('layouts.app')

@section('content')
<div class="mb-6 flex items-center gap-3">
    <a href="{{ route('announcement.index') }}" class="size-9 flex items-center justify-center rounded-xl ring-1 ring-border hover:ring-primary transition-all cursor-pointer shrink-0">
        <i data-lucide="arrow-left" class="size-4 text-secondary"></i>
    </a>
    <div>
        <p class="text-xs text-secondary uppercase tracking-widest font-semibold">Pengumuman / {{ $pengumuman->kategori }}</p>
        <h1 class="text-foreground text-xl md:text-2xl font-bold leading-tight">{{ $pengumuman->judul }}</h1>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
    <div class="lg:col-span-2 flex flex-col rounded-2xl border border-border p-8 bg-white gap-6">
        <div class="flex items-center gap-4">
            <div class="size-12 bg-success/10 rounded-xl flex items-center justify-center shrink-0">
                <i data-lucide="{{ $meta['icon'] ?? 'award' }}" class="size-6 text-success"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold text-foreground">Status Kelulusan</h2>
                <p class="text-xs text-secondary uppercase font-bold tracking-wider">Tahun Pelajaran 2025/2026</p>
            </div>
        </div>

        <div class="bg-gradient-to-br from-success to-emerald-700 rounded-2xl p-8 text-white text-center relative overflow-hidden">
            <div class="size-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-white/30">
                <i data-lucide="check-circle" class="size-10 text-white"></i>
            </div>
            <div class="mb-4">
                <p class="text-xl font-bold uppercase tracking-wide">{{ auth()->user()->nama }}</p>
                <p class="text-emerald-100 text-xs opacity-80">NISN: {{ auth()->user()->nisn }}</p>
            </div>
            <div class="mb-4 inline-block bg-white/20 px-4 py-1.5 rounded-full text-sm font-bold border border-white/30">
                <h3 class="text-3xl font-black tracking-tight">ANDA LULUS!</h3>
            </div>
            <p class="text-emerald-100 text-sm italic">"{{ $meta['pesan'] ?? '' }}"</p>
        </div>

        <div class="flex flex-col sm:flex-row gap-3">
            <button onclick="triggerGlobalModal({type:'success',title:'SKL Berhasil Diunduh',message:'Surat Keterangan Lulus Anda telah berhasil diunduh dan disimpan ke perangkat.',confirmText:'Oke'})"
                class="flex-1 flex items-center justify-center gap-2 bg-primary text-white py-3.5 rounded-xl font-bold hover:bg-primary-hover transition-all cursor-pointer shadow-lg shadow-primary/20">
                <i data-lucide="download" class="size-5"></i> Surat Keterangan Lulus
            </button>
        </div>
    </div>

    <!-- Sidebar Kanan -->
    <div class="bg-gradient-to-br from-[#ff1443] to-[#c40030] rounded-2xl p-8 text-white flex flex-col gap-4">
        <div class="size-12 bg-white/20 rounded-xl flex items-center justify-center"><i data-lucide="info" class="size-6 text-white"></i></div>
        <h3 class="text-lg font-bold">Info Penting</h3>
        <p class="text-red-100 text-sm leading-relaxed flex-1">Surat Keterangan Lulus (SKL) dapat diunduh mulai hari ini. Ijazah fisik akan dibagikan saat pelaksanaan perpisahan.</p>
        <div class="p-4 bg-white/10 rounded-2xl border border-white/10 flex flex-col gap-2">
            <div class="flex items-center gap-2"><i data-lucide="calendar" class="size-4 text-red-200"></i>
                <p class="text-xs text-red-200 font-bold uppercase tracking-widest">Perpisahan</p>
            </div>
            <p class="text-2xl font-black">Segera</p>
        </div>
        <div class="p-4 bg-white/10 rounded-2xl border border-white/10">
            <p class="text-xs text-red-200 font-bold uppercase tracking-widest mb-1">No. SK Kelulusan</p>
            <p class="text-sm font-bold">{{ $meta['no_sk'] ?? '-' }}</p>
        </div>
    </div>
</div>
@endsection