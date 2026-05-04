<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MySch – Masuk</title>
    <meta name="description" content="Sistem Informasi Kelulusan & Alumni SMKN 1 Rejang Lebong" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js" onload="window.lucideLoaded=true; if(window.initLucide) window.initLucide();"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        window.initLucide = function() {
            if (window.lucide) lucide.createIcons();
        };
        document.addEventListener("DOMContentLoaded", function() {
            if (window.lucideLoaded) window.initLucide();
        });
    </script>
</head>

<body class="font-sans bg-muted overflow-hidden" x-data="{
  nisn: '{{ old('username') }}',
  showPassword: false,
  password: '',
  loading: false,
  errorMsg: '',
  modalAdmin: false,
  modalPanduan: false,
  remember: false,
  handleLogin() {
    if (!this.nisn || !this.password) {
        this.errorMsg = 'NISN dan password wajib diisi.';
        return;
    }
    this.loading = true;
    this.errorMsg = '';
    setTimeout(() => {
        document.getElementById('loginForm').submit();
    }, 600);
  }
}">

    <!--
    BACKGROUND LAYER
    -->
    <div class="fixed inset-0 bg-grid pointer-events-none z-0"></div>
    <div class="blob blob-1 w-96 h-96 bg-primary top-[-80px] left-[-80px]"></div>
    <div class="blob blob-2 w-80 h-80 bg-primary bottom-[-60px] right-[-40px]"></div>
    <div class="blob blob-3 w-64 h-64" style="background:#8b2020;top:40%;left:55%;"></div>

    <!-- 
       MAIN LAYOUT
   -->
    <div class="relative z-10 h-screen flex flex-col lg:flex-row overflow-hidden">

        <!-- ── LEFT PANEL (Hero) ── -->
        <div class="hidden lg:flex flex-col justify-between w-[52%] xl:w-[55%] bg-gradient-to-br from-[#c0192f] via-[#a01526] to-[#6b0d19] p-12 xl:p-16 relative overflow-hidden h-full">

            <!-- Decorative circles -->
            <div class="absolute top-[-60px] right-[-60px] w-72 h-72 rounded-full border-[40px] border-white/10"></div>
            <div class="absolute bottom-[80px] left-[-40px] w-52 h-52 rounded-full border-[30px] border-white/10"></div>
            <div class="absolute bottom-[-30px] right-20 w-32 h-32 rounded-full bg-white/5"></div>

            <!-- Logo -->
            <div class="flex items-center gap-3 relative" style="animation: fade-up 0.5s 0s cubic-bezier(0.16,1,0.3,1) both;">
                <div class="w-12 h-10 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/30">
                    <i data-lucide="graduation-cap" class="w-5 h-5 text-white"></i>
                </div>
                <div>
                    <h1 class="font-black text-2xl text-white leading-none tracking-tight">MySCH</h1>
                    <p class="text-[9px] text-red-200 uppercase tracking-[0.3em] font-semibold">SMK Negeri 1 Rejang Lebong</p>
                </div>
            </div>

            <!-- Hero text -->
            <div class="relative flex flex-col gap-6">
                <div style="animation: fade-up 0.6s 0.15s cubic-bezier(0.16,1,0.3,1) both;">
                    <p class="text-red-200 text-xs font-bold uppercase tracking-[0.3em] mb-3">Sistem Informasi Akademik</p>
                    <h2 class="text-white font-black text-4xl xl:text-5xl leading-tight">
                        Portal Akademik<br />
                        <span class="text-red-200">Pelajar.</span>
                    </h2>
                </div>
                <p class="text-red-100 text-sm leading-relaxed max-w-xs" style="animation: fade-up 0.6s 0.25s cubic-bezier(0.16,1,0.3,1) both;">
                    Platform terpadu untuk kebutuhan akademik pelajar aktif SMK Negeri 1 Rejang Lebong — dari nilai, pengumuman, hingga tracer study.
                </p>

                <!-- Stats row -->
                <div class="flex gap-6 mt-2">
                    <div class="flex flex-col gap-0.5" style="animation: fade-up 0.6s 0.4s cubic-bezier(0.16,1,0.3,1) both; opacity:0;">
                        <span class="text-white font-black text-2xl">1.000+</span>
                        <span class="text-red-200 text-xs font-medium">Pelajar Aktif</span>
                    </div>
                    <div class="w-px bg-white/20" style="animation: fade-up 0.6s 0.47s cubic-bezier(0.16,1,0.3,1) both; opacity:0;"></div>
                    <div class="flex flex-col gap-0.5" style="animation: fade-up 0.6s 0.5s cubic-bezier(0.16,1,0.3,1) both; opacity:0;">
                        <span class="text-white font-black text-2xl">99%</span>
                        <span class="text-red-200 text-xs font-medium">Tingkat Lulus</span>
                    </div>
                    <div class="w-px bg-white/20" style="animation: fade-up 0.6s 0.57s cubic-bezier(0.16,1,0.3,1) both; opacity:0;"></div>
                    <div class="flex flex-col gap-0.5" style="animation: fade-up 0.6s 0.6s cubic-bezier(0.16,1,0.3,1) both; opacity:0;">
                        <span class="text-white font-black text-2xl">9 Jurusan</span>
                        <span class="text-red-200 text-xs font-medium">Program Studi</span>
                    </div>
                </div>
            </div>

            <!-- Info strip -->
            <div class="relative bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-5 flex items-start gap-4" style="animation: fade-up 0.6s 0.5s cubic-bezier(0.16,1,0.3,1) both;">
                <div class="size-10 bg-white/20 rounded-xl flex items-center justify-center shrink-0">
                    <i data-lucide="calendar-check" class="size-5 text-white"></i>
                </div>
                <div class="flex-1">
                    <p class="text-white font-bold text-sm">Pengumuman Kelulusan</p>
                    <p class="text-red-200 text-xs mt-0.5 leading-relaxed">Diumumkan pada <strong class="text-white">04 Mei 2026</strong>. Segera cek status kelulusanmu di dashboard.</p>
                </div>
                <div class="dot-pulse size-2.5 rounded-full bg-emerald-400 mt-1 shrink-0"></div>
            </div>
        </div>

        <!-- ── RIGHT PANEL (Form) ── -->
        <div class="flex-1 flex flex-col items-center justify-center px-5 py-8 lg:py-0 lg:overflow-hidden overflow-y-auto h-full">

            <!-- Mobile logo -->
            <div class="flex lg:hidden items-center gap-3 mb-8 stagger-1">
                <div class="w-11 h-9 bg-primary rounded-xl flex items-center justify-center">
                    <i data-lucide="graduation-cap" class="w-5 h-5 text-white"></i>
                </div>
                <div>
                    <h1 class="font-black text-xl text-foreground leading-none">MySCH</h1>
                    <p class="text-[9px] text-secondary uppercase tracking-[0.3em] font-semibold">SMK Negeri 1 Rejang Lebong</p>
                </div>
            </div>

            <!-- Login card -->
            <div class="card-enter w-full max-w-md bg-white rounded-3xl shadow-xl shadow-black/8 border border-border p-6 lg:p-7 xl:p-8 flex flex-col gap-4 lg:gap-4">

                <!-- Header -->
                <div class="flex flex-col gap-1 stagger-1">
                    <h2 class="text-foreground font-black text-2xl xl:text-3xl leading-tight">Selamat datang!</h2>
                    <p class="text-secondary text-sm">Masuk dengan Username dan password untuk melanjutkan.</p>
                </div>

                <!-- Error alert -->
                <div
                    x-show="errorMsg"
                    class="flex items-start gap-3 bg-red-50 border border-red-200 rounded-xl p-4"
                    x-cloak>
                    <i data-lucide="alert-circle" class="size-4 text-error shrink-0 mt-0.5"></i>
                    <p x-text="errorMsg" class="text-sm text-red-700 font-medium"></p>
                </div>

                @if ($errors->any())
                <div class="flex items-start gap-3 bg-red-50 border border-red-200 rounded-xl p-4">
                    <i data-lucide="alert-circle" class="size-4 text-error shrink-0 mt-0.5"></i>
                    <p class="text-sm text-red-700 font-medium">{{ $errors->first() }}</p>
                </div>
                @endif

                <!-- Form -->
                <form
                    id="loginForm"
                    method="POST"
                    action="{{ route('login') }}"
                    class="flex flex-col gap-6"
                    @submit.prevent="handleLogin">
                    @csrf

                    <div class="flex flex-col gap-4 stagger-2">
                        <!-- Username -->
                        <div class="flex flex-col gap-1.5">
                            <label class="text-xs font-bold text-foreground uppercase tracking-widest">Username</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                                    <i data-lucide="hash" class="size-4 text-secondary"></i>
                                </div>
                                <input
                                    type="text"
                                    name="username"
                                    x-model="nisn"
                                    value="{{ old('username') }}"
                                    inputmode="numeric"
                                    maxlength="75"
                                    placeholder="Contoh: 0012345678"
                                    class="input-field w-full border border-border rounded-xl pl-10 pr-4 py-3 text-sm text-foreground placeholder:text-secondary/60 transition-all duration-200"
                                    :class="errorMsg ? 'border-red-300 bg-red-50' : 'bg-white'" />
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="flex flex-col gap-1.5">
                            <div class="flex items-center justify-between">
                                <label class="text-xs font-bold text-foreground uppercase tracking-widest">Password</label>
                                <a href="#" class="text-xs text-primary font-medium hover:underline">Lupa password?</a>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                                    <i data-lucide="lock-keyhole" class="size-4 text-secondary"></i>
                                </div>
                                <input
                                    name="password"
                                    :type="showPassword ? 'text' : 'password'"
                                    x-model="password"
                                    placeholder="Masukkan password"
                                    class="input-field w-full border border-border rounded-xl pl-10 pr-12 py-3 text-sm text-foreground placeholder:text-secondary/60 transition-all duration-200"
                                    :class="errorMsg ? 'border-red-300 bg-red-50' : 'bg-white'"
                                    @keyup.enter.prevent="handleLogin" />
                                <button
                                    type="button"
                                    @click="showPassword = !showPassword"
                                    class="absolute inset-y-0 right-4 flex items-center text-secondary hover:text-foreground transition-colors cursor-pointer">
                                    <i x-show="!showPassword" data-lucide="eye" class="size-4" x-cloak></i>
                                    <i x-show="showPassword" data-lucide="eye-off" class="size-4" x-cloak></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Remember me -->
                    <div class="flex items-center gap-3 stagger-3">
                        <input type="hidden" name="remember" :value="remember">
                        <button
                            type="button"
                            @click="remember = !remember"
                            :class="remember ? 'bg-primary border-primary' : 'bg-white border-border'"
                            class="size-5 rounded-md border-2 flex items-center justify-center transition-all duration-200 shrink-0 cursor-pointer">
                            <i data-lucide="check" class="size-3 text-white" :class="remember ? 'opacity-100' : 'opacity-0'" style="transition: opacity 0.15s"></i>
                        </button>
                        <span class="text-sm text-secondary">Ingat saya di perangkat ini</span>
                    </div>

                    <!-- Submit button -->
                    <div class="stagger-4">
                        <button
                            type="submit"
                            :disabled="loading"
                            class="btn-primary w-full flex items-center justify-center gap-2.5 bg-primary hover:bg-primary-hover text-white font-bold py-3.5 rounded-xl transition-all duration-200 cursor-pointer disabled:opacity-70 disabled:cursor-not-allowed">
                            <span x-show="!loading">Masuk ke Dashboard</span>
                            <span x-show="loading" class="flex items-center gap-2" x-cloak>
                                <svg class="animate-spin size-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                                Memverifikasi…
                            </span>
                            <i data-lucide="arrow-right" class="size-4" x-show="!loading"></i>
                        </button>
                    </div>

                    <!-- Divider -->
                    <div class="stagger-5 flex items-center gap-3">
                        <div class="flex-1 h-px bg-border"></div>
                        <span class="text-xs text-secondary font-medium">atau</span>
                        <div class="flex-1 h-px bg-border"></div>
                    </div>

                    <!-- Help -->
                    <div class="stagger-5 flex flex-col sm:flex-row items-center gap-3">
                        <button
                            type="button"
                            @click="modalAdmin = true"
                            class="group flex-1 w-full flex items-center justify-center gap-2.5 border border-border rounded-xl py-3 hover:border-primary/40 hover:bg-primary/5 transition-all duration-200 cursor-pointer">
                            <i data-lucide="headset" class="size-4 text-secondary group-hover:text-primary transition-colors"></i>
                            <span class="text-sm font-medium text-secondary group-hover:text-primary transition-colors">Hubungi Admin</span>
                        </button>
                        <button
                            type="button"
                            @click="modalPanduan = true"
                            class="group flex-1 w-full flex items-center justify-center gap-2.5 border border-border rounded-xl py-3 hover:border-primary/40 hover:bg-primary/5 transition-all duration-200 cursor-pointer">
                            <i data-lucide="book-open" class="size-4 text-secondary group-hover:text-primary transition-colors"></i>
                            <span class="text-sm font-medium text-secondary group-hover:text-primary transition-colors">Panduan Login</span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Footer note -->
            <p class="mt-4 text-xs text-secondary text-center stagger-5 px-4">
                Mengalami kendala? Hubungi TU sekolah &nbsp;·&nbsp; Senin–Jumat, 07.00–15.00 WIB
            </p>
        </div>
    </div>

    <!-- GLOBAL MODAL -->
    <div
        x-data="{ open: false, type: 'info', title: '', message: '', confirmText: 'OK', onConfirm: null }"
        @open-global-modal.window="type=$event.detail.type||'info'; title=$event.detail.title||''; message=$event.detail.message||''; confirmText=$event.detail.confirmText||'OK'; onConfirm=$event.detail.onConfirm||null; open=true;"
        x-show="open"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[200] flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm"
        style="display:none" @click.self="open=false">
        <div
            x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95 translate-y-4" x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-sm text-center" @click.stop>
            <div class="flex items-center justify-center mb-4">
                <div class="size-16 rounded-2xl flex items-center justify-center bg-primary/10 text-primary">
                    <i data-lucide="info" class="size-8"></i>
                </div>
            </div>
            <h3 x-text="title" class="text-foreground text-xl font-bold mb-2"></h3>
            <p x-text="message" class="text-secondary text-sm mb-6 leading-relaxed"></p>
            <button @click="open=false" x-text="confirmText" class="w-full px-4 py-3 bg-primary hover:bg-primary-hover text-white rounded-xl font-bold transition-colors cursor-pointer"></button>
        </div>
    </div>

    <!-- ══════════════════════════════════════
       MODAL: HUBUNGI ADMIN
  ══════════════════════════════════════ -->
    <div
        x-show="modalAdmin"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[300] flex items-center justify-center sm:p-4 bg-black/60 backdrop-blur-sm"
        style="display:none" @click.self="modalAdmin = false">
        <div
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
            class="bg-white w-full h-full sm:h-auto sm:max-w-md sm:rounded-3xl shadow-2xl overflow-y-auto flex flex-col" @click.stop>
            <!-- Header hijau WA -->
            <div class="bg-gradient-to-r from-[#25d366] to-[#1da851] px-6 pt-6 pb-8 relative">
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-3">
                        <div class="size-12 bg-white/20 rounded-2xl flex items-center justify-center">
                            <!-- WA icon SVG -->
                            <svg class="size-6 text-white fill-white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-white font-black text-lg leading-tight">Hubungi Admin</h3>
                            <p class="text-green-100 text-xs mt-0.5">Hanya melalui WhatsApp</p>
                        </div>
                    </div>
                    <button @click="modalAdmin = false" class="size-8 bg-white/20 hover:bg-white/30 rounded-xl flex items-center justify-center transition-colors cursor-pointer">
                        <i data-lucide="x" class="size-4 text-white"></i>
                    </button>
                </div>
            </div>

            <!-- Body -->
            <div class="px-6 py-5 flex flex-col gap-4">

                <!-- Info jam -->
                <div class="flex items-center gap-3 bg-amber-50 border border-amber-200 rounded-xl px-4 py-3">
                    <i data-lucide="clock" class="size-4 text-amber-600 shrink-0"></i>
                    <p class="text-amber-800 text-xs font-medium">Jam layanan: <strong>Senin – Jumat, 07.00 – 15.00 WIB</strong></p>
                </div>

                <!-- Kontak cards -->
                <div class="flex flex-col gap-3">

                    <!-- Admin 1 -->
                    <div class="flex items-center gap-4 border border-border rounded-2xl p-4 hover:border-green-300 hover:bg-green-50/50 transition-all duration-200 group">
                        <div class="size-11 bg-green-100 rounded-xl flex items-center justify-center shrink-0">
                            <i data-lucide="user-circle" class="size-5 text-green-700"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-bold text-sm text-foreground">Admin 1 – Roni Saputra</p>
                            <p class="text-secondary text-xs mt-0.5">Tata Usaha &amp; Data Pelajar</p>
                            <p class="text-green-700 text-xs font-bold mt-1">0821-7576-8400</p>
                        </div>
                        <a href="https://wa.me/6282175768400?text=Halo%20Admin%20MySCH%2C%20saya%20mengalami%20kendala%20login." target="_blank"
                            class="shrink-0 flex items-center gap-1.5 bg-[#25d366] hover:bg-[#1da851] text-white text-xs font-bold px-3.5 py-2 rounded-xl transition-colors cursor-pointer">
                            <svg class="size-3.5 fill-white" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                            Chat
                        </a>
                    </div>

                    <!-- Admin 2 -->
                    <div class="flex items-center gap-4 border border-border rounded-2xl p-4 hover:border-green-300 hover:bg-green-50/50 transition-all duration-200 group">
                        <div class="size-11 bg-green-100 rounded-xl flex items-center justify-center shrink-0">
                            <i data-lucide="user-circle" class="size-5 text-green-700"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-bold text-sm text-foreground">Admin 2 – Sumarwan, S.Pd</p>
                            <p class="text-secondary text-xs mt-0.5">Kurikulum & Akun Pelajar</p>
                            <p class="text-green-700 text-xs font-bold mt-1">0852-7403-0344</p>
                        </div>
                        <a href="https://wa.me/6285274030344?text=Halo%20Admin%20MySCH%2C%20saya%20mengalami%20kendala%20login." target="_blank"
                            class="shrink-0 flex items-center gap-1.5 bg-[#25d366] hover:bg-[#1da851] text-white text-xs font-bold px-3.5 py-2 rounded-xl transition-colors cursor-pointer">
                            <svg class="size-3.5 fill-white" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                            Chat
                        </a>
                    </div>
                </div>

                <!-- Note -->
                <p class="text-xs text-secondary text-center leading-relaxed">
                    Pesan di luar jam layanan akan dibalas pada hari kerja berikutnya.
                </p>

                <button @click="modalAdmin = false" class="w-full py-3 border border-border rounded-xl text-sm font-bold text-secondary hover:bg-muted transition-colors cursor-pointer">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- ══════════════════════════════════════
       MODAL: PANDUAN LOGIN
  ══════════════════════════════════════ -->
    <div
        x-show="modalPanduan"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[300] flex items-center justify-center sm:p-4 bg-black/60 backdrop-blur-sm"
        style="display:none" @click.self="modalPanduan = false">
        <div
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
            class="bg-white w-full h-full sm:h-auto sm:max-w-md sm:rounded-3xl shadow-2xl overflow-y-auto flex flex-col" @click.stop>
            <!-- Header merah -->
            <div class="bg-gradient-to-r from-[#c0192f] to-[#96121f] px-6 pt-6 pb-8 relative">
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-3">
                        <div class="size-12 bg-white/20 rounded-2xl flex items-center justify-center">
                            <i data-lucide="book-open-check" class="size-6 text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-white font-black text-lg leading-tight">Panduan Login</h3>
                            <p class="text-red-200 text-xs mt-0.5">Cara masuk ke MySCH</p>
                        </div>
                    </div>
                    <button @click="modalPanduan = false" class="size-8 bg-white/20 hover:bg-white/30 rounded-xl flex items-center justify-center transition-colors cursor-pointer">
                        <i data-lucide="x" class="size-4 text-white"></i>
                    </button>
                </div>
            </div>

            <!-- Body -->
            <div class="px-6 py-5 flex flex-col gap-4">

                <!-- Step 1: Username/NISN -->
                <div class="border border-border rounded-2xl overflow-hidden">
                    <div class="flex items-center gap-3 bg-muted px-4 py-3 border-b border-border">
                        <div class="size-6 bg-primary rounded-lg flex items-center justify-center shrink-0">
                            <span class="text-white text-[10px] font-black">1</span>
                        </div>
                        <p class="font-bold text-sm text-foreground">Username — NISN Kamu</p>
                    </div>
                    <div class="px-4 py-4 flex flex-col gap-3">
                        <p class="text-secondary text-xs leading-relaxed">
                            Username untuk login adalah <strong class="text-foreground">Nomor Induk Siswa Nasional (NISN)</strong> kamu yang terdiri dari <strong class="text-foreground">10 digit angka</strong>. NISN bisa ditemukan di:
                        </p>
                        <ul class="flex flex-col gap-1.5 text-xs text-secondary">
                            <li class="flex items-start gap-2"><i data-lucide="check-circle" class="size-3.5 text-success shrink-0 mt-0.5"></i> Kartu pelajar / buku rapor</li>
                            <li class="flex items-start gap-2"><i data-lucide="check-circle" class="size-3.5 text-success shrink-0 mt-0.5"></i> Lembar biodata siswa dari sekolah</li>
                            <li class="flex items-start gap-2"><i data-lucide="check-circle" class="size-3.5 text-success shrink-0 mt-0.5"></i> Tanya langsung ke wali kelas atau TU</li>
                        </ul>
                        <!-- Contoh NISN -->
                        <div class="bg-muted rounded-xl px-4 py-3 flex items-center justify-between gap-3">
                            <div>
                                <p class="text-[10px] text-secondary font-semibold uppercase tracking-wider mb-1">Contoh NISN</p>
                                <p class="font-black text-foreground text-base tracking-widest">0012345678</p>
                            </div>
                            <div class="flex items-center gap-1.5 text-secondary">
                                <i data-lucide="hash" class="size-4"></i>
                                <span class="text-xs">10 digit</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Password -->
                <div class="border border-border rounded-2xl overflow-hidden">
                    <div class="flex items-center gap-3 bg-muted px-4 py-3 border-b border-border">
                        <div class="size-6 bg-primary rounded-lg flex items-center justify-center shrink-0">
                            <span class="text-white text-[10px] font-black">2</span>
                        </div>
                        <p class="font-bold text-sm text-foreground">Password — Tanggal Lahir</p>
                    </div>
                    <div class="px-4 py-4 flex flex-col gap-3">
                        <p class="text-secondary text-xs leading-relaxed">
                            Password default kamu adalah <strong class="text-foreground">tanggal lahir</strong> dengan format <strong class="text-foreground">DDMMYYYY</strong> (8 digit, tanpa tanda pemisah).
                        </p>
                        <!-- Contoh password -->
                        <div class="bg-muted rounded-xl px-4 py-3 flex items-center justify-between gap-3">
                            <div>
                                <p class="text-[10px] text-secondary font-semibold uppercase tracking-wider mb-1">Contoh — Lahir 17 Agustus 2007</p>
                                <p class="font-black text-foreground text-base tracking-widest">17082007</p>
                            </div>
                            <div class="flex items-center gap-1.5 text-secondary">
                                <i data-lucide="lock-keyhole" class="size-4"></i>
                                <span class="text-xs">8 digit</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-2 bg-amber-50 border border-amber-200 rounded-xl px-3 py-2.5">
                            <i data-lucide="alert-triangle" class="size-3.5 text-amber-600 shrink-0 mt-0.5"></i>
                            <p class="text-amber-800 text-xs leading-relaxed">Segera ganti password setelah login pertama untuk menjaga keamanan akunmu.</p>
                        </div>
                    </div>
                </div>

                <!-- CTA hubungi admin -->
                <div class="flex items-center gap-3 bg-primary/5 border border-primary/20 rounded-xl px-4 py-3">
                    <i data-lucide="info" class="size-4 text-primary shrink-0"></i>
                    <p class="text-xs text-foreground leading-relaxed flex-1">Password tidak berfungsi? <button @click="modalPanduan=false; modalAdmin=true" class="text-primary font-bold underline cursor-pointer">Hubungi Admin</button> untuk reset akun.</p>
                </div>

                <button @click="modalPanduan = false" class="w-full py-3 bg-primary hover:bg-primary-hover text-white rounded-xl text-sm font-bold transition-colors cursor-pointer">
                    Mengerti, Siap Login!
                </button>
            </div>
        </div>
    </div>

    <script>
        function triggerGlobalModal(options) {
            window.dispatchEvent(new CustomEvent("open-global-modal", {
                detail: options
            }));
        }
        document.addEventListener("DOMContentLoaded", function() {
            if (window.lucideLoaded) lucide.createIcons();
        });
    </script>
</body>

</html>