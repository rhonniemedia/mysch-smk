<div x-data="{
        open: false, type: 'info', title: '', message: '', confirmText: 'OK', cancelText: '', onConfirm: null
     }"
     @open-global-modal.window="
        open = true;
        type = $event.detail.type || 'info';
        title = $event.detail.title;
        message = $event.detail.message;
        confirmText = $event.detail.confirmText || 'OK';
        cancelText = $event.detail.cancelText || '';
        onConfirm = $event.detail.onConfirm || null;
     "
     class="relative z-[110]"
     style="display: none;"
     x-show="open">
     
  <div class="fixed inset-0 bg-black/50 transition-opacity" x-show="open" x-transition.opacity.duration.300ms></div>

  <div class="fixed inset-0 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl p-6 max-w-sm w-full text-center shadow-2xl"
         x-show="open"
         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95 -translate-y-10" x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-95 -translate-y-10"
         @click.away="open = false">
      
      <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4"
           :class="{
              'bg-success/10 text-success': type === 'success',
              'bg-error/10 text-error': type === 'delete',
              'bg-warning-light text-warning-dark': type === 'warning',
              'bg-primary/10 text-primary': type === 'info'
           }">
        <!-- SVG Icons sesuai tipe (sama dengan file asli) -->
        <svg x-show="type === 'success'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8"><path d="M20 6 9 17l-5-5"></path></svg>
        <svg x-show="type === 'delete'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg>
        <svg x-show="type === 'warning'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"></path><path d="M12 9v4"></path><path d="M12 17h.01"></path></svg>
        <svg x-show="type === 'info'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
      </div>
      
      <h3 x-text="title" class="text-foreground text-xl font-bold mb-2"></h3>
      <p x-text="message" class="text-secondary text-sm mb-6"></p>
      
      <div class="flex gap-3 justify-center">
        <button x-show="cancelText" @click="open = false" x-text="cancelText" class="flex-1 px-4 py-3 rounded-xl border border-border font-medium text-secondary hover:bg-muted transition-colors cursor-pointer"></button>
        <button @click="open = false; setTimeout(() => { if(onConfirm) onConfirm() }, 300)" x-text="confirmText" :class="type === 'delete' ? 'bg-error hover:bg-error-dark' : 'bg-primary hover:bg-primary-hover'" class="flex-1 w-full px-4 py-3 text-white rounded-xl font-bold transition-colors cursor-pointer"></button>
      </div>
    </div>
  </div>
</div>