{{-- Certificate Card --}}
@props(['certificate'])

<div x-data="scrollReveal" :class="shown ? 'animate-fade-in-up' : 'opacity-0'"
     class="group glass-card rounded-xl p-6 hover:border-accent-500/20 transition-all duration-500 hover:-translate-y-1">
    <div class="flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-400/20 to-accent-500/20 flex items-center justify-center shrink-0">
            <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
        </div>
        <div class="flex-1 min-w-0">
            <h4 class="font-semibold text-white text-sm mb-1 group-hover:text-accent-400 transition-colors">{{ $certificate->title }}</h4>
            <p class="text-xs text-zinc-500 mb-2">{{ $certificate->issuer }}</p>
            <div class="flex flex-wrap items-center gap-2 text-xs text-zinc-600">
                <span>{{ $certificate->issue_date->format('M Y') }}</span>
                @if($certificate->credential_id)
                    <span>· ID: {{ $certificate->credential_id }}</span>
                @endif
            </div>
            @if($certificate->credential_url)
                <a href="{{ $certificate->credential_url }}" target="_blank" class="inline-flex items-center gap-1 mt-3 text-xs text-accent-400 hover:text-accent-300 transition-colors">
                    View Credential
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                </a>
            @endif
        </div>
    </div>
</div>
