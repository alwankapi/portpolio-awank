<!DOCTYPE html>
<html lang="en" class="scroll-smooth dark" x-data="themeToggle" :class="{ 'dark': isDark }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Personal portfolio of a passionate Full Stack Developer. Explore projects, skills, and experience.">
    <meta name="keywords" content="portfolio, developer, full stack, laravel, web development">
    <meta name="author" content="Awank">

    <title>{{ $title ?? 'Portfolio — Awank.dev' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900|jetbrains-mono:400,500" rel="stylesheet" />

    {{-- Prevent flash of wrong theme --}}
    <script>
        (function() {
            const saved = localStorage.getItem('theme');
            if (saved === 'light') {
                document.documentElement.classList.remove('dark');
            } else {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-dark-900 text-zinc-800 dark:text-zinc-200 antialiased font-sans overflow-x-hidden transition-colors duration-300">

    {{-- Background ambient glow --}}
    <div class="fixed inset-0 pointer-events-none -z-10" aria-hidden="true">
        <div class="absolute top-0 left-1/4 w-[600px] h-[600px] bg-accent-500/5 rounded-full blur-[150px]"></div>
        <div class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-cyan-400/5 rounded-full blur-[150px]"></div>
    </div>

    {{ $slot }}

</body>
</html>
