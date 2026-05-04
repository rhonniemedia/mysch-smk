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
            <div class="size-12 bg-warning/10 rounded-xl flex items-center justify-center">
                <i data-lucide="{{ $meta['icon'] ?? 'file-badge' }}" class="size-6 text-warning"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold text-foreground">Surat Keterangan Lulus</h2>
                <p class="text-xs text-secondary uppercase font-bold tracking-wider">Surat Keterangan Pengganti Ijazah Sementara</p>
            </div>
        </div>
        <p class="text-secondary text-sm leading-relaxed flex-1">
            {{ $meta['deskripsi'] ?? 'Surat Keterangan Lulus dapat digunakan sebagai pengganti ijazah sementara sebelum ijazah fisik diterbitkan.' }}
        </p>
        @if($sudahIsiTracer)
        <button onclick="triggerDownloadAndModal()"
            class="flex items-center justify-center gap-2 bg-primary text-white py-3.5 rounded-xl font-bold hover:bg-primary-hover transition-all cursor-pointer shadow-lg shadow-primary/20">
            <i data-lucide="download" class="size-5"></i> Unduh Surat Keterangan Lulus
        </button>

        <script>
            function triggerDownloadAndModal() {
                triggerGlobalModal({
                    type: 'success',
                    title: 'SKL Berhasil Diunduh',
                    message: 'Surat Keterangan Lulus Anda telah berhasil diunduh.',
                    confirmText: 'Oke'
                });

                setTimeout(() => {
                    window.location.href = "{{ route('skl.download') }}";
                }, 500);
            }
        </script>
        @else
        <button onclick="triggerGlobalModal({
            type: 'warning',
            title: 'Tracer Study Belum Diisi',
            message: 'Anda harus mengisi Tracer Study terlebih dahulu sebelum mengunduh SKL.',
            confirmText: 'Isi Sekarang',
            onConfirm: () => window.location.href = '{{ route('tracer.index') }}'
        })"
            class="flex items-center justify-center gap-2 bg-gray-400 text-white py-3.5 rounded-xl font-bold transition-all cursor-pointer shadow-lg">
            <i data-lucide="lock" class="size-5"></i> Unduh Surat Keterangan Lulus
        </button>
        @endif
    </div>
    <div class="bg-gradient-to-br from-[#ff1443] to-[#c40030] rounded-2xl p-8 text-white flex flex-col gap-4">
        <div class="size-12 bg-white/20 rounded-xl flex items-center justify-center">
            <i data-lucide="info" class="size-6 text-white"></i>
        </div>
        <h3 class="text-lg font-bold">Info Penting</h3>
        <p class="text-red-100 text-sm leading-relaxed flex-1">
            SKL ini bersifat sementara dan berlaku hingga ijazah fisik diterbitkan. Pastikan data pada SKL sesuai sebelum digunakan.
        </p>
        <div class="p-4 bg-white/10 rounded-2xl border border-white/10">
            <p class="text-xs text-red-200 font-bold uppercase tracking-widest mb-1">Berlaku Hingga</p>
            <p class="font-black">{{ $meta['berlaku_hingga'] ?? 'Terbit Ijazah' }}</p>
        </div>
    </div>
</div>
@endsection