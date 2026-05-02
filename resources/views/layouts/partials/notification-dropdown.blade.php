<div class="relative" x-data="{ openNotif: false }">
    <button @click="openNotif = !openNotif" class="size-11 flex items-center justify-center rounded-xl ring-1 ring-border hover:ring-primary transition-all duration-300 cursor-pointer relative" aria-label="Notifications">
        <i data-lucide="bell" class="size-6 text-secondary"></i>
        <span class="absolute -top-1 -right-1 h-5 px-1.5 rounded-full bg-error text-white text-xs font-medium flex items-center justify-center">2</span>
    </button>

    <div x-show="openNotif" 
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        @click.away="openNotif = false"
        class="absolute right-0 top-full mt-2 w-80 sm:w-96 bg-white rounded-2xl shadow-2xl border border-border z-[100] overflow-hidden"
        style="display: none;">
    
    <div class="px-4 py-3 border-b border-border flex items-center justify-between bg-gray-50">
        <h3 class="font-bold text-foreground">Notifikasi</h3>
        <button class="text-xs font-medium text-primary hover:underline cursor-pointer">Tandai sudah dibaca</button>
    </div>
    
    <div class="max-h-[320px] overflow-y-auto flex flex-col scrollbar-hide">
        <!-- Notifikasi 1 -->
        <a href="#" class="flex gap-3 p-4 border-b border-border hover:bg-muted transition-colors bg-blue-50/30">
        <div class="size-10 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
            <i data-lucide="award" class="size-5 text-primary"></i>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-sm font-semibold text-foreground">Pengumuman Kelulusan Resmi</p>
            <p class="text-xs text-secondary line-clamp-2 mt-0.5">Silakan unduh Surat Keterangan Lulus (SKL) Anda di menu pengumuman.</p>
            <p class="text-[10px] text-secondary mt-1">10 Menit yang lalu</p>
        </div>
        <div class="size-2 rounded-full bg-primary mt-1.5 shrink-0"></div>
        </a>
        
        <!-- Notifikasi 2 -->
        <a href="#" class="flex gap-3 p-4 border-b border-border hover:bg-muted transition-colors bg-blue-50/30">
        <div class="size-10 rounded-full bg-success/10 flex items-center justify-center shrink-0">
            <i data-lucide="file-check-2" class="size-5 text-success"></i>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-sm font-semibold text-foreground">Nilai e-Rapor Divalidasi</p>
            <p class="text-xs text-secondary line-clamp-2 mt-0.5">Wali kelas telah memvalidasi nilai akhir semester genap Anda.</p>
            <p class="text-[10px] text-secondary mt-1">1 Jam yang lalu</p>
        </div>
        <div class="size-2 rounded-full bg-primary mt-1.5 shrink-0"></div>
        </a>

        <!-- Notifikasi 3 -->
        <a href="#" class="flex gap-3 p-4 border-b border-border hover:bg-muted transition-colors">
        <div class="size-10 rounded-full bg-warning/10 flex items-center justify-center shrink-0">
            <i data-lucide="calendar" class="size-5 text-warning-dark"></i>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-sm font-semibold text-foreground">Jadwal Ujian Kelulusan</p>
            <p class="text-xs text-secondary line-clamp-2 mt-0.5">Cek jadwal ujian praktik yang akan dilaksanakan minggu depan.</p>
            <p class="text-[10px] text-secondary mt-1">Kemarin</p>
        </div>
        </a>
    </div>
    
    <a href="#" class="block p-3 text-center text-sm font-semibold text-primary hover:bg-muted transition-colors bg-gray-50 border-t border-border">
        Lihat Semua Notifikasi
    </a>
    </div>
</div>