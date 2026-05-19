<x-layouts.admin>
    <x-slot:header>{{ isset($project) ? 'Edit Project' : 'Add Project' }}</x-slot:header>

    <div class="max-w-2xl">
        <form method="POST"
              action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}"
              enctype="multipart/form-data" class="space-y-6">
            @csrf
            @if(isset($project)) @method('PUT') @endif

            <div class="glass-card rounded-xl p-6 space-y-5">
                <div>
                    <label class="block text-sm text-zinc-400 mb-2">Title *</label>
                    <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" required
                           class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 transition-all">
                    @error('title') <p class="text-xs text-rose-400 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm text-zinc-400 mb-2">Short Description</label>
                    <input type="text" name="short_description" value="{{ old('short_description', $project->short_description ?? '') }}"
                           class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 transition-all">
                </div>

                <div>
                    <label class="block text-sm text-zinc-400 mb-2">Description *</label>
                    <textarea name="description" rows="5" required
                              class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 transition-all resize-none">{{ old('description', $project->description ?? '') }}</textarea>
                    @error('description') <p class="text-xs text-rose-400 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm text-zinc-400 mb-2">Live URL</label>
                        <input type="url" name="url" value="{{ old('url', $project->url ?? '') }}"
                               class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 transition-all"
                               placeholder="https://">
                    </div>
                    <div>
                        <label class="block text-sm text-zinc-400 mb-2">GitHub URL</label>
                        <input type="url" name="github_url" value="{{ old('github_url', $project->github_url ?? '') }}"
                               class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 transition-all"
                               placeholder="https://github.com/">
                    </div>
                </div>

                <div>
                    <label class="block text-sm text-zinc-400 mb-2">Tech Stack <span class="text-zinc-600">(comma separated)</span></label>
                    <input type="text" name="tech_stack" value="{{ old('tech_stack', isset($project) && $project->tech_stack ? implode(', ', $project->tech_stack) : '') }}"
                           class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 transition-all"
                           placeholder="Laravel, Vue.js, MySQL">
                </div>

                <div class="grid sm:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-sm text-zinc-400 mb-2">Category *</label>
                        <select name="category" class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white focus:outline-none focus:border-accent-500/50 transition-all">
                            @foreach(['web', 'mobile', 'api', 'desktop', 'other'] as $cat)
                                <option value="{{ $cat }}" {{ old('category', $project->category ?? 'web') === $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm text-zinc-400 mb-2">Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order ?? 0) }}" min="0"
                               class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white focus:outline-none focus:border-accent-500/50 transition-all">
                    </div>
                    <div class="flex items-end pb-1">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $project->is_featured ?? false) ? 'checked' : '' }}
                                   class="w-4 h-4 rounded bg-dark-700 border-white/10 text-accent-500 focus:ring-accent-500/50">
                            <span class="text-sm text-zinc-400">Featured</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm text-zinc-400 mb-2">Project Image</label>
                    @if(isset($project) && $project->image)
                        <div class="mb-3">
                            <img src="{{ Storage::url($project->image) }}" class="w-32 h-20 object-cover rounded-lg">
                        </div>
                    @endif
                    <input type="file" name="image" accept="image/*"
                           class="w-full text-sm text-zinc-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-accent-500/10 file:text-accent-400 hover:file:bg-accent-500/20 file:cursor-pointer file:transition-colors">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="px-6 py-3 text-sm font-medium text-white bg-accent-500 rounded-xl hover:bg-accent-600 transition-colors">
                    {{ isset($project) ? 'Update Project' : 'Create Project' }}
                </button>
                <a href="{{ route('admin.projects.index') }}" class="px-6 py-3 text-sm text-zinc-400 hover:text-white transition-colors">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
