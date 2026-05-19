{{-- Project Card Component --}}
@props(['project'])

<div x-data="scrollReveal" :class="shown ? 'animate-fade-in-up' : 'opacity-0'"
     class="group glass-card rounded-2xl overflow-hidden hover:border-accent-500/20 transition-all duration-500 hover:-translate-y-1">

    {{-- Image --}}
    <div class="relative h-48 sm:h-56 overflow-hidden bg-dark-700">
        @if($project->image)
            <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
        @else
            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-accent-500/10 to-cyan-400/10">
                <svg class="w-16 h-16 text-zinc-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                </svg>
            </div>
        @endif

        {{-- Category Badge --}}
        <div class="absolute top-4 left-4">
            <span class="px-3 py-1 text-xs font-medium rounded-full bg-dark-800/80 backdrop-blur text-zinc-300 border border-white/10">
                {{ ucfirst($project->category) }}
            </span>
        </div>

        {{-- Featured Badge --}}
        @if($project->is_featured)
            <div class="absolute top-4 right-4">
                <span class="px-3 py-1 text-xs font-medium rounded-full bg-accent-500/20 backdrop-blur text-accent-300 border border-accent-500/30">
                    ★ Featured
                </span>
            </div>
        @endif
    </div>

    {{-- Content --}}
    <div class="p-6">
        <h3 class="text-xl font-bold text-white mb-2 group-hover:text-accent-400 transition-colors">
            {{ $project->title }}
        </h3>
        <p class="text-sm text-zinc-400 mb-4 line-clamp-2">
            {{ $project->short_description ?? Str::limit($project->description, 120) }}
        </p>

        {{-- Tech Stack --}}
        @if($project->tech_stack)
            <div class="flex flex-wrap gap-2 mb-5">
                @foreach($project->tech_stack as $tech)
                    <span class="px-2.5 py-1 text-xs rounded-md bg-dark-600 text-zinc-400 border border-white/5">
                        {{ $tech }}
                    </span>
                @endforeach
            </div>
        @endif

        {{-- Links --}}
        <div class="flex items-center gap-3 pt-4 border-t border-white/5">
            @if($project->url)
                <a href="{{ $project->url }}" target="_blank" rel="noopener"
                   class="flex items-center gap-1.5 text-sm text-zinc-400 hover:text-accent-400 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    Live Demo
                </a>
            @endif
            @if($project->github_url)
                <a href="{{ $project->github_url }}" target="_blank" rel="noopener"
                   class="flex items-center gap-1.5 text-sm text-zinc-400 hover:text-white transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    Source
                </a>
            @endif
        </div>
    </div>
</div>
