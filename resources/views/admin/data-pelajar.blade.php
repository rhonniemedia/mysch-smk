@extends('layouts.admin')

@section('content')
<div class="mx-auto flex flex-col gap-6">

    {{-- Header --}}
    <div>
        <p class="text-xs text-secondary uppercase tracking-widest font-semibold mb-1">Admin / Data</p>
        <h1 class="text-foreground text-2xl md:text-3xl font-bold">Data Pelajar</h1>
    </div>

    <div class="flex flex-col rounded-2xl border border-border p-6 bg-white gap-6 mb-8">

        {{-- Toolbar --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h3 class="font-bold text-lg text-foreground">
                    Daftar Pelajar
                    <span class="text-sm font-normal text-secondary ml-2">{{ $pelajars->total() }} total</span>
                </h3>
                @if($search)
                <p class="text-xs text-secondary mt-0.5">
                    Hasil pencarian: <span class="font-semibold text-primary">"{{ $search }}"</span>
                    &mdash; <a href="{{ route('admin.data') }}" class="text-error hover:underline">Hapus filter</a>
                </p>
                @endif
            </div>
            <form method="GET" action="{{ route('admin.data') }}" class="flex items-center gap-2">
                <div class="relative">
                    <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 size-4 text-secondary"></i>
                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Cari nama, kelas, rombel..."
                        class="pl-9 pr-4 py-2 rounded-xl border border-border bg-white text-sm focus:ring-1 focus:ring-primary outline-none w-[220px] transition-all" />
                </div>
                @if($search)
                <a href="{{ route('admin.data') }}"
                    class="p-2 rounded-xl border border-border bg-white hover:bg-muted text-secondary transition-colors"
                    title="Reset pencarian">
                    <i data-lucide="x" class="size-4"></i>
                </a>
                @endif
            </form>
        </div>

        {{-- Tabel --}}
        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px] border-collapse">
                <thead class="border-b border-border">
                    <tr>
                        <th class="w-[34%] px-4 py-4 text-left text-sm font-bold text-foreground">Nama Pelajar</th>
                        <th class="w-[33%] px-4 py-4 text-left text-sm font-bold text-foreground">Tempat dan Tanggal Lahir</th>
                        <th class="w-[33%] px-4 py-4 text-left text-sm font-bold text-foreground">Kelas</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border bg-white">
                    @forelse($pelajars as $pelajar)
                    <tr class="hover:bg-muted transition-colors">

                        {{-- Nama + inisial avatar --}}
                        <td class="px-4 py-4">
                            <div class="flex items-center gap-3">
                                @php
                                $parts = explode(' ', trim($pelajar->nama));
                                $inisial = strtoupper(
                                substr($parts[0], 0, 1) .
                                (isset($parts[1]) ? substr($parts[1], 0, 1) : substr($parts[0], 1, 1))
                                );
                                $colors = ['bg-primary','bg-blue-500','bg-emerald-500','bg-amber-500','bg-purple-500','bg-rose-500'];
                                $color = $colors[crc32($pelajar->id) % count($colors)];
                                @endphp
                                <div class="size-10 rounded-full {{ $color }} flex items-center justify-center shrink-0">
                                    <span class="text-white font-black text-xs">{{ $inisial }}</span>
                                </div>
                                <div>
                                    <div class="font-semibold text-foreground">{{ $pelajar->nama }}</div>
                                    <div class="text-xs text-secondary">NISN: {{ $pelajar->nisn }}</div>
                                </div>
                            </div>
                        </td>

                        {{-- Jenis kelamin --}}
                        <td class="px-4 py-4">
                            <div class="text-sm font-medium text-foreground">
                                {{ $pelajar->tempat_lahir ?? '-' }}
                            </div>
                            <div class="text-xs text-secondary mt-0.5">
                                {{ $pelajar->tanggal_lahir_formatted ?? '' }}
                            </div>
                        </td>

                        {{-- Kelas --}}
                        <td class="px-4 py-4 text-sm text-foreground font-medium">
                            <div class="text-sm font-medium text-foreground">
                                {{ $pelajar->kelas }} {{ $pelajar->rombel }}
                            </div>
                            <div class="text-xs text-secondary mt-0.5">
                                {{ $pelajar->konsKeahlian?->keahlian ?? '' }}
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-16 text-center">
                            <div class="flex flex-col items-center gap-3 text-secondary">
                                <i data-lucide="users" class="size-10 opacity-30"></i>
                                <p class="text-sm font-medium">Belum ada data pelajar</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="pt-4 border-t border-border bg-white flex items-center justify-between">
            <p class="text-sm text-secondary">
                Menampilkan
                <span class="font-semibold text-foreground">{{ $pelajars->firstItem() ?? 0 }}</span>–<span class="font-semibold text-foreground">{{ $pelajars->lastItem() ?? 0 }}</span>
                dari
                <span class="font-semibold text-foreground">{{ $pelajars->total() }}</span> pelajar
            </p>
            <div class="flex items-center gap-2">
                {{-- Prev --}}
                @if($pelajars->onFirstPage())
                <button class="p-2 rounded-lg border border-border bg-white opacity-50 cursor-not-allowed" disabled>
                    <i data-lucide="chevron-left" class="size-4"></i>
                </button>
                @else
                <a href="{{ $pelajars->previousPageUrl() }}" class="p-2 rounded-lg border border-border bg-white hover:bg-muted transition-colors">
                    <i data-lucide="chevron-left" class="size-4"></i>
                </a>
                @endif

                {{-- Page numbers --}}
                @foreach($pelajars->getUrlRange(max(1, $pelajars->currentPage()-2), min($pelajars->lastPage(), $pelajars->currentPage()+2)) as $page => $url)
                <a href="{{ $url }}"
                    class="size-9 flex items-center justify-center rounded-lg border text-sm font-medium transition-colors
                    {{ $page === $pelajars->currentPage() ? 'bg-primary text-white border-primary' : 'border-border bg-white hover:bg-muted text-foreground' }}">
                    {{ $page }}
                </a>
                @endforeach

                {{-- Next --}}
                @if($pelajars->hasMorePages())
                <a href="{{ $pelajars->nextPageUrl() }}" class="p-2 rounded-lg border border-border bg-white hover:bg-muted transition-colors">
                    <i data-lucide="chevron-right" class="size-4"></i>
                </a>
                @else
                <button class="p-2 rounded-lg border border-border bg-white opacity-50 cursor-not-allowed" disabled>
                    <i data-lucide="chevron-right" class="size-4"></i>
                </button>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection