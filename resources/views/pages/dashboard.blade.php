@extends('layouts.app')

@section('title', 'Talent Overview - Dashboard')

@section('content')

<!-- ===== DASHBOARD ===== -->
<div>
  <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6 md:mb-8">
    <div>
      <p class="text-xs text-secondary uppercase tracking-widest font-semibold mb-1">Beranda / Overview</p>
      <h1 class="text-foreground text-2xl md:text-3xl font-bold mb-1">Selamat Datang, Roni 👋</h1>
      <p class="text-secondary text-sm md:text-base">Pantau status kelulusan dan dokumen akademik Anda.</p>
    </div>
    <div class="flex items-center gap-3">
      <button onclick="triggerGlobalModal({type:'info',title:'Hubungi Admin',message:'Silakan hubungi admin sekolah melalui WhatsApp untuk pertanyaan seputar data akademik.',confirmText:'Mengerti'})"
        class="flex items-center justify-center gap-2 px-4 md:px-6 py-3 ring-1 ring-border hover:ring-primary rounded-full text-foreground font-semibold transition-all duration-300 cursor-pointer">
        <i data-lucide="help-circle" class="w-5 h-5"></i><span>Bantuan</span>
      </button>
      <a href="{{ route('tracer.index') }}"
        class="flex items-center justify-center gap-2 px-4 md:px-6 py-3 bg-primary text-white rounded-full font-bold hover:bg-primary-hover transition-all duration-300 cursor-pointer">
        <i data-lucide="file-pen" class="w-5 h-5"></i>
        <span>Isi Tracer Study</span>
      </a>
    </div>
  </div>

  <!-- Hero Card: warna hijau (adopsi dari card laman kelulusan) -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <div class="lg:col-span-2 bg-gradient-to-br from-success to-emerald-700 rounded-2xl p-8 text-white flex flex-col md:flex-row items-center gap-6 shadow-xl shadow-success/20 relative overflow-hidden">
      <div class="absolute top-0 right-0 w-48 h-48 bg-white/5 rounded-full -translate-y-16 translate-x-16"></div>
      <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/5 rounded-full translate-y-10 -translate-x-8"></div>
      <div class="w-24 h-24 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/30 shrink-0 z-10">
        <i data-lucide="user" class="w-12 h-12 text-white"></i>
      </div>
      <div class="text-center md:text-left flex-1 z-10">
        <h2 class="text-2xl font-bold">Roni Saputra</h2>
        <p class="text-emerald-100 text-sm mt-1">XII Manajemen Perkantoran · NISN: 0012345678</p>
        <p class="text-emerald-100 text-sm">roni.saputra@mysch.id</p>
        <div class="mt-4 flex flex-wrap justify-center md:justify-start gap-2">
          <span class="bg-white/10 px-3 py-1 rounded-full text-[10px] font-bold tracking-widest uppercase border border-white/20">Siswa Aktif</span>
          <span class="bg-white/20 px-3 py-1 rounded-full text-[10px] font-bold tracking-widest uppercase border border-white/30">Lulus 2026</span>
        </div>
      </div>
      <div class="text-center z-10">
        <p class="text-emerald-200 text-xs uppercase tracking-widest font-bold mb-1">Yudisium</p>
        <p class="text-white text-xl font-black">20 Jun 2026</p>
      </div>
    </div>
    <div class="flex flex-col rounded-2xl border border-border p-6 bg-white gap-4">
      <div class="size-11 bg-primary/10 rounded-xl flex items-center justify-center">
        <i data-lucide="headphones" class="size-6 text-primary"></i>
      </div>
      <div>
        <h3 class="font-bold text-foreground mb-1">Butuh Bantuan?</h3>
        <p class="text-sm text-secondary leading-relaxed">Hubungi admin sekolah jika terdapat ketidaksesuaian data pada profil atau dokumen Anda.</p>
      </div>
      <button onclick="triggerGlobalModal({type:'info',title:'Hubungi Admin WhatsApp',message:'Admin sekolah tersedia Senin–Jumat pukul 07:00–15:00. Nomor: 0812-XXXX-XXXX.',confirmText:'Mengerti'})"
        class="mt-auto w-full flex items-center justify-center gap-2 bg-muted hover:bg-primary/10 text-primary py-3 rounded-xl text-sm font-bold transition-colors cursor-pointer">
        <i data-lucide="message-circle" class="size-4"></i> Hubungi Admin
      </button>
    </div>
  </div>

  <!-- Quick Status Cards -->
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
    <div class="flex flex-col rounded-2xl border border-border p-5 gap-3 bg-white">
      <div class="size-10 bg-success/10 rounded-xl flex items-center justify-center"><i data-lucide="printer" class="size-5 text-success"></i></div>
      <p class="text-xs font-bold text-secondary uppercase tracking-wide">SKL Online</p>
      <span class="inline-flex items-center gap-1.5 text-sm font-bold text-success"><i data-lucide="check-circle" class="size-4"></i> Tersedia</span>
    </div>
    <div class="flex flex-col rounded-2xl border border-border p-5 gap-3 bg-white">
      <div class="size-10 bg-error/10 rounded-xl flex items-center justify-center"><i data-lucide="file-edit" class="size-5 text-error"></i></div>
      <p class="text-xs font-bold text-secondary uppercase tracking-wide">Tracer Study</p>
      <span class="inline-flex items-center gap-1.5 text-sm font-bold text-error"><i data-lucide="alert-circle" class="size-4"></i> Belum Diisi</span>
    </div>
    <div class="flex flex-col rounded-2xl border border-border p-5 gap-3 bg-white">
      <div class="size-10 bg-warning/10 rounded-xl flex items-center justify-center"><i data-lucide="book-open" class="size-5 text-warning"></i></div>
      <p class="text-xs font-bold text-secondary uppercase tracking-wide">Ijazah Fisik</p>
      <span class="inline-flex items-center gap-1.5 text-sm font-bold text-secondary"><i data-lucide="clock" class="size-4"></i> Menunggu Blangko</span>
    </div>
    <div class="flex flex-col rounded-2xl border border-border p-5 gap-3 bg-white">
      <div class="size-10 bg-primary/10 rounded-xl flex items-center justify-center"><i data-lucide="calendar-star" class="size-5 text-primary"></i></div>
      <p class="text-xs font-bold text-secondary uppercase tracking-wide">Yudisium</p>
      <span class="text-sm font-bold text-foreground">20 Juni 2026</span>
    </div>
  </div>

  <!-- Layanan Utama -->
  <div>
    <h3 class="font-bold text-lg text-foreground mb-4">Layanan Utama</h3>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
      <!-- Card Pengumuman -->
      <a href="{{ route('announcement.index') }}"
        class="group flex flex-col rounded-2xl border-2 border-border hover:border-primary p-6 bg-white transition-all duration-300 cursor-pointer hover:shadow-xl">
        <div class="size-14 bg-primary/10 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
          <i data-lucide="megaphone" class="size-7 text-primary"></i>
        </div>
        <h4 class="font-bold text-lg text-foreground mb-1">Pengumuman</h4>
        <p class="text-secondary text-sm leading-relaxed flex-1">Lihat pengumuman kelulusan dan informasi penting dari sekolah.</p>
        <div class="mt-4 flex items-center gap-1 text-primary text-sm font-semibold">
          <span>Lihat Sekarang</span>
          <i data-lucide="arrow-right" class="size-4 group-hover:translate-x-1 transition-transform"></i>
        </div>
      </a>

      <!-- Card Tracer Study -->
      <a href="{{ route('tracer.index') }}"
        class="group flex flex-col rounded-2xl border-2 border-border hover:border-success p-6 bg-white transition-all duration-300 cursor-pointer hover:shadow-xl">
        <div class="size-14 bg-success/10 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
          <i data-lucide="file-text" class="size-7 text-success"></i>
        </div>
        <h4 class="font-bold text-lg text-foreground mb-1">Tracer Study</h4>
        <p class="text-secondary text-sm leading-relaxed flex-1">Wajib diisi oleh seluruh alumni untuk pendataan karir dan pendidikan lanjutan.</p>
        <div class="mt-4 flex items-center gap-1 text-success text-sm font-semibold">
          <span>Isi Formulir</span>
          <i data-lucide="arrow-right" class="size-4 group-hover:translate-x-1 transition-transform"></i>
        </div>
      </a>

      <!-- Card Profil Siswa -->
      <a href="{{ route('profile.index') }}"
        class="group flex flex-col rounded-2xl border-2 border-border hover:border-warning p-6 bg-white transition-all duration-300 cursor-pointer hover:shadow-xl">
        <div class="size-14 bg-warning/10 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
          <i data-lucide="user-circle" class="size-7 text-warning"></i>
        </div>
        <h4 class="font-bold text-lg text-foreground mb-1">Profil Siswa</h4>
        <p class="text-secondary text-sm leading-relaxed flex-1">Verifikasi data diri sesuai dengan dokumen kependudukan (KK/KTP).</p>
        <div class="mt-4 flex items-center gap-1 text-warning text-sm font-semibold">
          <span>Lihat Profil</span>
          <i data-lucide="arrow-right" class="size-4 group-hover:translate-x-1 transition-transform"></i>
        </div>
      </a>
    </div>
  </div>
</div>
<!-- END DASHBOARD -->

@endsection