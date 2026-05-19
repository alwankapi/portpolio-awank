<x-layouts.admin>
    <x-slot:header>Certificates</x-slot:header>

    <div class="flex items-center justify-between mb-6">
        <p class="text-sm text-zinc-500">Manage your certifications</p>
        <a href="{{ route('admin.certificates.create') }}" class="px-4 py-2 text-sm font-medium text-white bg-accent-500 rounded-lg hover:bg-accent-600 transition-colors flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Add Certificate
        </a>
    </div>

    <div class="glass-card rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-white/5">
                        <th class="text-left px-6 py-3 text-xs font-medium text-zinc-500 uppercase tracking-wider">Title</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-zinc-500 uppercase tracking-wider hidden sm:table-cell">Issuer</th>
                        <th class="text-left px-6 py-3 text-xs font-medium text-zinc-500 uppercase tracking-wider hidden md:table-cell">Date</th>
                        <th class="text-right px-6 py-3 text-xs font-medium text-zinc-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($certificates as $cert)
                        <tr class="hover:bg-white/[0.02] transition-colors">
                            <td class="px-6 py-4">
                                <p class="font-medium text-white">{{ $cert->title }}</p>
                                <p class="text-xs text-zinc-500 sm:hidden">{{ $cert->issuer }}</p>
                            </td>
                            <td class="px-6 py-4 text-zinc-400 hidden sm:table-cell">{{ $cert->issuer }}</td>
                            <td class="px-6 py-4 text-xs text-zinc-500 hidden md:table-cell">{{ $cert->issue_date->format('M Y') }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.certificates.edit', $cert) }}" class="p-2 text-zinc-500 hover:text-accent-400 transition-colors rounded-lg hover:bg-white/5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.certificates.destroy', $cert) }}" onsubmit="return confirm('Delete this certificate?')">
                                        @csrf @method('DELETE')
                                        <button class="p-2 text-zinc-500 hover:text-rose-400 transition-colors rounded-lg hover:bg-rose-400/5">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-12 text-center text-zinc-600">No certificates yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($certificates->hasPages())
            <div class="px-6 py-4 border-t border-white/5">{{ $certificates->links() }}</div>
        @endif
    </div>
</x-layouts.admin>
