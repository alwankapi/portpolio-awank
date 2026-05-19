{{-- Skill Card Component --}}
@props(['skill'])

<div x-data="scrollReveal" :class="shown ? 'animate-fade-in-up' : 'opacity-0'"
     class="group glass-card rounded-xl p-5 hover:border-accent-500/20 transition-all duration-500 hover:-translate-y-1">

    <div class="flex items-center gap-3 mb-3">
        {{-- Icon placeholder --}}
        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-accent-500/20 to-cyan-400/20 flex items-center justify-center text-accent-400 border border-accent-500/10">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
            </svg>
        </div>
        <div>
            <h4 class="font-semibold text-white text-sm">{{ $skill->name }}</h4>
            <p class="text-xs text-zinc-500 capitalize">{{ $skill->category }}</p>
        </div>
    </div>

    {{-- Progress Bar --}}
    <div class="relative">
        <div class="flex justify-between mb-1.5">
            <span class="text-xs text-zinc-500">Proficiency</span>
            <span class="text-xs font-mono text-accent-400"
                  x-data="counter({{ $skill->proficiency }})" x-text="current + '%'">0%</span>
        </div>
        <div class="h-1.5 bg-dark-600 rounded-full overflow-hidden">
            <div class="h-full rounded-full bg-gradient-to-r from-accent-500 to-cyan-400 transition-all duration-1000 ease-out"
                 x-data="{ width: 0 }"
                 x-intersect:enter="setTimeout(() => width = {{ $skill->proficiency }}, 200)"
                 :style="'width: ' + width + '%'">
            </div>
        </div>
    </div>
</div>
