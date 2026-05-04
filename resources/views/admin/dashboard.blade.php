@extends('layouts.admin')

@section('content')

<!-- ===== DASHBOARD ===== -->
<div>
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6 md:mb-8">
        <div>
            <p class="text-xs text-secondary uppercase tracking-widest font-semibold mb-1">Beranda / Overview</p>
            <h1 class="text-foreground text-2xl md:text-3xl font-bold mb-1">Selamat Datang, {{ $namaUser }} 👋</h1>
            <p class="text-secondary text-sm md:text-base">Pantau status kelulusan dan dokumen akademik sekolah.</p>
        </div>
    </div>


</div>
<!-- END DASHBOARD -->

@endsection