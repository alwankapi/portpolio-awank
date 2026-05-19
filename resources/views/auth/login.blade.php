<x-layouts.app title="Admin Login — Portfolio">

<div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md">
        {{-- Logo --}}
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-accent-500 to-cyan-400 flex items-center justify-center text-white font-bold group-hover:scale-110 transition-transform">A</div>
                <span class="text-xl font-bold text-white">Awank</span>
            </a>
            <p class="text-sm text-zinc-500 mt-3">Admin Dashboard Login</p>
        </div>

        {{-- Login Card --}}
        <div class="glass-card rounded-2xl p-8">
            @if($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-rose-400/10 border border-rose-400/20 text-rose-400 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-sm text-zinc-400 mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 focus:ring-1 focus:ring-accent-500/50 transition-all"
                           placeholder="admin@portfolio.com">
                </div>
                <div>
                    <label for="password" class="block text-sm text-zinc-400 mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                           class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 focus:ring-1 focus:ring-accent-500/50 transition-all"
                           placeholder="••••••••">
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 rounded bg-dark-700 border-white/10 text-accent-500 focus:ring-accent-500/50">
                    <label for="remember" class="text-sm text-zinc-500">Remember me</label>
                </div>
                <button type="submit" class="w-full py-3.5 rounded-xl bg-accent-500 text-white font-medium hover:bg-accent-600 transition-all duration-300 hover:shadow-lg hover:shadow-accent-500/25">
                    Sign In
                </button>
            </form>
        </div>

        <p class="text-center text-sm text-zinc-600 mt-6">
            <a href="{{ route('home') }}" class="text-zinc-400 hover:text-white transition-colors">&larr; Back to Home</a>
        </p>
    </div>
</div>

</x-layouts.app>
