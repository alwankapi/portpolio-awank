<x-layouts.admin>
    <x-slot:header>Message Detail</x-slot:header>

    <div class="max-w-2xl">
        <div class="glass-card rounded-xl p-6">
            <div class="flex items-start justify-between mb-6 pb-6 border-b border-white/5">
                <div>
                    <h3 class="text-lg font-semibold text-white">{{ $message->subject ?? 'No Subject' }}</h3>
                    <div class="flex items-center gap-3 mt-2 text-sm text-zinc-500">
                        <span>From: <span class="text-zinc-300">{{ $message->name }}</span></span>
                        <span>&middot;</span>
                        <a href="mailto:{{ $message->email }}" class="text-accent-400 hover:text-accent-300 transition-colors">{{ $message->email }}</a>
                    </div>
                    <p class="text-xs text-zinc-600 mt-1">{{ $message->created_at->format('d M Y, H:i') }} ({{ $message->created_at->diffForHumans() }})</p>
                </div>
            </div>

            <div class="text-zinc-300 leading-relaxed whitespace-pre-wrap">{{ $message->message }}</div>
        </div>

        <div class="flex items-center gap-3 mt-6">
            <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}"
               class="px-6 py-3 text-sm font-medium text-white bg-accent-500 rounded-xl hover:bg-accent-600 transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg>
                Reply via Email
            </a>
            <a href="{{ route('admin.messages.index') }}" class="px-6 py-3 text-sm text-zinc-400 hover:text-white transition-colors">&larr; Back</a>
            <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Delete this message?')" class="ml-auto">
                @csrf @method('DELETE')
                <button class="px-4 py-3 text-sm text-rose-400/60 hover:text-rose-400 transition-colors">Delete</button>
            </form>
        </div>
    </div>
</x-layouts.admin>
