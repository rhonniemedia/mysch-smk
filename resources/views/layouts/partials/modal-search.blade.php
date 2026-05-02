<div x-data="{ openSearch: false }"
     @open-search.window="openSearch = true; $nextTick(() => document.getElementById('search-input').focus())"
     @keydown.window.prevent.cmd.k="openSearch = true; $nextTick(() => document.getElementById('search-input').focus())"
     @keydown.window.prevent.ctrl.k="openSearch = true; $nextTick(() => document.getElementById('search-input').focus())"
     @keydown.escape.window="openSearch = false"
     class="relative z-[100]"
     x-show="openSearch"
     style="display: none;">
     
  <div class="fixed inset-0 bg-black/50 transition-opacity" x-show="openSearch" x-transition.opacity></div>
  <div class="fixed inset-0 flex items-center justify-center p-4">
    <div @click.away="openSearch = false" 
         x-show="openSearch" 
         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95 -translate-y-10" x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-95 -translate-y-10"
         class="bg-white rounded-xl w-full max-w-2xl max-h-[80vh] flex flex-col overflow-hidden shadow-2xl">
      <div class="p-4 border-b border-border">
        <div class="flex items-center gap-3 bg-muted rounded-xl px-4">
          <i data-lucide="search" class="size-5 text-secondary"></i>
          <input type="text" id="search-input" placeholder="Cari pengumuman, nilai, atau jadwal..." class="flex-1 py-3 bg-transparent outline-none text-foreground placeholder:text-secondary">
          <kbd class="hidden sm:inline-flex items-center gap-1 px-2 py-1 bg-white rounded-lg text-xs text-secondary border border-border">ESC</kbd>
        </div>
      </div>
      <div class="p-4 overflow-y-auto max-h-[60vh]">
        <p class="text-sm text-secondary mb-3">Terbaru</p>
        <div class="flex flex-col gap-2">
          <a href="#" class="flex items-center gap-3 p-3 rounded-xl hover:bg-muted transition-all cursor-pointer">
            <div class="size-10 bg-primary/10 rounded-xl flex items-center justify-center">
              <i data-lucide="file-text" class="size-5 text-primary"></i>
            </div>
            <div class="flex-1 min-w-0">
                <p class="font-medium text-foreground truncate">Jadwal Ujian Semester Genap</p>
                <p class="text-sm text-secondary truncate">Dokumen PDF</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>