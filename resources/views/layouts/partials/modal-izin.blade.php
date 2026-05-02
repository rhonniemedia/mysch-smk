<div x-data="{ openAdd: false }" 
     @open-add-modal.window="openAdd = true" {{-- Listener ini menangkap trigger dari tombol --}}
     class="relative z-[100]" 
     x-show="openAdd" 
     style="display: none;">
  <div class="fixed inset-0 bg-black/50 transition-opacity" x-show="openAdd" x-transition.opacity></div>
  <div class="fixed inset-0 flex items-center justify-center p-4">
    <div @click.away="openAdd = false" 
         x-show="openAdd" 
         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95 -translate-y-10" x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-95 -translate-y-10"
         class="bg-white rounded-xl w-full max-w-lg flex flex-col max-h-[90vh] overflow-hidden shadow-2xl">
      <div class="p-6 border-b border-border flex items-center justify-between shrink-0">
        <h3 class="font-bold text-xl text-foreground">Kirim Keterangan Izin</h3>
        <button @click="openAdd = false" class="p-2 hover:bg-muted rounded-xl transition-colors cursor-pointer"><i data-lucide="x" class="size-5 text-secondary"></i></button>
      </div>
      <div class="p-6 overflow-y-auto flex-1">
        <form class="flex flex-col gap-4">
          <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-foreground">Judul Keterangan</label>
            <input type="text" placeholder="Contoh: Sakit Demam Berdarah" class="w-full p-3 rounded-xl border border-border focus:ring-1 focus:ring-primary outline-none transition-all">
          </div>
          <div class="grid grid-cols-2 gap-4">
             <div class="flex flex-col gap-2">
              <label class="text-sm font-medium text-foreground">Kategori</label>
              <select class="w-full p-3 rounded-xl border border-border focus:ring-1 focus:ring-primary outline-none transition-all appearance-none">
                <option>Sakit</option><option>Izin Pribadi</option><option>Izin Lomba/Sekolah</option>
              </select>
            </div>
            <div class="flex flex-col gap-2">
              <label class="text-sm font-medium text-foreground">Tanggal</label>
              <input type="date" class="w-full p-3 rounded-xl border border-border focus:ring-1 focus:ring-primary outline-none transition-all">
            </div>
          </div>
          <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-foreground">Lampiran (Foto Surat Dokter dll)</label>
            <input type="file" class="w-full p-3 rounded-xl border border-border focus:ring-1 focus:ring-primary outline-none transition-all">
          </div>
        </form>
      </div>
      <div class="p-6 border-t border-border flex justify-end gap-3 shrink-0">
        <button @click="openAdd = false" class="px-6 py-3 rounded-xl border border-border font-medium text-secondary hover:bg-muted transition-colors cursor-pointer">Batal</button>
        <button @click="openAdd = false; setTimeout(() => { triggerGlobalModal({ type: 'success', title: 'Berhasil!', message: 'Surat Keterangan Izin Anda telah terkirim ke Wali Kelas.', confirmText: 'Lanjutkan' }) }, 300)" class="px-6 py-3 rounded-xl bg-primary text-white font-bold hover:bg-primary-hover transition-colors cursor-pointer">Kirim Laporan</button>
      </div>
    </div>
  </div>
</div>