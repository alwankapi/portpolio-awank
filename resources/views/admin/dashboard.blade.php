<x-layouts.admin>
    <x-slot:header>Dashboard</x-slot:header>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 mb-8">
        @foreach([
            ['label' => 'Projects', 'value' => $stats['projects'], 'color' => 'accent-500', 'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'],
            ['label' => 'Skills', 'value' => $stats['skills'], 'color' => 'cyan-400', 'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z'],
            ['label' => 'Experience', 'value' => $stats['experiences'], 'color' => 'emerald-400', 'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
            ['label' => 'Certificates', 'value' => $stats['certificates'], 'color' => 'amber-400', 'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138'],
            ['label' => 'Messages', 'value' => $stats['messages'], 'color' => 'rose-400', 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
            ['label' => 'Unread', 'value' => $stats['unread_messages'], 'color' => 'orange-400', 'icon' => 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9'],
        ] as $stat)
            <div class="glass-card rounded-xl p-5">
                <div class="flex items-center justify-between mb-3">
                    <svg class="w-5 h-5 text-{{ $stat['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $stat['icon'] }}"></path></svg>
                </div>
                <div class="text-2xl font-bold text-white">{{ $stat['value'] }}</div>
                <div class="text-xs text-zinc-500 mt-1">{{ $stat['label'] }}</div>
            </div>
        @endforeach
    </div>

    {{-- Recent Messages --}}
    <div class="glass-card rounded-xl overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-white/5">
            <h3 class="font-semibold text-white">Recent Messages</h3>
            <a href="{{ route('admin.messages.index') }}" class="text-sm text-accent-400 hover:text-accent-300 transition-colors">View all &rarr;</a>
        </div>
        <div class="divide-y divide-white/5">
            @forelse($recentMessages as $message)
                <a href="{{ route('admin.messages.show', $message) }}" class="flex items-start gap-4 px-6 py-4 hover:bg-white/[0.02] transition-colors">
                    <div class="w-9 h-9 rounded-full bg-accent-500/10 flex items-center justify-center text-accent-400 text-sm font-bold shrink-0 mt-0.5">
                        {{ strtoupper(substr($message->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2">
                            <p class="text-sm font-medium text-white truncate">{{ $message->name }}</p>
                            @unless($message->is_read)
                                <span class="w-2 h-2 rounded-full bg-accent-500 shrink-0"></span>
                            @endunless
                        </div>
                        <p class="text-xs text-zinc-500 truncate">{{ $message->subject ?? 'No subject' }}</p>
                        <p class="text-xs text-zinc-600 mt-1">{{ $message->created_at->diffForHumans() }}</p>
                    </div>
                </a>
            @empty
                <div class="px-6 py-12 text-center text-zinc-600 text-sm">No messages yet.</div>
            @endforelse
        </div>
    </div>
</x-layouts.admin>
