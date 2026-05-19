<x-layouts.admin>
    <x-slot:header>{{ isset($skill) ? 'Edit Skill' : 'Add Skill' }}</x-slot:header>

    <div class="max-w-xl">
        <form method="POST" action="{{ isset($skill) ? route('admin.skills.update', $skill) : route('admin.skills.store') }}" class="space-y-6">
            @csrf
            @if(isset($skill)) @method('PUT') @endif

            <div class="glass-card rounded-xl p-6 space-y-5">
                <div>
                    <label class="block text-sm text-zinc-400 mb-2">Name *</label>
                    <input type="text" name="name" value="{{ old('name', $skill->name ?? '') }}" required
                           class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 transition-all" placeholder="e.g. Laravel">
                    @error('name') <p class="text-xs text-rose-400 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm text-zinc-400 mb-2">Icon Key</label>
                    <input type="text" name="icon" value="{{ old('icon', $skill->icon ?? '') }}"
                           class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 transition-all" placeholder="e.g. laravel">
                </div>

                <div class="grid sm:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-sm text-zinc-400 mb-2">Category *</label>
                        <select name="category" class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white focus:outline-none focus:border-accent-500/50 transition-all">
                            @foreach(['frontend', 'backend', 'tools', 'other'] as $cat)
                                <option value="{{ $cat }}" {{ old('category', $skill->category ?? 'frontend') === $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm text-zinc-400 mb-2">Proficiency (%) *</label>
                        <input type="number" name="proficiency" value="{{ old('proficiency', $skill->proficiency ?? 80) }}" min="0" max="100" required
                               class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white focus:outline-none focus:border-accent-500/50 transition-all">
                    </div>
                    <div>
                        <label class="block text-sm text-zinc-400 mb-2">Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $skill->sort_order ?? 0) }}" min="0"
                               class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white focus:outline-none focus:border-accent-500/50 transition-all">
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="px-6 py-3 text-sm font-medium text-white bg-accent-500 rounded-xl hover:bg-accent-600 transition-colors">
                    {{ isset($skill) ? 'Update Skill' : 'Create Skill' }}
                </button>
                <a href="{{ route('admin.skills.index') }}" class="px-6 py-3 text-sm text-zinc-400 hover:text-white transition-colors">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
