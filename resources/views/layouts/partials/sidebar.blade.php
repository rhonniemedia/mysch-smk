<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="flex flex-col w-[280px] shrink-0 h-screen fixed inset-y-0 left-0 z-50 bg-white border-r border-border transform lg:translate-x-0 transition-transform duration-300 overflow-hidden">
  <div class="flex items-center justify-between border-b border-border h-[90px] px-5 gap-3">
    <div class="flex items-center gap-3">
      <div class="w-11 h-9 bg-primary rounded-xl flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-white">
          <path d="M18 21a8 8 0 0 0-16 0"></path>
          <circle cx="10" cy="8" r="5"></circle>
          <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"></path>
        </svg>
      </div>
      <div>
        <h1 class="font-bold text-xl leading-none">MySCH</h1>
        <p class="text-[9px] text-secondary tracking-widest font-semibold">SMK Negeri 1 Rejang Lebong</p>
      </div>
    </div>
    <button @click="sidebarOpen = false" aria-label="Close sidebar" class="lg:hidden size-11 flex shrink-0 bg-white rounded-xl p-[10px] items-center justify-center ring-1 ring-border hover:ring-primary transition-all duration-300 cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-6 text-secondary">
        <path d="M18 6 6 18"></path>
        <path d="m6 6 12 12"></path>
      </svg>
    </button>
  </div>

  <div class="flex flex-col p-5 pb-28 gap-6 overflow-y-auto flex-1">
    <div class="flex flex-col gap-4">
      <h3 class="font-medium text-sm text-secondary">Akademik</h3>
      <div class="flex flex-col gap-1">

        <!-- Beranda -->
        <a href="{{ route('student.dashboard') }}"
          class="{{ Request::is('dashboard') ? 'bg-muted' : 'bg-white hover:bg-muted' }} group w-full text-left flex items-center rounded-xl p-4 gap-3 transition-all duration-300 cursor-pointer">
          <i data-lucide="layout-dashboard" class="{{ Request::is('dashboard') ? 'text-foreground' : 'text-secondary group-hover:text-foreground' }} size-6 transition-all duration-300"></i>
          <span class="{{ Request::is('dashboard') ? 'font-semibold text-foreground' : 'font-medium text-secondary group-hover:text-foreground' }} transition-all duration-300">Beranda</span>
        </a>

        <!-- Profil Siswa -->
        <a href="{{ route('profile.index') }}"
          class="{{ Request::is('profile*') ? 'bg-muted' : 'bg-white hover:bg-muted' }} group w-full text-left flex items-center rounded-xl p-4 gap-3 transition-all duration-300 cursor-pointer">
          <i data-lucide="user-circle" class="{{ Request::is('profile*') ? 'text-foreground' : 'text-secondary group-hover:text-foreground' }} size-6 transition-all duration-300"></i>
          <span class="{{ Request::is('profile*') ? 'font-semibold text-foreground' : 'font-medium text-secondary group-hover:text-foreground' }} transition-all duration-300">Profil Siswa</span>
        </a>

        <!-- Tracer Study -->
        <a href="{{ route('tracer.index') }}"
          class="{{ Request::is('tracer*') ? 'bg-muted' : 'bg-white hover:bg-muted' }} group w-full text-left flex items-center rounded-xl p-4 gap-3 transition-all duration-300 cursor-pointer">
          <i data-lucide="file-text" class="{{ Request::is('tracer*') ? 'text-foreground' : 'text-secondary group-hover:text-foreground' }} size-6 transition-all duration-300"></i>
          <span class="{{ Request::is('tracer*') ? 'font-semibold text-foreground' : 'font-medium text-secondary group-hover:text-foreground' }} transition-all duration-300">Tracer Study</span>
        </a>

      </div>
    </div>

    <div class="flex flex-col gap-4">
      <h3 class="font-medium text-sm text-secondary">Informasi</h3>
      <div class="flex flex-col gap-1">

        <!-- Pengumuman -->
        <a href="#"
          class="{{ Request::is('announcement*') ? 'bg-muted' : 'bg-white hover:bg-muted' }} group w-full text-left flex items-center rounded-xl p-4 gap-3 transition-all duration-300 cursor-pointer">
          <i data-lucide="megaphone" class="{{ Request::is('announcement*') ? 'text-foreground' : 'text-secondary group-hover:text-foreground' }} size-6 transition-all duration-300"></i>
          <span class="{{ Request::is('announcement*') ? 'font-semibold text-foreground' : 'font-medium text-secondary group-hover:text-foreground' }} transition-all duration-300">Pengumuman</span>
        </a>

      </div>
    </div>
  </div>

  <div class="absolute bottom-0 left-0 w-[280px]">
    <div class="flex items-center justify-between border-t bg-white border-border p-5 gap-3">
      <div class="min-w-0">
        <p class="font-semibold text-foreground">{{ $namaUser }}</p>
        <a href="#" class="cursor-pointer"><span class="text-sm text-secondary hover:text-primary hover:underline transition-all duration-300">{{ $roleUser }}</span></a>
      </div>
      <div class="size-11 bg-primary/10 rounded-xl flex items-center justify-center flex-shrink-0">
        <!-- Tombol Logout -->
        <form method="POST" action="{{ route('logout') }}" x-data="{ loggingOut: false }" @submit="loggingOut = true">
          @csrf
          <button type="submit"
            :disabled="loggingOut"
            class="size-11 bg-error/10 hover:bg-error text-error hover:text-white rounded-xl flex items-center justify-center flex-shrink-0 transition-all duration-300 cursor-pointer group"
            title="Keluar">

            <!-- Spinner saat proses logout -->
            <svg x-show="loggingOut" class="animate-spin size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" x-cloak>
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>

            <!-- Ikon Logout (tampil jika tidak sedang loading) -->
            <i x-show="!loggingOut" data-lucide="log-out" class="size-6"></i>
          </button>
        </form>
      </div>
    </div>
  </div>
</aside>