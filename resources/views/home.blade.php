<x-layouts.app title="Portfolio — Awank | Full Stack Developer">

<x-navbar />

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- HERO SECTION --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section id="hero" class="relative min-h-screen flex items-center justify-center px-4 pt-20">
    {{-- Modern Background Layers --}}
    <div class="absolute inset-0 pointer-events-none">
        {{-- Dot Grid Pattern --}}
        <div class="absolute inset-0 opacity-[0.4] dark:opacity-[0.15]" 
             style="background-image: radial-gradient(circle, rgba(99, 102, 241, 0.15) 1px, transparent 1px); background-size: 30px 30px;"></div>
        
        {{-- Diagonal Lines Pattern --}}
        <div class="absolute inset-0 opacity-[0.03] dark:opacity-[0.02]" 
             style="background-image: repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(99, 102, 241, 0.5) 35px, rgba(99, 102, 241, 0.5) 36px);"></div>
        
        {{-- Gradient Mesh Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-br from-accent-500/5 via-transparent to-cyan-400/5"></div>
        
        {{-- Radial Gradient Glow --}}
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-accent-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-cyan-400/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-4xl mx-auto text-center relative z-10">
        {{-- Status badge --}}
        <div class="animate-fade-in-up inline-flex items-center gap-2 px-4 py-2 rounded-full glass mb-8">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            <span class="text-sm text-zinc-600 dark:text-zinc-400">Available for work</span>
        </div>

        {{-- Main heading --}}
        <h1 class="animate-fade-in-up delay-100 text-4xl sm:text-6xl lg:text-7xl font-bold text-zinc-900 dark:text-white leading-tight mb-6"
            style="opacity: 0; animation-fill-mode: forwards;">
            Hi, I'm <span class="text-gradient">Awank</span>
            <br>
            <span x-data="typewriter(['Full Stack Developer', 'Laravel Enthusiast', 'UI/UX Lover', 'Problem Solver'])"
                  class="text-zinc-600 dark:text-zinc-400" x-text="text + '|'"></span>
        </h1>

        {{-- Subtitle --}}
        <p class="animate-fade-in-up delay-300 text-lg sm:text-xl text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto mb-10 leading-relaxed"
           style="opacity: 0; animation-fill-mode: forwards;">
            I craft beautiful, performant web applications with clean code and modern technologies.
            Turning ideas into digital experiences.
        </p>

        {{-- CTA buttons --}}
        <div class="animate-fade-in-up delay-500 flex flex-col sm:flex-row items-center justify-center gap-4"
             style="opacity: 0; animation-fill-mode: forwards;">
            <a href="#projects"
               class="group px-8 py-3.5 rounded-xl bg-accent-500 text-white font-medium hover:bg-accent-600 transition-all duration-300 hover:shadow-lg hover:shadow-accent-500/25 flex items-center gap-2">
                View My Work
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
            <a href="#contact"
               class="px-8 py-3.5 rounded-xl glass text-zinc-700 dark:text-zinc-300 font-medium hover:text-zinc-900 dark:hover:text-white hover:border-zinc-900/20 dark:hover:border-white/20 transition-all duration-300">
                Get In Touch
            </a>
        </div>

        {{-- Scroll indicator --}}
        <div class="animate-fade-in delay-700 mt-20" style="opacity: 0; animation-fill-mode: forwards;">
            <a href="#about" class="inline-flex flex-col items-center gap-2 text-zinc-400 dark:text-zinc-600 hover:text-zinc-600 dark:hover:text-zinc-400 transition-colors">
                <span class="text-xs tracking-widest uppercase">Scroll</span>
                <div class="w-5 h-8 rounded-full border border-zinc-300 dark:border-zinc-700 flex justify-center pt-1.5">
                    <div class="w-1 h-2 rounded-full bg-zinc-400 dark:bg-zinc-500 animate-bounce"></div>
                </div>
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- ABOUT SECTION --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section id="about" class="py-24 lg:py-32 px-4">
    <div class="max-w-6xl mx-auto">
        <x-section-heading title="About Me" subtitle="A passionate developer who loves building things for the web" />

        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div x-data="scrollReveal" :class="shown ? 'animate-fade-in-up' : 'opacity-0'">
                <div class="glass-card rounded-2xl p-8">
                    <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed mb-6">
                        I'm a Full Stack Developer with a passion for creating beautiful, functional, and user-friendly web applications.
                        With expertise in Laravel ecosystem and modern frontend technologies, I build solutions that make a difference.
                    </p>
                    <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed mb-6">
                        When I'm not coding, you can find me exploring new technologies, contributing to open source,
                        or sharing knowledge with the developer community.
                    </p>
                    <div class="grid grid-cols-2 gap-4 pt-4 border-t border-white/5">
                        <div x-data="counter(3)" class="text-center">
                            <div class="text-2xl font-bold text-zinc-900 dark:text-white" x-text="current + '+'">0</div>
                            <div class="text-xs text-zinc-500 dark:text-zinc-500 mt-1">Years Experience</div>
                        </div>
                        <div x-data="counter(20)" class="text-center">
                            <div class="text-2xl font-bold text-zinc-900 dark:text-white" x-text="current + '+'">0</div>
                            <div class="text-xs text-zinc-500 dark:text-zinc-500 mt-1">Projects Completed</div>
                        </div>
                    </div>
                </div>
            </div>

            <div x-data="scrollReveal" :class="shown ? 'animate-fade-in-up delay-200' : 'opacity-0'" class="space-y-4">
                @foreach([
                    ['icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>', 'title' => 'Fast & Performant', 'desc' => 'Optimized applications with best practices'],
                    ['icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>', 'title' => 'Beautiful Design', 'desc' => 'Clean, modern, and responsive interfaces'],
                    ['icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>', 'title' => 'Secure & Reliable', 'desc' => 'Security-first approach in every project'],
                    ['icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>', 'title' => 'Responsive', 'desc' => 'Perfect experience on every device'],
                ] as $item)
                    <div class="flex items-start gap-4 glass rounded-xl p-4 hover:border-accent-500/20 transition-all duration-300">
                        <div class="text-accent-400 shrink-0">{!! $item['icon'] !!}</div>
                        <div>
                            <h4 class="text-sm font-semibold text-zinc-900 dark:text-white">{{ $item['title'] }}</h4>
                            <p class="text-xs text-zinc-600 dark:text-zinc-500">{{ $item['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- SKILLS SECTION --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section id="skills" class="py-24 lg:py-32 px-4 relative">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-accent-500/[0.02] to-transparent pointer-events-none"></div>
    <div class="max-w-6xl mx-auto relative z-10">
        <x-section-heading title="Skills & Tools" subtitle="Technologies I work with on a daily basis" />

        @foreach($skillCategories as $category => $categorySkills)
            <div class="mb-10 last:mb-0">
                <h3 class="text-sm font-medium text-zinc-600 dark:text-zinc-500 uppercase tracking-wider mb-5 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-accent-500"></span>
                    {{ ucfirst($category) }}
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($categorySkills as $skill)
                        <x-skill-card :skill="$skill" />
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- PROJECTS SECTION --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section id="projects" class="py-24 lg:py-32 px-4">
    <div class="max-w-6xl mx-auto">
        <x-section-heading title="Featured Projects" subtitle="A selection of my recent work and side projects" />

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $project)
                <x-project-card :project="$project" />
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- EXPERIENCE SECTION --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section id="experience" class="py-24 lg:py-32 px-4 relative">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-accent-500/[0.02] to-transparent pointer-events-none"></div>
    <div class="max-w-3xl mx-auto relative z-10">
        <x-section-heading title="Experience" subtitle="My professional journey so far" />

        <div>
            @foreach($experiences as $index => $experience)
                <x-experience-item :experience="$experience" :index="$index" />
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- CERTIFICATES SECTION --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section id="certificates" class="py-24 lg:py-32 px-4">
    <div class="max-w-6xl mx-auto">
        <x-section-heading title="Certificates" subtitle="Professional certifications and achievements" />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($certificates as $certificate)
                <x-certificate-card :certificate="$certificate" />
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- CONTACT SECTION --}}
{{-- ═══════════════════════════════════════════════════════ --}}
<section id="contact" class="py-24 lg:py-32 px-4 relative">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-accent-500/[0.02] to-transparent pointer-events-none"></div>
    <div class="max-w-2xl mx-auto relative z-10">
        <x-section-heading title="Get In Touch" subtitle="Have a project in mind? Let's talk about it." />

        {{-- Success message --}}
        @if(session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                 class="mb-8 p-4 rounded-xl bg-emerald-400/10 border border-emerald-400/20 text-emerald-400 text-sm flex items-center gap-3">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.send') }}" method="POST" class="space-y-5" x-data="scrollReveal" :class="shown ? 'animate-fade-in-up' : 'opacity-0'">
            @csrf
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label for="name" class="block text-sm text-zinc-600 dark:text-zinc-400 mb-2">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                           class="w-full px-4 py-3 rounded-xl bg-white dark:bg-dark-700 border border-zinc-200 dark:border-white/5 text-zinc-900 dark:text-white placeholder-zinc-400 dark:placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 focus:ring-1 focus:ring-accent-500/50 transition-all"
                           placeholder="Your name">
                    @error('name') <p class="text-xs text-rose-400 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm text-zinc-600 dark:text-zinc-400 mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                           class="w-full px-4 py-3 rounded-xl bg-white dark:bg-dark-700 border border-zinc-200 dark:border-white/5 text-zinc-900 dark:text-white placeholder-zinc-400 dark:placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 focus:ring-1 focus:ring-accent-500/50 transition-all"
                           placeholder="you@example.com">
                    @error('email') <p class="text-xs text-rose-400 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
            <div>
                <label for="subject" class="block text-sm text-zinc-600 dark:text-zinc-400 mb-2">Subject</label>
                <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                       class="w-full px-4 py-3 rounded-xl bg-white dark:bg-dark-700 border border-zinc-200 dark:border-white/5 text-zinc-900 dark:text-white placeholder-zinc-400 dark:placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 focus:ring-1 focus:ring-accent-500/50 transition-all"
                       placeholder="Project inquiry">
            </div>
            <div>
                <label for="message" class="block text-sm text-zinc-600 dark:text-zinc-400 mb-2">Message</label>
                <textarea id="message" name="message" rows="5" required
                          class="w-full px-4 py-3 rounded-xl bg-dark-700 border border-white/5 text-white placeholder-zinc-600 focus:outline-none focus:border-accent-500/50 focus:ring-1 focus:ring-accent-500/50 transition-all resize-none"
                          placeholder="Tell me about your project...">{{ old('message') }}</textarea>
                @error('message') <p class="text-xs text-rose-400 mt-1">{{ $message }}</p> @enderror
            </div>
            <button type="submit"
                    class="w-full py-3.5 rounded-xl bg-accent-500 text-white font-medium hover:bg-accent-600 transition-all duration-300 hover:shadow-lg hover:shadow-accent-500/25 flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                Send Message
            </button>
        </form>
    </div>
</section>

<x-footer />

</x-layouts.app>
