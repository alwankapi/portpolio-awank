{{-- Navbar Component --}}
<nav x-data="navbar" :class="scrolled ? 'glass-strong shadow-lg shadow-black/20 dark:shadow-black/20' : 'bg-transparent'"
     class="fixed top-0 left-0 right-0 z-50 transition-all duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">

            {{-- Logo Placeholder (empty for spacing) --}}
            <div class="w-8"></div>

            {{-- Desktop Menu --}}
            <div class="hidden md:flex items-center gap-1">
                @foreach(['about' => 'About', 'skills' => 'Skills', 'projects' => 'Projects', 'experience' => 'Experience', 'certificates' => 'Certificates', 'contact' => 'Contact'] as $id => $label)
                    <button @click="scrollTo('{{ $id }}')"
                            class="px-4 py-2 text-sm text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white rounded-lg hover:bg-black/5 dark:hover:bg-white/5 transition-all duration-300 cursor-pointer">
                        {{ $label }}
                    </button>
                @endforeach
            </div>

            {{-- Dark Mode Toggle & Mobile Toggle --}}
            <div class="flex items-center gap-3">
                {{-- Dark/Light Mode Toggle --}}
                <button x-data @click="$dispatch('toggle-theme')"
                        class="p-2 rounded-lg text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white hover:bg-black/5 dark:hover:bg-white/5 transition-all duration-300"
                        aria-label="Toggle dark mode">
                    {{-- Sun icon (shown in dark mode) --}}
                    <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    {{-- Moon icon (shown in light mode) --}}
                    <svg class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                </button>

                {{-- Mobile hamburger --}}
                <button @click="mobileOpen = !mobileOpen" class="md:hidden p-2 text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">
                    <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    <svg x-show="mobileOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="mobileOpen" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="md:hidden pb-4 border-t border-black/5 dark:border-white/5">
            <div class="pt-4 space-y-1">
                @foreach(['about' => 'About', 'skills' => 'Skills', 'projects' => 'Projects', 'experience' => 'Experience', 'certificates' => 'Certificates', 'contact' => 'Contact'] as $id => $label)
                    <button @click="scrollTo('{{ $id }}')"
                            class="block w-full text-left px-4 py-3 text-sm text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white hover:bg-black/5 dark:hover:bg-white/5 rounded-lg transition-all">
                        {{ $label }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</nav>
