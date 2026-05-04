@extends('layouts.user')

@section('content')
<div class="mb-6 flex items-center gap-3">
    <a href="{{ route('announcement.index') }}" class="size-9 flex items-center justify-center rounded-xl ring-1 ring-border hover:ring-primary transition-all cursor-pointer shrink-0">
        <i data-lucide="arrow-left" class="size-4 text-secondary"></i>
    </a>
    <div>
        <p class="text-xs text-secondary uppercase tracking-widest font-semibold">Pengumuman / {{ $pengumuman->kategori }}</p>
        <h1 class="text-foreground text-xl md:text-2xl font-bold">{{ $pengumuman->judul }}</h1>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
    <div class="lg:col-span-2 flex flex-col rounded-2xl border border-border p-8 bg-white gap-6">
        <div class="flex items-center gap-4">
            <div class="size-12 bg-muted rounded-xl flex items-center justify-center">
                <i data-lucide="{{ $meta['icon'] ?? 'clipboard-list' }}" class="size-6 text-secondary"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold text-foreground">Informasi Tracer Study</h2>
                <p class="text-xs text-secondary uppercase font-bold tracking-wider">Batas: {{ $meta['deadline'] ?? '30 Juni 2026' }}</p>
            </div>
        </div>
        <p class="text-secondary text-sm leading-relaxed flex-1">
            {{ $meta['deskripsi'] ?? 'Seluruh alumni diwajibkan mengisi formulir tracer study sebagai syarat untuk pengembangan kurikulum sekolah.' }}
        </p>
        <a href="{{ route('tracer.index') }}"
            class="flex items-center justify-center gap-2 bg-primary text-white py-3.5 rounded-xl font-bold hover:bg-primary-hover transition-all cursor-pointer shadow-lg shadow-primary/20">
            <i data-lucide="file-pen" class="size-5"></i> Isi Tracer Study Sekarang
        </a>
    </div>
    <div class="bg-gradient-to-br from-[#ff1443] to-[#c40030] rounded-2xl p-8 text-white flex flex-col gap-4">
        <div class="size-12 bg-white/20 rounded-xl flex items-center justify-center">
            <i data-lucide="info" class="size-6 text-white"></i>
        </div>
        <h3 class="text-lg font-bold">Info Penting</h3>
        <p class="text-red-100 text-sm leading-relaxed flex-1">
            Tracer study wajib diisi sebelum batas waktu yang ditentukan. Pengisian dilakukan secara online melalui menu Tracer Study.
        </p>
        <div class="p-4 bg-white/10 rounded-2xl border border-white/10">
            <p class="text-xs text-red-200 font-bold uppercase tracking-widest mb-1">Partisipasi</p>
            <p class="text-2xl font-black">{{ $meta['partisipasi'] ?? '0%' }}</p>
            <div class="mt-2 bg-white/10 rounded-full h-1.5">
                <div class="bg-amber-300 h-1.5 rounded-full" style="width: {{ $meta['partisipasi'] ?? '0%' }}"></div>
            </div>
            <p class="text-xs text-red-200 mt-1">{{ $meta['partisipasi'] ?? '0%' }} sudah mengisi</p>
        </div>
    </div>
</div>
@endsection