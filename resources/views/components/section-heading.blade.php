{{-- Section Heading Component --}}
@props(['title', 'subtitle' => null, 'align' => 'center'])

<div class="{{ $align === 'center' ? 'text-center' : 'text-left' }} mb-16" x-data="scrollReveal"
     :class="shown ? 'animate-fade-in-up' : 'opacity-0'">
    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">
        {{ $title }}
    </h2>
    @if($subtitle)
        <p class="text-lg text-zinc-400 max-w-2xl {{ $align === 'center' ? 'mx-auto' : '' }}">
            {{ $subtitle }}
        </p>
    @endif
    <div class="mt-6 flex {{ $align === 'center' ? 'justify-center' : 'justify-start' }}">
        <div class="h-1 w-20 rounded-full bg-gradient-to-r from-accent-500 to-cyan-400"></div>
    </div>
</div>
