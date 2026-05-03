@extends('layouts.app')

@section('title', 'Talent Overview - Dashboard')

@section('content')

<!-- ===== PENGUMUMAN ===== -->
<!-- Daftar Pengumuman di Dashboard -->
<div class="flex flex-col gap-3">
    @foreach($listPengumuman as $p)
    @php
    // 1. Ambil ID Pelajar dari guard yang benar
    $pelajarId = auth()->guard('pelajar')->id();

    // 2. Cek apakah pelajar ini ada dalam daftar relasi 'pelajars' pengumuman ini
    // Kita menggunakan contains() untuk efisiensi pengecekan di koleksi
    $isRead = $p->is_read;
    @endphp

    <a href="{{ route('announcement.show', $p->id) }}"
        class="w-full group flex items-center gap-5 p-5 bg-white rounded-2xl border-2 transition-all 
       {{ $isRead ? 'border-border' : 'border-primary shadow-md' }}">

        <div class="size-14 {{ $isRead ? 'bg-muted' : 'bg-primary/10' }} rounded-2xl flex items-center justify-center shrink-0">
            <i data-lucide="megaphone" class="size-7 {{ $isRead ? 'text-secondary' : 'text-primary' }}"></i>
        </div>

        <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2 mb-1">
                <span class="px-2 py-0.5 rounded-md text-[10px] font-bold bg-muted text-secondary uppercase">
                    {{ $p->kategori }}
                </span>
                {{-- Jika belum dibaca, tampilkan indikator 'Baru' --}}
                @if(!$isRead)
                <span class="text-[10px] font-bold text-red-500 uppercase">Baru</span>
                @endif
            </div>
            <h3 class="font-bold text-foreground text-base">{{ $p->judul }}</h3>
            <p class="text-secondary text-sm mt-0.5 line-clamp-1">{{ $p->konten_dinamis['deskripsi'] ?? 'Klik untuk melihat detail pengumuman.' }}</p>
        </div>
        <i data-lucide="chevron-right" class="size-5 text-secondary"></i>
    </a>
    @endforeach
</div>
<!-- END PENGUMUMAN -->

@endsection