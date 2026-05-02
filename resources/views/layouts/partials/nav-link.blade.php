@props(['active' => false, 'icon' => 'circle', 'href' => '#'])

<a href="{{ $href }}" 
   {{ $attributes->merge(['class' => 'flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all duration-200 group ' . 
   ($active 
    ? 'bg-primary text-white shadow-lg shadow-primary/20' 
    : 'text-secondary hover:bg-muted hover:text-primary')]) }}>
    <i data-lucide="{{ $icon }}" class="w-5 h-5 {{ $active ? 'text-white' : 'group-hover:scale-110 transition-transform' }}"></i>
    <span class="font-medium">{{ $slot }}</span>
</a>