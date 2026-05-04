@extends('layouts.user')

@section('title', 'Talent Overview - Dashboard')

@section('content')

<!-- ===== PROFIL SISWA ===== -->
<div>
    <div class="mb-6">
        <p class="text-xs text-secondary uppercase tracking-widest font-semibold mb-1">Beranda / Profil Siswa</p>
        <h1 class="text-foreground text-2xl md:text-3xl font-bold">Profil Siswa</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
        <!-- Card Identitas: tanpa banner berbeda warna, semua putih -->
        <div class="lg:col-span-2 flex flex-col rounded-2xl border border-border bg-white overflow-hidden">
            <div class="px-8 pt-8 pb-2 flex flex-col sm:flex-row sm:items-start gap-5">
                <div class="size-20 bg-muted rounded-2xl flex items-center justify-center shrink-0 border border-border">
                    <i data-lucide="user" class="size-10 text-secondary"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-black text-foreground">{{ $pelajar->nama }}</h2>
                    <p class="text-secondary text-sm">{{ $pelajar->nis }}@smkn1rl.sch.id</p>
                    <div class="flex flex-wrap gap-2 mt-2">
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-xs font-bold bg-success/10 text-success-dark"><i data-lucide="check-circle" class="size-3"></i> Siswa Aktif</span>
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-xs font-bold bg-primary/10 text-primary"><i data-lucide="graduation-cap" class="size-3"></i> TA 2025/2026</span>
                    </div>
                </div>
                <button onclick="triggerGlobalModal({type:'info',title:'Edit Profil',message:'Perubahan data profil harus diverifikasi oleh admin sekolah. Silakan hubungi admin untuk pembaruan data.',confirmText:'Mengerti'})"
                    class="flex items-center gap-2 bg-primary/10 text-primary px-5 py-2.5 rounded-xl font-bold text-sm hover:bg-primary/20 transition-colors cursor-pointer shrink-0 self-start">
                    <i data-lucide="pencil" class="size-4"></i> Edit Profil
                </button>
            </div>
            <div class="px-8 pb-8 mt-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-1">
                        <h4 class="text-[10px] font-bold text-primary uppercase tracking-[0.3em] mb-4">Data Akademik</h4>
                        <div class="flex justify-between items-center py-3 border-b border-border">
                            <span class="flex items-center gap-2 text-secondary text-sm"><i data-lucide="hash" class="size-4 shrink-0"></i> NISN Siswa</span>
                            <span class="font-bold text-sm">{{ $pelajar->nisn }}</span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b border-border">
                            <span class="flex items-center gap-2 text-secondary text-sm"><i data-lucide="book" class="size-4 shrink-0"></i> Nomor Induk Siswa</span>
                            <span class="font-bold text-sm text-right">{{ $pelajar->nis }}</span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b border-border">
                            <span class="flex items-center gap-2 text-secondary text-sm"><i data-lucide="trophy" class="size-4 shrink-0"></i> Konsentrasi Keahlian</span>
                            <span class="font-bold text-sm">{{ $pelajar->konsKeahlian?->keahlian }}</span>
                        </div>
                        <div class="flex justify-between items-center py-3">
                            <span class="flex items-center gap-2 text-secondary text-sm"><i data-lucide="circle-star" class="size-4 shrink-0"></i> Program Keahlian</span>
                            <span class="font-bold text-sm text-right">{{ $pelajar->konsKeahlian?->progKeahlian?->prog_keahlian }}</span>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <h4 class="text-[10px] font-bold text-primary uppercase tracking-[0.3em] mb-4">Data Personal</h4>
                        <div class="flex justify-between items-center py-3 border-b border-border">
                            <span class="flex items-center gap-2 text-secondary text-sm"><i data-lucide="map-pin" class="size-4 shrink-0"></i> Tempat Lahir</span>
                            <span class="font-bold text-sm">{{ $pelajar->tempat_lahir }}</span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b border-border">
                            <span class="flex items-center gap-2 text-secondary text-sm"><i data-lucide="calendar-1" class="size-4 shrink-0"></i> Tanggal Lahir</span>
                            <span class="font-bold text-sm">{{ $pelajar->tanggal_lahir }}</span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b border-border">
                            <span class="flex items-center gap-2 text-secondary text-sm"><i data-lucide="person-standing" class="size-4 shrink-0"></i> Jenis Kelamin</span>
                            <span class="font-bold text-sm">{{ $pelajar->jk }}</span>
                        </div>
                        <div class="flex justify-between items-center py-3">
                            <span class="flex items-center gap-2 text-secondary text-sm"><i data-lucide="user" class="size-4 shrink-0"></i> Nama Ayah</span>
                            <span class="font-bold text-sm">{{ $pelajar->nama_ayah }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Merah -->
        <div class="bg-gradient-to-br from-[#ff1443] to-[#c40030] rounded-2xl p-8 text-white flex flex-col gap-4">
            <div class="size-12 bg-white/20 rounded-xl flex items-center justify-center"><i data-lucide="shield-check" class="size-6 text-white"></i></div>
            <h3 class="text-lg font-bold">Verifikasi Data</h3>
            <p class="text-red-100 text-sm leading-relaxed flex-1">Pastikan semua data diri sesuai dengan dokumen kependudukan (KK/KTP/Akta Lahir/Ijazah pada jenjang sebelumnya) agar tidak terjadi kelasalah penulisan data pada Ijazah dan Transkrip Nilai.</p>
            <div class="p-4 bg-white/10 rounded-2xl border border-white/10">
                <p class="text-[10px] uppercase font-bold tracking-widest text-red-200">Status Verifikasi</p>
                <div class="flex items-center gap-2 mt-1">
                    <div class="size-2.5 rounded-full bg-emerald-400 animate-pulse"></div>
                    <p class="text-lg font-black">Terverifikasi</p>
                </div>
            </div>
            <button onclick="triggerGlobalModal({type:'info',title:'Hubungi Admin',message:'Hubungi admin sekolah untuk pembaruan data. Tersedia Senin–Jumat pukul 07:00–15:00.',confirmText:'Mengerti'})"
                class="w-full flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white py-3 rounded-xl text-sm font-bold transition-colors cursor-pointer border border-white/20">
                <i data-lucide="message-circle" class="size-4"></i> Hubungi Admin
            </button>
        </div>
    </div>
</div>
<!-- END PROFIL -->

@endsection