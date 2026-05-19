import Alpine from 'alpinejs';

// ─── Alpine.js Setup ───────────────────────────────────────
window.Alpine = Alpine;

// ─── Scroll Reveal Component ───────────────────────────────
Alpine.data('scrollReveal', () => ({
    shown: false,
    init() {
        const observer = new IntersectionObserver(
            ([entry]) => {
                if (entry.isIntersecting) {
                    this.shown = true;
                    observer.unobserve(this.$el);
                }
            },
            { threshold: 0.1, rootMargin: '0px 0px -50px 0px' }
        );
        observer.observe(this.$el);
    },
}));

// ─── Navbar Component ──────────────────────────────────────
Alpine.data('navbar', () => ({
    scrolled: false,
    mobileOpen: false,
    init() {
        window.addEventListener('scroll', () => {
            this.scrolled = window.scrollY > 50;
        });
    },
    scrollTo(id) {
        this.mobileOpen = false;
        const el = document.getElementById(id);
        if (el) {
            el.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    },
}));

// ─── Counter Animation ─────────────────────────────────────
Alpine.data('counter', (target = 0) => ({
    current: 0,
    init() {
        const observer = new IntersectionObserver(
            ([entry]) => {
                if (entry.isIntersecting) {
                    this.animateCount();
                    observer.unobserve(this.$el);
                }
            },
            { threshold: 0.5 }
        );
        observer.observe(this.$el);
    },
    animateCount() {
        const duration = 1500;
        const steps = 60;
        const increment = target / steps;
        let step = 0;

        const timer = setInterval(() => {
            step++;
            this.current = Math.min(Math.round(increment * step), target);
            if (step >= steps) clearInterval(timer);
        }, duration / steps);
    },
}));

// ─── Typing Effect ─────────────────────────────────────────
Alpine.data('typewriter', (words = []) => ({
    text: '',
    wordIndex: 0,
    charIndex: 0,
    isDeleting: false,
    init() {
        this.type();
    },
    type() {
        const currentWord = words[this.wordIndex];

        if (this.isDeleting) {
            this.text = currentWord.substring(0, this.charIndex - 1);
            this.charIndex--;
        } else {
            this.text = currentWord.substring(0, this.charIndex + 1);
            this.charIndex++;
        }

        let delay = this.isDeleting ? 50 : 100;

        if (!this.isDeleting && this.charIndex === currentWord.length) {
            delay = 2000;
            this.isDeleting = true;
        } else if (this.isDeleting && this.charIndex === 0) {
            this.isDeleting = false;
            this.wordIndex = (this.wordIndex + 1) % words.length;
            delay = 500;
        }

        setTimeout(() => this.type(), delay);
    },
}));

// ─── Immersive Hero — Mouse Parallax with Spring Physics ──
Alpine.data('immersiveHero', () => ({
    // Cursor position (normalised –1 … 1)
    mouseX: 0,
    mouseY: 0,
    // Spring-interpolated values per layer
    springs: [
        { x: 0, y: 0, vx: 0, vy: 0 }, // layer 0 — deepest / slowest
        { x: 0, y: 0, vx: 0, vy: 0 }, // layer 1
        { x: 0, y: 0, vx: 0, vy: 0 }, // layer 2
        { x: 0, y: 0, vx: 0, vy: 0 }, // layer 3
        { x: 0, y: 0, vx: 0, vy: 0 }, // layer 4 — content
    ],
    // Physics per layer: higher stiffness = snappier, higher damping = less bounce
    layerConfigs: [
        { stiffness: 0.008, damping: 0.85, range: 60 },   // blob group 1
        { stiffness: 0.012, damping: 0.82, range: 45 },   // blob group 2
        { stiffness: 0.018, damping: 0.80, range: 30 },   // blob group 3
        { stiffness: 0.025, damping: 0.78, range: 20 },   // particles
        { stiffness: 0.035, damping: 0.75, range: 8 },    // content (subtle)
    ],
    time: 0,
    rafId: null,
    isActive: false,

    init() {
        const hero = this.$el;
        hero.addEventListener('mousemove', (e) => {
            const rect = hero.getBoundingClientRect();
            this.mouseX = ((e.clientX - rect.left) / rect.width - 0.5) * 2;
            this.mouseY = ((e.clientY - rect.top) / rect.height - 0.5) * 2;
            this.isActive = true;
        });
        hero.addEventListener('mouseleave', () => {
            this.mouseX = 0;
            this.mouseY = 0;
            this.isActive = false;
        });
        this.tick();
    },

    tick() {
        this.time += 0.008;

        // Update each spring layer with damped spring physics
        this.springs.forEach((s, i) => {
            const cfg = this.layerConfigs[i];
            const targetX = this.mouseX * cfg.range;
            const targetY = this.mouseY * cfg.range;

            // Spring force
            const forceX = (targetX - s.x) * cfg.stiffness;
            const forceY = (targetY - s.y) * cfg.stiffness;

            // Apply damping to velocity
            s.vx = (s.vx + forceX) * cfg.damping;
            s.vy = (s.vy + forceY) * cfg.damping;

            // Integrate position
            s.x += s.vx;
            s.y += s.vy;
        });

        this.rafId = requestAnimationFrame(() => this.tick());
    },

    // ── Style generators for the template ──

    getGridStyle() {
        const s = this.springs[0];
        return `transform: translate(${s.x * 0.3}px, ${s.y * 0.3}px);`;
    },

    getGlowStyle() {
        const s = this.springs[1];
        const cx = 50 + s.x * 0.8;
        const cy = 50 + s.y * 0.8;
        return `background: radial-gradient(600px circle at ${cx}% ${cy}%, rgba(99,102,241,0.08), transparent 60%);`;
    },

    getBlobStyle(index) {
        // Each blob uses a different spring layer + autonomous floating orbit
        const layerIndex = Math.min(index % 3, 2);
        const s = this.springs[layerIndex];
        const t = this.time;

        // Autonomous orbit per blob (unique phase & radius)
        const phase = index * 1.2;
        const floatX = Math.sin(t * 0.7 + phase) * (12 + index * 4);
        const floatY = Math.cos(t * 0.5 + phase * 0.7) * (10 + index * 3);

        // Combine cursor parallax + floating
        const tx = s.x + floatX;
        const ty = s.y + floatY;
        const scale = 1 + Math.sin(t * 0.4 + phase) * 0.08;
        const rotate = Math.sin(t * 0.3 + phase) * 5;

        return `transform: translate(${tx}px, ${ty}px) scale(${scale}) rotate(${rotate}deg);`;
    },

    getParticleStyle(i, total) {
        const s = this.springs[3];
        const t = this.time;
        const angle = ((i - 1) / total) * Math.PI * 2;
        const radius = 180 + Math.sin(t * 0.5 + i) * 30;

        const baseX = Math.cos(angle + t * 0.2) * radius;
        const baseY = Math.sin(angle + t * 0.15) * radius;

        const tx = baseX + s.x;
        const ty = baseY + s.y;
        const sc = 0.8 + Math.sin(t * 0.8 + i * 1.5) * 0.5;
        const op = 0.4 + Math.sin(t * 0.6 + i) * 0.3;

        return `transform: translate(${tx}px, ${ty}px) scale(${sc}); opacity: ${op};`;
    },

    getFloatingStyle(speed) {
        const s = this.springs[2];
        const t = this.time;
        const floatX = Math.sin(t * speed) * 20;
        const floatY = Math.cos(t * speed * 0.8) * 15;
        return `transform: translate(${s.x + floatX}px, ${s.y + floatY}px);`;
    },

    getContentStyle() {
        const s = this.springs[4];
        return `transform: translate(${-s.x * 0.4}px, ${-s.y * 0.4}px);`;
    },

    destroy() {
        if (this.rafId) cancelAnimationFrame(this.rafId);
    },
}));







// ─── Custom Cursor Component ──────────────────────────────
Alpine.data('customCursor', () => ({
    x: 0,
    y: 0,
    targetX: 0,
    targetY: 0,
    isPointer: false,
    isHidden: true,
    trail: [],
    maxTrailLength: 12,
    
    init() {




        // Initialize trail positions
        for (let i = 0; i < this.maxTrailLength; i++) {
            this.trail.push({ 
                x: 0, 
                y: 0, 
                scale: 1 - (i * 0.08),
                opacity: 1 - (i * 0.08)
            });
        }

        // Track mouse movement
        document.addEventListener('mousemove', (e) => {
            this.targetX = e.clientX;
            this.targetY = e.clientY;
            this.isHidden = false;
        });






        // Hide cursor when leaving window
        document.addEventListener('mouseleave', () => {
            this.isHidden = true;
        });







        // Detect hoverable elements
        document.addEventListener('mouseover', (e) => {
            const target = e.target;
            this.isPointer = target.matches('a, button, [role="button"], input, textarea, select, .cursor-pointer');
        });
        
        // Smooth animation loop
        this.animate();
    },
    
    animate() {





        // Smooth easing for main cursor
        const ease = 0.18;
        this.x += (this.targetX - this.x) * ease;
        this.y += (this.targetY - this.y) * ease;

        // Update trail with cascading delay
        for (let i = this.trail.length - 1; i > 0; i--) {
            this.trail[i].x += (this.trail[i - 1].x - this.trail[i].x) * 0.25;
            this.trail[i].y += (this.trail[i - 1].y - this.trail[i].y) * 0.25;
        }
        this.trail[0].x += (this.x - this.trail[0].x) * 0.35;
        this.trail[0].y += (this.y - this.trail[0].y) * 0.35;

        requestAnimationFrame(() => this.animate());
    },








    getCursorStyle() {
        const scale = this.isPointer ? 1.8 : 1;
        const opacity = this.isHidden ? 0 : 1;
        return `transform: translate(${this.x}px, ${this.y}px) scale(${scale}); opacity: ${opacity};`;
    },




































    getTrailStyle(index) {
        const trail = this.trail[index];
        const scale = trail.scale * (this.isPointer ? 0.7 : 1);
        const opacity = trail.opacity * (this.isHidden ? 0 : 0.7);
        return `transform: translate(${trail.x}px, ${trail.y}px) scale(${scale}); opacity: ${opacity};`;
    }
}));

// ─── Theme Toggle (Dark / Light Mode) ─────────────────────
Alpine.data('themeToggle', () => ({
    isDark: true,
    init() {
        const saved = localStorage.getItem('theme');
        this.isDark = saved !== 'light';
        this.applyTheme();

        // Listen for toggle events from navbar button
        window.addEventListener('toggle-theme', () => {
            this.isDark = !this.isDark;
            localStorage.setItem('theme', this.isDark ? 'dark' : 'light');
            this.applyTheme();
        });
    },
    applyTheme() {
        if (this.isDark) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    },
}));

// ─── Dark Mode Toggle ─────────────────────────────────────
Alpine.store('darkMode', {
    on: localStorage.getItem('darkMode') === 'true' || 
        (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches),
    
    toggle() {
        this.on = !this.on;
        localStorage.setItem('darkMode', this.on);
        this.updateDOM();
    },
    
    updateDOM() {
        if (this.on) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    },
    
    init() {
        this.updateDOM();
    }
});

// Initialize dark mode on page load
document.addEventListener('alpine:init', () => {
    Alpine.store('darkMode').init();
});

// Listen for toggle event
document.addEventListener('toggle-theme', () => {
    Alpine.store('darkMode').toggle();
});

Alpine.start();

