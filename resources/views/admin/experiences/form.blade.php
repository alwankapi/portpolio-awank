<x-layouts.admin>
    <x-slot:header>{{ isset($experience) ? 'Edit Experience' : 'Add Experience' }}</x-slot:header>

    <div class="max-w-2xl">
        <form method="POST"
              action="{{ isset($experience) ? route('admin.experiences.update', $experience) : route('admin.experiences.store') }}"
              enctype="multipart/form-data" class="space-y-6">
            @csrf
            @if(isset($experience)) @method('PUT') @endif

            <div class="glass-card rounded-xl p-6 space-y-5">
                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm text-zinc-400 mb-2">Position *</label>
                        <input type="text" name="position" value="{{ old('position', $experience->position ?? '') }}" required
                               class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 transition-all">
                        @error('position') <p class="text-xs text-rose-400 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-zinc-400 mb-2">Company *</label>
                        <input type="text" name="company" value="{{ old('company', $experience->company ?? '') }}" required
                               class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 transition-all">
                        @error('company') <p class="text-xs text-rose-400 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm text-zinc-400 mb-2">Description</label>
                    <textarea name="description" rows="4"
                              class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 transition-all resize-none">{{ old('description', $experience->description ?? '') }}</textarea>
                </div>

                <div class="grid sm:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-sm text-zinc-400 mb-2">Start Date *</label>
                        <input type="date" name="start_date" value="{{ old('start_date', isset($experience) ? $experience->start_date->format('Y-m-d') : '') }}" required
                               class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white focus:outline-none focus:border-accent-500/50 transition-all">
                    </div>
                    <div x-data="{ isCurrent: {{ old('is_current', $experience->is_current ?? false) ? 'true' : 'false' }} }">
                        <label class="block text-sm text-zinc-400 mb-2">End Date</label>
                        <input type="date" name="end_date" value="{{ old('end_date', isset($experience) && $experience->end_date ? $experience->end_date->format('Y-m-d') : '') }}"
                               :disabled="isCurrent"
                               class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white focus:outline-none focus:border-accent-500/50 transition-all disabled:opacity-50">
                    </div>
                    <div class="flex items-end pb-1">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="is_current" value="1" {{ old('is_current', $experience->is_current ?? false) ? 'checked' : '' }}
                                   class="w-4 h-4 rounded bg-dark-700 border-white/10 text-accent-500 focus:ring-accent-500/50">
                            <span class="text-sm text-zinc-400">Currently here</span>
                        </label>
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm text-zinc-400 mb-2">Location</label>
                        <input type="text" name="location" value="{{ old('location', $experience->location ?? '') }}"
                               class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 transition-all" placeholder="Jakarta, Indonesia">
                    </div>
                    <div>
                        <label class="block text-sm text-zinc-400 mb-2">Type *</label>
                        <select name="type" class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white focus:outline-none focus:border-accent-500/50 transition-all">
                            @foreach(['full-time', 'part-time', 'freelance', 'internship', 'contract'] as $type)
                                <option value="{{ $type }}" {{ old('type', $experience->type ?? 'full-time') === $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm text-zinc-400 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $experience->sort_order ?? 0) }}" min="0"
                           class="w-full max-w-[120px] px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white focus:outline-none focus:border-accent-500/50 transition-all">
                </div>

                <div>
                    <label class="block text-sm text-zinc-400 mb-2">Company Logo</label>
                    <input type="file" name="company_logo" accept="image/*"
                           class="w-full text-sm text-zinc-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-accent-500/10 file:text-accent-400 hover:file:bg-accent-500/20 file:cursor-pointer file:transition-colors">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="px-6 py-3 text-sm font-medium text-white bg-accent-500 rounded-xl hover:bg-accent-600 transition-colors">
                    {{ isset($experience) ? 'Update Experience' : 'Create Experience' }}
                </button>
                <a href="{{ route('admin.experiences.index') }}" class="px-6 py-3 text-sm text-zinc-400 hover:text-white transition-colors">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
