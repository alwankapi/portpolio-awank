<x-layouts.admin>
    <x-slot:header>Messages</x-slot:header>

    <div class="mb-6">
        <p class="text-sm text-zinc-500">Contact form submissions from visitors</p>
    </div>

    <div class="glass-card rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-white/5">
                        <th class="text-left px-6 py-3 text-xs font-medium text-zinc-500 uppercase tracking-wider">From</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-zinc-500 uppercase tracking-wider hidden sm:table-cell">Subject</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-zinc-500 uppercase tracking-wider hidden md:table-cell">Date</th>
                        <th class="text-right px-6 py-3 text-xs font-medium text-zinc-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($messages as $msg)
                        <tr class="hover:bg-white/[0.02] transition-colors {{ !$msg->is_read ? 'bg-accent-500/[0.02]' : '' }}">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    @unless($msg->is_read)
                                        <span class="w-2 h-2 rounded-full bg-accent-500 shrink-0"></span>
                                    @endunless
                                    <div>
                                        <p class="font-medium {{ $msg->is_read ? 'text-zinc-400' : 'text-white' }}">{{ $msg->name }}</p>
                                        <p class="text-xs text-zinc-600">{{ $msg->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-zinc-500 hidden sm:table-cell truncate max-w-[200px]">{{ $msg->subject ?? '—' }}</td>
                            <td class="px-6 py-4 text-xs text-zinc-600 hidden md:table-cell">{{ $msg->created_at->diffForHumans() }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.messages.show', $msg) }}" class="p-2 text-zinc-500 hover:text-accent-400 transition-colors rounded-lg hover:bg-white/5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.messages.destroy', $msg) }}" onsubmit="return confirm('Delete this message?')">
                                        @csrf @method('DELETE')
                                        <button class="p-2 text-zinc-500 hover:text-rose-400 transition-colors rounded-lg hover:bg-rose-400/5">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-12 text-center text-zinc-600">No messages yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($messages->hasPages())
            <div class="px-6 py-4 border-t border-white/5">{{ $messages->links() }}</div>
        @endif
    </div>
</x-layouts.admin>
