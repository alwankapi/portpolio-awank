<x-layouts.admin>
    <x-slot:header>Experience</x-slot:header>

    <div class="flex items-center justify-between mb-6">
        <p class="text-sm text-zinc-500">Manage your work experience</p>
        <a href="{{ route('admin.experiences.create') }}" class="px-4 py-2 text-sm font-medium text-white bg-accent-500 rounded-lg hover:bg-accent-600 transition-colors flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Add Experience
        </a>
    </div>

    <div class="glass-card rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-white/5">
                        <th class="text-left px-6 py-3 text-xs font-medium text-zinc-500 uppercase tracking-wider">Position</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-zinc-500 uppercase tracking-wider hidden sm:table-cell">Company</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-zinc-500 uppercase tracking-wider hidden md:table-cell">Period</th>
                        <th class="text-right px-6 py-3 text-xs font-medium text-zinc-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($experiences as $exp)
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="px-6 py-4">
                                <p class="font-medium text-white">{{ $exp->position }}</p>
                                <p class="text-xs text-zinc-500 sm:hidden">{{ $exp->company }}</p>
                            </td>
                            <td class="px-6 py-4 text-zinc-400 hidden sm:table-cell">{{ $exp->company }}</td>
                            <td class="px-6 py-4 hidden md:table-cell">
                                <span class="text-xs text-zinc-500">{{ $exp->start_date->format('M Y') }} — {{ $exp->is_current ? 'Present' : $exp->end_date->format('M Y') }}</span>
                                @if($exp->is_current)
                                    <span class="ml-2 px-2 py-0.5 text-xs rounded-full bg-emerald-400/10 text-emerald-400">Current</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.experiences.edit', $exp) }}" class="p-2 text-zinc-500 hover:text-accent-400 transition-colors rounded-lg hover:bg-white/5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.experiences.destroy', $exp) }}" onsubmit="return confirm('Delete this experience?')">
                                        @csrf @method('DELETE')
                                        <button class="p-2 text-zinc-500 hover:text-rose-400 transition-colors rounded-lg hover:bg-rose-400/5">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-12 text-center text-zinc-600">No experience yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($experiences->hasPages())
            <div class="px-6 py-4 border-t border-white/5">{{ $experiences->links() }}</div>
        @endif
    </div>
</x-layouts.admin>
