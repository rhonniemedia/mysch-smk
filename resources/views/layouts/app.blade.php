<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'MySch - SMKN 1 Rejang Lebong' }}</title>
    <meta name="description" content="Portal Akademik Peserta Didik SMK Negeri 1 Rejang Lebong">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js" onload="window.lucideLoaded=true; if(window.initLucide) window.initLucide();"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      // 1. Definisikan fungsi global SEBELUM Alpine dimuat
      window.triggerGlobalModal = function(options) {
        window.dispatchEvent(new CustomEvent("open-global-modal", { detail: options }));
      };

      window.initLucide = function() { 
        if(window.lucide) lucide.createIcons(); 
      };

      document.addEventListener('DOMContentLoaded', function() { 
        window.initLucide(); 
      });
    </script>
    
    @stack('styles')
</head>
<body class="font-sans bg-white min-h-screen overflow-x-hidden" x-data="{ sidebarOpen: false }" :class="sidebarOpen ? 'overflow-hidden' : ''">

    <!-- Overlay Mobile -->
    <div class="fixed inset-0 bg-black/80 z-40 lg:hidden" x-show="sidebarOpen" x-transition.opacity @click="sidebarOpen = false" style="display: none;"></div>

    <div class="flex h-screen max-h-screen flex-1 bg-muted overflow-hidden">
        @include('layouts.partials.sidebar')

        <main class="flex-1 lg:ml-[280px] flex flex-col bg-white min-h-screen overflow-x-hidden">
            @include('layouts.partials.navbar')

            <div class="flex-1 overflow-y-auto p-5 md:p-8">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Modals Global -->
    @include('layouts.partials.modal-search')
    @include('layouts.partials.modal-izin')
    @include('layouts.partials.modal-notification')

    <script src="{{ asset('js/dashboard.js') }}"></script>
    @stack('scripts')
</body>
</html>