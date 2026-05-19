<x-layouts.admin>
    <x-slot:header>{{ isset($certificate) ? 'Edit Certificate' : 'Add Certificate' }}</x-slot:header>

    <div class="max-w-xl">
        <form method="POST"
              action="{{ isset($certificate) ? route('admin.certificates.update', $certificate) : route('admin.certificates.store') }}"
              enctype="multipart/form-data" class="space-y-6">
            @csrf
            @if(isset($certificate)) @method('PUT') @endif

            <div class="glass-card rounded-xl p-6 space-y-5">
                <div>
                    <label class="block text-sm text-zinc-400 mb-2">Title *</label>
                    <input type="text" name="title" value="{{ old('title', $certificate->title ?? '') }}" required
                           class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 transition-all">
                    @error('title') <p class="text-xs text-rose-400 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm text-zinc-400 mb-2">Issuer *</label>
                    <input type="text" name="issuer" value="{{ old('issuer', $certificate->issuer ?? '') }}" required
                           class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 transition-all" placeholder="e.g. Google, AWS">
                    @error('issuer') <p class="text-xs text-rose-400 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm text-zinc-400 mb-2">Credential ID</label>
                        <input type="text" name="credential_id" value="{{ old('credential_id', $certificate->credential_id ?? '') }}"
                               class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 transition-all">
                    </div>
                    <div>
                        <label class="block text-sm text-zinc-400 mb-2">Credential URL</label>
                        <input type="url" name="credential_url" value="{{ old('credential_url', $certificate->credential_url ?? '') }}"
                               class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 transition-all" placeholder="https://">
                    </div>
                </div>

                <div class="grid sm:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-sm text-zinc-400 mb-2">Issue Date *</label>
                        <input type="date" name="issue_date" value="{{ old('issue_date', isset($certificate) ? $certificate->issue_date->format('Y-m-d') : '') }}" required
                               class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white focus:outline-none focus:border-accent-500/50 transition-all">
                    </div>
                    <div>
                        <label class="block text-sm text-zinc-400 mb-2">Expiry Date</label>
                        <input type="date" name="expiry_date" value="{{ old('expiry_date', isset($certificate) && $certificate->expiry_date ? $certificate->expiry_date->format('Y-m-d') : '') }}"
                               class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white focus:outline-none focus:border-accent-500/50 transition-all">
                    </div>
                    <div>
                        <label class="block text-sm text-zinc-400 mb-2">Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $certificate->sort_order ?? 0) }}" min="0"
                               class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white focus:outline-none focus:border-accent-500/50 transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-sm text-zinc-400 mb-2">Certificate Image</label>
                    @if(isset($certificate) && $certificate->image)
                        <div class="mb-3"><img src="{{ Storage::url($certificate->image) }}" class="w-32 h-20 object-cover rounded-lg"></div>
                    @endif
                    <input type="file" name="image" accept="image/*"
                           class="w-full text-sm text-zinc-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-accent-500/10 file:text-accent-400 hover:file:bg-accent-500/20 file:cursor-pointer file:transition-colors">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="px-6 py-3 text-sm font-medium text-white bg-accent-500 rounded-xl hover:bg-accent-600 transition-colors">
                    {{ isset($certificate) ? 'Update Certificate' : 'Create Certificate' }}
                </button>
                <a href="{{ route('admin.certificates.index') }}" class="px-6 py-3 text-sm text-zinc-400 hover:text-white transition-colors">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
