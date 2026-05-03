<div class="flex items-center justify-between w-full h-[90px] shrink-0 border-b border-border bg-white px-5 md:px-8">
  <button
    @click="sidebarOpen = true"
    aria-label="Open menu"
    class="lg:hidden size-11 flex items-center justify-center rounded-xl ring-1 ring-border hover:ring-primary transition-all duration-300 cursor-pointer">
    <i data-lucide="menu" class="size-6 text-foreground"></i>
  </button>
  <h2 class="hidden lg:block font-bold text-2xl text-foreground">
    {{ $title }}
  </h2>

  <div class="flex items-center gap-3">

    <!-- Tombol Pencarian -->

    <!-- Tombol Notifikasi -->
    <div class="relative" x-data="{ openNotif: false }">
      <button
        @click="openNotif = !openNotif"
        class="size-11 flex items-center justify-center rounded-xl ring-1 ring-border hover:ring-primary transition-all duration-300 cursor-pointer relative"
        aria-label="Notifications">
        <i data-lucide="bell" class="size-6 text-secondary"></i>
        @if($unreadCount > 0)
        <span class="absolute -top-1 -right-1 h-5 px-1.5 rounded-full bg-error text-white text-xs font-medium flex items-center justify-center">
          {{ $unreadCount > 99 ? '99+' : $unreadCount }}
        </span>
        @endif
      </button>

      <div
        x-show="openNotif"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        @click.away="openNotif = false"
        class="absolute right-0 top-full mt-2 w-80 sm:w-96 bg-white rounded-2xl shadow-2xl border border-border z-[100] overflow-hidden"
        style="display: none">
        <div
          class="px-4 py-3 border-b border-border flex items-center justify-between bg-gray-50">
          <h3 class="font-bold text-foreground">Notifications</h3>
        </div>

        <div class="max-h-[320px] overflow-y-auto flex flex-col scrollbar-hide">

          @forelse($unreadPengumuman as $notif)
          <a href="{{ route('announcement.show', $notif->id) }}"
            class="flex gap-3 p-4 border-b border-border hover:bg-muted transition-colors bg-blue-50/30">
            <div class="size-10 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
              <i data-lucide="megaphone" class="size-5 text-primary"></i>
            </div>
            <div class="flex-1 min-w-0">
              <p class="text-sm font-semibold text-foreground line-clamp-1">
                {{ $notif->judul }}
              </p>
              <p class="text-xs text-secondary line-clamp-2 mt-0.5">
                {{ $notif->konten_dinamis['deskripsi'] ?? 'Klik untuk melihat detail.' }}
              </p>
              <p class="text-[10px] text-secondary mt-1">
                {{ $notif->jadwal_tayang->diffForHumans() }}
              </p>
            </div>
            <div class="size-2 rounded-full bg-primary mt-1.5 shrink-0"></div>
          </a>
          @empty
          <div class="flex flex-col items-center justify-center py-10 text-secondary">
            <i data-lucide="bell-off" class="size-8 mb-2 opacity-40"></i>
            <p class="text-sm">Semua pengumuman sudah dibaca</p>
          </div>
          @endforelse

        </div>

        <a href="{{ route('announcement.index') }}"
          class="block p-3 text-center text-sm font-semibold text-primary hover:bg-muted transition-colors bg-gray-50 border-t border-border">
          Lihat Semua Pengumuman
        </a>

      </div>
    </div>

    <div
      class="hidden md:flex items-center gap-3 pl-3 border-l border-border relative"
      x-data="{ openProfile: false }">

      <div
        class="text-right cursor-pointer"
        @click="openProfile = !openProfile">
        <p class="font-semibold text-foreground text-sm">{{ $namaUser }}</p>
        <p class="text-secondary text-xs">{{ $roleUser }}</p>
      </div>

      {{-- Avatar inisial --}}
      <div
        class="size-11 rounded-full bg-primary flex items-center justify-center ring-2 ring-border cursor-pointer shrink-0"
        @click="openProfile = !openProfile">
        <span class="text-white font-black text-sm">{{ $inisial }}</span>
      </div>

      <div
        x-show="openProfile"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        @click.away="openProfile = false"
        class="absolute right-0 top-full mt-2 w-56 bg-white rounded-2xl shadow-2xl border border-border z-[100]"
        style="display: none">
        <div class="p-2">

          {{-- Info user di atas --}}
          <div class="flex items-center gap-3 px-2 py-2 mb-1">
            <div class="size-9 rounded-full bg-primary flex items-center justify-center shrink-0">
              <span class="text-white font-black text-xs">{{ $inisial }}</span>
            </div>
            <div class="min-w-0">
              <p class="font-bold text-sm text-foreground truncate">{{ $namaUser }}</p>
              <p class="text-xs text-secondary">{{ $roleUser }}</p>
            </div>
          </div>

          <hr class="my-1 border-border" />


          <a href="/profile"
            class="flex items-center gap-2 px-2 py-2 rounded-md text-sm text-secondary hover:bg-muted hover:text-primary transition-colors">
            <i data-lucide="user" class="size-4"></i> My Profile
          </a>

          <a href="#"
            class="flex items-center gap-2 px-2 py-2 rounded-md text-sm text-secondary hover:bg-muted hover:text-primary transition-colors">
            <i data-lucide="settings" class="size-4"></i> Account Settings
          </a>

          <hr class="my-1 border-border" />


          <a href="{{ route('logout') }}"
            class="flex items-center gap-2 px-2 py-2 rounded-md text-sm text-error hover:bg-error/10 transition-colors"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i data-lucide="log-out" class="size-4"></i>
            <span>Sign Out</span>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
</div>