@extends('layouts.app')

@section('title', 'Tracer Study - Alumni')

@section('content')

<!-- Wrapper x-data untuk mengontrol tampilan secara lokal di halaman ini -->
<div x-data="{ 
    tracerFilled: true, 
    tracerEditMode: false 
}">
    <!-- ===== HEADER ===== -->
    <div class="mb-6">
        <p class="text-xs text-secondary uppercase tracking-widest font-semibold mb-1">Beranda / Tracer Study</p>
        <h1 class="text-foreground text-2xl md:text-3xl font-bold">Tracer Study Alumni</h1>
    </div>

    <!-- TAMPILAN DATA (Muncul jika tracerFilled = true DAN tidak sedang edit) -->
    <div x-show="tracerFilled && !tracerEditMode" x-transition x-cloak>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 flex flex-col rounded-2xl border border-border bg-white overflow-hidden">
                <div class="px-8 pt-8 pb-2 flex flex-col sm:flex-row sm:items-start gap-5">
                    <div class="size-16 bg-success/10 rounded-2xl flex items-center justify-center shrink-0 border border-success/20">
                        <i data-lucide="clipboard-check" class="size-8 text-success"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h2 class="text-xl font-bold text-foreground">Data Tracer Study</h2>
                        <p class="text-secondary text-sm">Terisi pada 02 Mei 2026</p>
                        <span class="inline-flex items-center gap-1 mt-2 px-2.5 py-1 rounded-md text-xs font-bold bg-success/10 text-success-dark">
                            <i data-lucide="check-circle" class="size-3"></i> Sudah Diisi
                        </span>
                    </div>
                    <button @click="tracerEditMode = true; $nextTick(() => window.initLucide())"
                        class="flex items-center gap-2 bg-primary/10 text-primary px-5 py-2.5 rounded-xl font-bold text-sm hover:bg-primary/20 transition-colors cursor-pointer shrink-0 self-start">
                        <i data-lucide="pencil" class="size-4"></i> Edit Data
                    </button>
                </div>

                <div class="px-8 pb-8 mt-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Identitas -->
                        <div class="space-y-1">
                            <h4 class="text-[10px] font-bold text-primary uppercase tracking-[0.3em] mb-4">Identitas Alumni</h4>
                            <div class="flex justify-between items-center py-3 border-b border-border">
                                <span class="flex items-center gap-2 text-secondary text-sm"><i data-lucide="user" class="size-4"></i> Nama</span>
                                <span class="font-bold text-sm">Roni Saputra</span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-border">
                                <span class="flex items-center gap-2 text-secondary text-sm"><i data-lucide="hash" class="size-4"></i> NISN</span>
                                <span class="font-bold text-sm">0012345678</span>
                            </div>
                            <div class="flex justify-between items-center py-3">
                                <span class="flex items-center gap-2 text-secondary text-sm"><i data-lucide="phone" class="size-4"></i> No. HP</span>
                                <span class="font-bold text-sm">0812-3456-7890</span>
                            </div>
                        </div>
                        <!-- Status -->
                        <div class="space-y-1">
                            <h4 class="text-[10px] font-bold text-primary uppercase tracking-[0.3em] mb-4">Status Pasca Lulus</h4>
                            <div class="flex justify-between items-center py-3 border-b border-border">
                                <span class="flex items-center gap-2 text-secondary text-sm"><i data-lucide="briefcase" class="size-4"></i> Status</span>
                                <span class="px-2 py-1 rounded bg-success/10 text-success text-[10px] font-bold uppercase">Bekerja</span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-border">
                                <span class="flex items-center gap-2 text-secondary text-sm"><i data-lucide="building-2" class="size-4"></i> Instansi</span>
                                <span class="font-bold text-sm text-right">PT. Sinar Jaya</span>
                            </div>
                            <div class="flex justify-between items-start py-3">
                                <span class="flex items-center gap-2 text-secondary text-sm mt-0.5"><i data-lucide="message-square" class="size-4"></i> Kesan</span>
                                <span class="font-bold text-sm text-right max-w-[60%] leading-relaxed">Sekolah yang sangat mendukung perkembangan siswa.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Info Samping -->
            <div class="bg-gradient-to-br from-[#ff1443] to-[#c40030] rounded-2xl p-8 text-white flex flex-col gap-4 shadow-xl shadow-red-500/20">
                <div class="size-12 bg-white/20 rounded-xl flex items-center justify-center"><i data-lucide="check-circle" class="size-6 text-white"></i></div>
                <h3 class="text-lg font-bold">Tracer Study Selesai</h3>
                <p class="text-red-100 text-sm leading-relaxed flex-1">Data Anda telah disimpan. Partisipasi Anda sangat membantu akreditasi sekolah.</p>
                <div class="p-4 bg-white/10 rounded-2xl border border-white/10">
                    <p class="text-xs text-red-200 font-bold uppercase tracking-widest mb-1">Partisipasi Alumni</p>
                    <p class="text-2xl font-black">69%</p>
                    <div class="mt-2 bg-white/10 rounded-full h-1.5">
                        <div class="bg-amber-300 h-1.5 rounded-full" style="width:69%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TAMPILAN FORM (Muncul jika belum diisi ATAU sedang edit) -->
    <div x-show="!tracerFilled || tracerEditMode" x-transition x-cloak>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 flex flex-col rounded-2xl border border-border p-8 bg-white gap-6">
                <div class="flex items-center gap-4">
                    <div class="size-12 bg-success/10 rounded-xl flex items-center justify-center"><i data-lucide="clipboard-list" class="size-6 text-success"></i></div>
                    <div>
                        <h2 class="text-xl font-bold text-foreground" x-text="tracerEditMode ? 'Edit Data Alumni' : 'Pengisian Data Alumni'"></h2>
                        <p class="text-xs text-secondary uppercase font-bold tracking-wider">Silakan lengkapi formulir di bawah ini</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[10px] font-bold text-secondary uppercase mb-2">Nama Lengkap</label>
                        <input type="text" value="Roni Saputra" class="w-full border border-border rounded-xl p-3 text-sm focus:ring-1 focus:ring-primary outline-none" />
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-secondary uppercase mb-2">NISN</label>
                        <input type="text" value="0012345678" class="w-full border border-border rounded-xl p-3 text-sm bg-muted text-secondary outline-none" readonly />
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-secondary uppercase mb-2">No. HP / WhatsApp</label>
                        <input type="text" placeholder="08XX-XXXX-XXXX" class="w-full border border-border rounded-xl p-3 text-sm focus:ring-1 focus:ring-primary outline-none" />
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-secondary uppercase mb-2">Status Pasca Lulus</label>
                        <select class="w-full border border-border rounded-xl p-3 text-sm focus:ring-1 focus:ring-primary outline-none bg-white">
                            <option>-- Pilih Status --</option>
                            <option selected>Bekerja</option>
                            <option>Wirausaha</option>
                            <option>Melanjutkan Kuliah</option>
                            <option>Mencari Kerja</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-bold text-secondary uppercase mb-2">Instansi / Perusahaan / Kampus</label>
                        <input type="text" placeholder="Contoh: Universitas Terbuka / PT. Sinar Jaya" class="w-full border border-border rounded-xl p-3 text-sm focus:ring-1 focus:ring-primary outline-none" />
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-bold text-secondary uppercase mb-2">Kesan Selama Bersekolah</label>
                        <textarea rows="4" class="w-full border border-border rounded-xl p-3 text-sm focus:ring-1 focus:ring-primary outline-none resize-none" placeholder="Tuliskan pengalaman berkesan Anda..."></textarea>
                    </div>
                </div>

                <div class="flex gap-3 pt-2">
                    <button
                        @click="tracerFilled = true; tracerEditMode = false; $nextTick(() => window.initLucide()); triggerGlobalModal({type:'success',title:'Data Tersimpan!',message:'Data tracer study berhasil diperbarui.',confirmText:'Oke'})"
                        class="flex items-center gap-2 bg-success text-white px-8 py-3 rounded-xl font-bold hover:bg-success-dark transition-all duration-300 shadow-lg shadow-success/20 cursor-pointer">
                        <i data-lucide="save" class="size-4"></i> Simpan Data
                    </button>
                    <button x-show="tracerEditMode" @click="tracerEditMode = false" class="text-secondary font-bold px-6 py-3 rounded-xl border border-border hover:bg-muted transition-colors cursor-pointer">Batal</button>
                </div>
            </div>

            <!-- Card Info Edukasi -->
            <div class="bg-gradient-to-br from-[#ff1443] to-[#c40030] rounded-2xl p-8 text-white flex flex-col gap-4">
                <div class="size-12 bg-white/20 rounded-xl flex items-center justify-center"><i data-lucide="lightbulb" class="size-6 text-amber-300"></i></div>
                <h3 class="text-lg font-bold">Pentingnya Tracer Study</h3>
                <p class="text-red-100 text-sm leading-relaxed">Informasi Anda membantu sekolah mengevaluasi kualitas lulusan dan mempermudah layanan alumni di masa depan.</p>
                <div class="mt-auto p-4 bg-white/10 rounded-2xl border border-white/10">
                    <p class="text-[10px] uppercase font-bold tracking-widest text-red-200">Target Partisipasi</p>
                    <p class="text-xl font-black mt-1">100% Alumni</p>
                    <div class="mt-2 bg-white/10 rounded-full h-2">
                        <div class="bg-amber-300 h-2 rounded-full" style="width: 68%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection