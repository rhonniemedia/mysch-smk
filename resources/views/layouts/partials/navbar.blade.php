<div class="flex items-center justify-between w-full h-[90px] shrink-0 border-b border-border bg-white px-5 md:px-8">
  <button
    @click="sidebarOpen = true"
    aria-label="Open menu"
    class="lg:hidden size-11 flex items-center justify-center rounded-xl ring-1 ring-border hover:ring-primary transition-all duration-300 cursor-pointer">
    <i data-lucide="menu" class="size-6 text-foreground"></i>
  </button>
  <h2 class="hidden lg:block font-bold text-2xl text-foreground">
    Dashboard
  </h2>

  <div class="flex items-center gap-3">
    <button
      @click="$dispatch('open-search')"
      class="size-11 flex items-center justify-center rounded-xl ring-1 ring-border hover:ring-primary transition-all duration-300 cursor-pointer"
      aria-label="Search">
      <i data-lucide="search" class="size-6 text-secondary"></i>
    </button>

    <div class="relative" x-data="{ openNotif: false }">
      <button
        @click="openNotif = !openNotif"
        class="size-11 flex items-center justify-center rounded-xl ring-1 ring-border hover:ring-primary transition-all duration-300 cursor-pointer relative"
        aria-label="Notifications">
        <i data-lucide="bell" class="size-6 text-secondary"></i>
        <span
          class="absolute -top-1 -right-1 h-5 px-1.5 rounded-full bg-error text-white text-xs font-medium flex items-center justify-center">5</span>
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
          <button
            class="text-xs font-medium text-primary hover:underline cursor-pointer">
            Mark all as read
          </button>
        </div>

        <div
          class="max-h-[320px] overflow-y-auto flex flex-col scrollbar-hide">
          <a
            href="#"
            class="flex gap-3 p-4 border-b border-border hover:bg-muted transition-colors bg-blue-50/30">
            <div
              class="size-10 rounded-full bg-primary/10 flex items-center justify-center shrink-0">
              <i
                data-lucide="calendar-check"
                class="size-5 text-primary"></i>
            </div>
            <div class="flex-1 min-w-0">
              <p class="text-sm font-semibold text-foreground">
                Leave Request Approved
              </p>
              <p class="text-xs text-secondary line-clamp-2 mt-0.5">
                Your leave request for Oct 25-27 has been approved by
                management.
              </p>
              <p class="text-[10px] text-secondary mt-1">2 mins ago</p>
            </div>
            <div
              class="size-2 rounded-full bg-primary mt-1.5 shrink-0"></div>
          </a>

          <a
            href="#"
            class="flex gap-3 p-4 border-b border-border hover:bg-muted transition-colors bg-blue-50/30">
            <div
              class="size-10 rounded-full bg-success/10 flex items-center justify-center shrink-0">
              <i
                data-lucide="user-plus"
                class="size-5 text-success"></i>
            </div>
            <div class="flex-1 min-w-0">
              <p class="text-sm font-semibold text-foreground">
                New Team Member
              </p>
              <p class="text-xs text-secondary line-clamp-2 mt-0.5">
                Cameron Williamson has joined the Engineering team.
              </p>
              <p class="text-[10px] text-secondary mt-1">1 hour ago</p>
            </div>
            <div
              class="size-2 rounded-full bg-primary mt-1.5 shrink-0"></div>
          </a>

          <a
            href="#"
            class="flex gap-3 p-4 border-b border-border hover:bg-muted transition-colors">
            <div
              class="size-10 rounded-full bg-warning/10 flex items-center justify-center shrink-0">
              <i
                data-lucide="file-text"
                class="size-5 text-warning-dark"></i>
            </div>
            <div class="flex-1 min-w-0">
              <p class="text-sm font-semibold text-foreground">
                Q3 Report Available
              </p>
              <p class="text-xs text-secondary line-clamp-2 mt-0.5">
                The Q3 Performance review report is now available for
                download.
              </p>
              <p class="text-[10px] text-secondary mt-1">Yesterday</p>
            </div>
          </a>

          <a
            href="#"
            class="flex gap-3 p-4 border-b border-border hover:bg-muted transition-colors">
            <div
              class="size-10 rounded-full bg-info/10 flex items-center justify-center shrink-0">
              <i
                data-lucide="message-square"
                class="size-5 text-info"></i>
            </div>
            <div class="flex-1 min-w-0">
              <p class="text-sm font-semibold text-foreground">
                New Message
              </p>
              <p class="text-xs text-secondary line-clamp-2 mt-0.5">
                HR Dept sent a message regarding your recent inquiry.
              </p>
              <p class="text-[10px] text-secondary mt-1">2 days ago</p>
            </div>
          </a>
        </div>

        <a
          href="#"
          class="block p-3 text-center text-sm font-semibold text-primary hover:bg-muted transition-colors bg-gray-50 border-t border-border">
          View All Notifications
        </a>
      </div>
    </div>

    <div
      class="hidden md:flex items-center gap-3 pl-3 border-l border-border relative"
      x-data="{ openProfile: false }">
      <div
        class="text-right cursor-pointer"
        @click="openProfile = !openProfile">
        <p class="font-semibold text-foreground text-sm">
          Sarah Connor
        </p>
        <p class="text-secondary text-xs">HR Director</p>
      </div>
      <img
        src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&h=100&fit=crop"
        alt="Profile"
        class="size-11 rounded-full object-cover ring-2 ring-border cursor-pointer"
        @click="openProfile = !openProfile" />

      <div
        x-show="openProfile"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        @click.away="openProfile = false"
        class="absolute right-0 top-full mt-2 w-48 bg-white rounded-2xl shadow-2xl border border-border z-[100]"
        style="display: none">
        <div class="p-2">
          <a
            href="/profile"
            class="flex items-center gap-2 px-2 py-2 rounded-md text-sm text-secondary hover:bg-muted hover:text-primary transition-colors">
            <i data-lucide="user" class="size-4"></i> My Profile
          </a>
          <a
            href="#"
            class="flex items-center gap-2 px-2 py-2 rounded-md text-sm text-secondary hover:bg-muted hover:text-primary transition-colors">
            <i data-lucide="settings" class="size-4"></i> Account
            Settings
          </a>
          <hr class="my-1 border-border" />
          <a
            href="#"
            class="flex items-center gap-2 px-2 py-2 rounded-md text-sm text-error hover:bg-error/10 transition-colors">
            <i data-lucide="log-out" class="size-4"></i> Sign Out
          </a>
        </div>
      </div>
    </div>
  </div>
</div>