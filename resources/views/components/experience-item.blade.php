{{-- Experience Timeline Item --}}
@props(['experience', 'index' => 0])

<div x-data="scrollReveal" :class="shown ? 'animate-fade-in-up' : 'opacity-0'"
     class="relative pl-8 pb-12 last:pb-0 group"
     style="animation-delay: {{ $index * 150 }}ms">
    <div class="absolute left-[11px] top-8 bottom-0 w-px bg-gradient-to-b from-accent-500/30 to-transparent group-last:hidden"></div>
    <div class="absolute left-0 top-1.5 w-[23px] h-[23px] rounded-full border-2 border-accent-500/50 bg-dark-900 flex items-center justify-center">
        <div class="w-2.5 h-2.5 rounded-full {{ $experience->is_current ? 'bg-emerald-400 animate-pulse' : 'bg-accent-500' }}"></div>
    </div>
    <div class="glass-card rounded-xl p-6 hover:border-accent-500/20 transition-all duration-500">
        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-2 mb-3">
            <div>
                <h3 class="text-lg font-bold text-white">{{ $experience->position }}</h3>
                <p class="text-accent-400 font-medium">{{ $experience->company }}</p>
            </div>
            <div class="flex flex-col items-start sm:items-end gap-1">
                @if($experience->is_current)
                    <span class="px-2.5 py-0.5 text-xs font-medium rounded-full bg-emerald-400/10 text-emerald-400 border border-emerald-400/20">Current</span>
                @endif
                <span class="text-xs text-zinc-500 capitalize">{{ $experience->type }}</span>
            </div>
        </div>
        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-zinc-500 mb-3">
            <span>{{ $experience->start_date->format('M Y') }} — {{ $experience->is_current ? 'Present' : $experience->end_date->format('M Y') }}</span>
            @if($experience->location)
                <span>{{ $experience->location }}</span>
            @endif
            <span class="text-zinc-600">· {{ $experience->duration }}</span>
        </div>
        @if($experience->description)
            <p class="text-sm text-zinc-400 leading-relaxed">{{ $experience->description }}</p>
        @endif
    </div>
</div>
