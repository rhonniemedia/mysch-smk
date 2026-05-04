@extends('layouts.user')

@section('title', 'Detail Pengumuman')

@section('content')
<div>
    <!-- Header dengan Tombol Kembali ke Indeks -->
    <div class="mb-6 flex items-center justify-between gap-4">
        <!-- Sisi Kiri: Judul -->
        <div>
            <p class="text-xs text-secondary uppercase tracking-widest font-semibold">Pengumuman / Detail</p>
            <h1 class="text-foreground text-xl md:text-2xl font-bold leading-tight">
                @if($slug === 'kelulusan') Pengumuman Hasil Kelulusan
                @elseif($slug === 'yudisium') Jadwal Pelaksanaan Yudisium
                @elseif($slug === 'skl') Unduh SKL Online
                @elseif($slug === 'tracer_info') Informasi Tracer Study
                @endif
            </h1>
        </div>

        <!-- Sisi Kanan: Tombol Kembali -->
        <a href="{{ route('announcement.index') }}"
            class="size-10 flex items-center justify-center rounded-xl ring-1 ring-border hover:ring-success hover:bg-success/5 text-secondary hover:text-success transition-all duration-300 cursor-pointer shrink-0 group">
            <i data-lucide="arrow-left" class="size-5 group-hover:-translate-x-1 transition-transform"></i>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
        <!-- KOLOM KIRI: Konten Utama -->
        <div class="lg:col-span-2 flex flex-col rounded-2xl border border-border p-8 bg-white gap-6">
            @if($slug === 'kelulusan')
            <div class="flex items-center gap-4">
                <div class="size-12 bg-success/10 rounded-xl flex items-center justify-center shrink-0"><i data-lucide="award" class="size-6 text-success"></i></div>
                <div>
                    <h2 class="text-xl font-bold text-foreground">Status Kelulusan</h2>
                    <p class="text-xs text-secondary uppercase font-bold tracking-wider">Tahun Pelajaran 2025/2026</p>
                </div>
            </div>
            <div class="bg-gradient-to-br from-success to-emerald-700 rounded-2xl p-8 text-white text-center relative overflow-hidden">
                <div class="absolute top-0 right-0 w-40 h-40 bg-white/5 rounded-full -translate-y-10 translate-x-10"></div>
                <div class="size-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-white/30"><i data-lucide="check-circle" class="size-10 text-white"></i></div>
                <h3 class="text-3xl font-black tracking-tight mb-1">ANDA LULUS!</h3>
                <p class="text-emerald-100 text-sm italic">"Segenap keluarga besar SMKN 1 Rejang Lebong mengucapkan selamat atas keberhasilan Anda."</p>
                <div class="mt-4 inline-block bg-white/20 px-4 py-1.5 rounded-full text-sm font-bold border border-white/30">Predikat: Sangat Memuaskan</div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="flex flex-col gap-1.5 p-4 bg-muted rounded-xl">
                    <p class="text-xs font-bold text-secondary uppercase tracking-wide">No. SK Kelulusan</p>
                    <p class="font-bold text-foreground text-sm">421.3/SMKN1-RL/2026/0512</p>
                </div>
                <div class="flex flex-col gap-1.5 p-4 bg-muted rounded-xl">
                    <p class="text-xs font-bold text-secondary uppercase tracking-wide">Tanggal Yudisium</p>
                    <p class="font-bold text-foreground text-sm">20 Juni 2026</p>
                </div>
                <div class="flex flex-col gap-1.5 p-4 bg-muted rounded-xl">
                    <p class="text-xs font-bold text-secondary uppercase tracking-wide">Tempat</p>
                    <p class="font-bold text-foreground text-sm">Aula SMKN 1 RL</p>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <button onclick="triggerGlobalModal({type:'success',title:'SKL Berhasil Diunduh',message:'Surat Keterangan Lulus Anda telah berhasil diunduh dan disimpan ke perangkat.',confirmText:'Oke'})"
                    class="flex-1 flex items-center justify-center gap-2 bg-primary text-white py-3.5 rounded-xl font-bold hover:bg-primary-hover transition-all cursor-pointer shadow-lg shadow-primary/20">
                    <i data-lucide="download" class="size-5"></i> Unduh SKL Online
                </button>
                <button onclick="triggerGlobalModal({type:'info',title:'Legalisir Digital',message:'Fitur legalisir digital akan tersedia setelah yudisium dilaksanakan pada 20 Juni 2026.',confirmText:'Mengerti'})"
                    class="flex-1 flex items-center justify-center gap-2 ring-1 ring-border hover:ring-primary py-3.5 rounded-xl font-semibold text-foreground transition-all cursor-pointer">
                    <i data-lucide="stamp" class="size-5 text-secondary"></i> Legalisir Digital
                </button>
            </div>
            <!-- ... sisa detail kelulusan (No SK, Unduh SKL, dll) ... -->

            @elseif($slug === 'yudisium')
            <div class="flex items-center gap-4">
                <div class="size-12 bg-primary/10 rounded-xl flex items-center justify-center"><i data-lucide="calendar-check" class="size-6 text-primary"></i></div>
                <div>
                    <h2 class="text-xl font-bold text-foreground">Detail Yudisium</h2>
                    <p class="text-xs text-secondary uppercase font-bold tracking-wider">Tahun Pelajaran 2025/2026</p>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="flex flex-col gap-1.5 p-4 bg-muted rounded-xl">
                    <p class="text-xs font-bold text-secondary uppercase tracking-wide">Tanggal</p>
                    <p class="font-bold text-foreground">20 Juni 2026</p>
                </div>
                <div class="flex flex-col gap-1.5 p-4 bg-muted rounded-xl">
                    <p class="text-xs font-bold text-secondary uppercase tracking-wide">Waktu</p>
                    <p class="font-bold text-foreground">08.00 WIB – Selesai</p>
                </div>
                <div class="flex flex-col gap-1.5 p-4 bg-muted rounded-xl">
                    <p class="text-xs font-bold text-secondary uppercase tracking-wide">Tempat</p>
                    <p class="font-bold text-foreground">Aula SMKN 1 Rejang Lebong</p>
                </div>
                <div class="flex flex-col gap-1.5 p-4 bg-muted rounded-xl">
                    <p class="text-xs font-bold text-secondary uppercase tracking-wide">Dress Code</p>
                    <p class="font-bold text-foreground">Seragam Resmi Sekolah</p>
                </div>
            </div>
            <p class="text-secondary text-sm leading-relaxed flex-1">Seluruh siswa wajib hadir tepat waktu. Pengambilan ijazah fisik dilakukan pada saat yudisium berlangsung. Harap membawa kartu identitas dan dokumen yang diperlukan.</p>

            @endif
        </div>

        <!-- KOLOM KANAN: Sidebar Info Tambahan (Dinamis) -->
        <div class="bg-gradient-to-br from-[#ff1443] to-[#c40030] rounded-2xl p-8 text-white flex flex-col gap-4 shadow-xl shadow-red-500/10">
            <div class="size-12 bg-white/20 rounded-xl flex items-center justify-center">
                <i data-lucide="info" class="size-6 text-white"></i>
            </div>

            @if($slug === 'kelulusan')
            <h3 class="text-lg font-bold">Info Penting</h3>
            <p class="text-red-100 text-sm leading-relaxed flex-1">SKL Online dapat diunduh mulai hari ini. Ijazah fisik akan dibagikan saat yudisium berlangsung pada 20 Juni 2026. Pastikan hadir tepat waktu.</p>
            <div class="p-4 bg-white/10 rounded-2xl border border-white/10 flex flex-col gap-2">
                <div class="flex items-center gap-2"><i data-lucide="calendar" class="size-4 text-red-200"></i>
                    <p class="text-xs text-red-200 font-bold uppercase tracking-widest">Countdown Yudisium</p>
                </div>
                <p class="text-2xl font-black">49 Hari Lagi</p>
            </div>
            <div class="p-4 bg-white/10 rounded-2xl border border-white/10">
                <p class="text-xs text-red-200 font-bold uppercase tracking-widest mb-1">No. SK Kelulusan</p>
                <p class="text-sm font-bold">421.3/SMKN1-RL/2026/0512</p>
            </div>

            @elseif($slug === 'yudisium')
            <h3 class="text-lg font-bold">Persyaratan Yudisium</h3>
            <p class="text-red-100 text-sm leading-relaxed flex-1">
                Seluruh siswa wajib mengenakan seragam resmi dan hadir 30 menit sebelum acara dimulai.
            </p>
            <div class="p-4 bg-white/10 rounded-2xl border border-white/10 flex flex-col gap-2">
                <p class="text-[10px] text-red-200 font-bold uppercase tracking-widest">Countdown</p>
                <p class="text-2xl font-black">49 Hari Lagi</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection