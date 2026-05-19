<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Certificate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::updateOrCreate(
            ['email' => 'admin@portfolio.com'],
            [
                'name' => 'Admin Portfolio',
                'password' => Hash::make('password'),
            ]
        );

        // Sample Skills
        $skills = [
            ['name' => 'Laravel', 'icon' => 'laravel', 'category' => 'backend', 'proficiency' => 90, 'sort_order' => 1],
            ['name' => 'PHP', 'icon' => 'php', 'category' => 'backend', 'proficiency' => 88, 'sort_order' => 2],
            ['name' => 'MySQL', 'icon' => 'mysql', 'category' => 'backend', 'proficiency' => 85, 'sort_order' => 3],
            ['name' => 'JavaScript', 'icon' => 'javascript', 'category' => 'frontend', 'proficiency' => 85, 'sort_order' => 4],
            ['name' => 'Vue.js', 'icon' => 'vuejs', 'category' => 'frontend', 'proficiency' => 80, 'sort_order' => 5],
            ['name' => 'Tailwind CSS', 'icon' => 'tailwindcss', 'category' => 'frontend', 'proficiency' => 90, 'sort_order' => 6],
            ['name' => 'Alpine.js', 'icon' => 'alpinejs', 'category' => 'frontend', 'proficiency' => 82, 'sort_order' => 7],
            ['name' => 'Git', 'icon' => 'git', 'category' => 'tools', 'proficiency' => 85, 'sort_order' => 8],
            ['name' => 'Docker', 'icon' => 'docker', 'category' => 'tools', 'proficiency' => 75, 'sort_order' => 9],
            ['name' => 'Linux', 'icon' => 'linux', 'category' => 'tools', 'proficiency' => 78, 'sort_order' => 10],
            ['name' => 'REST API', 'icon' => 'api', 'category' => 'backend', 'proficiency' => 88, 'sort_order' => 11],
            ['name' => 'HTML/CSS', 'icon' => 'html', 'category' => 'frontend', 'proficiency' => 92, 'sort_order' => 12],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(['name' => $skill['name']], $skill);
        }

        // Sample Projects
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'slug' => 'e-commerce-platform',
                'description' => 'A full-featured e-commerce platform built with Laravel, featuring product management, shopping cart, payment integration with Midtrans, and real-time order tracking. The platform supports multiple vendors and has an advanced admin dashboard.',
                'short_description' => 'Full-featured e-commerce with payment integration',
                'url' => 'https://example.com',
                'github_url' => 'https://github.com/awank/ecommerce',
                'tech_stack' => ['Laravel', 'Vue.js', 'MySQL', 'Tailwind CSS', 'Midtrans'],
                'category' => 'web',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Task Management App',
                'slug' => 'task-management-app',
                'description' => 'A collaborative task management application with real-time updates, team workspaces, kanban boards, and time tracking. Built with modern technologies for optimal performance.',
                'short_description' => 'Collaborative task manager with kanban boards',
                'url' => 'https://example.com',
                'github_url' => 'https://github.com/awank/taskmanager',
                'tech_stack' => ['Laravel', 'Livewire', 'Alpine.js', 'MySQL'],
                'category' => 'web',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'REST API Starter Kit',
                'slug' => 'rest-api-starter-kit',
                'description' => 'A production-ready REST API starter kit with authentication, rate limiting, versioning, comprehensive documentation, and automated testing. Designed for rapid API development.',
                'short_description' => 'Production-ready API boilerplate with auth & docs',
                'url' => null,
                'github_url' => 'https://github.com/awank/api-starter',
                'tech_stack' => ['Laravel', 'Sanctum', 'Swagger', 'PHPUnit'],
                'category' => 'api',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Portfolio Website',
                'slug' => 'portfolio-website',
                'description' => 'A modern personal portfolio website with dark mode, glassmorphism design, smooth animations, and admin dashboard. Built with Laravel and Tailwind CSS.',
                'short_description' => 'Modern portfolio with dark mode & glassmorphism',
                'url' => 'https://portfolio.example.com',
                'github_url' => 'https://github.com/awank/portfolio',
                'tech_stack' => ['Laravel', 'Blade', 'Tailwind CSS', 'Alpine.js'],
                'category' => 'web',
                'is_featured' => false,
                'sort_order' => 4,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['slug' => $project['slug']], $project);
        }

        // Sample Experiences
        $experiences = [
            [
                'company' => 'Tech Startup Inc.',
                'position' => 'Senior Full Stack Developer',
                'description' => 'Led development of core product features using Laravel and Vue.js. Mentored junior developers and established coding standards. Optimized database queries resulting in 40% performance improvement.',
                'start_date' => '2023-01-01',
                'end_date' => null,
                'is_current' => true,
                'location' => 'Jakarta, Indonesia',
                'type' => 'full-time',
                'sort_order' => 1,
            ],
            [
                'company' => 'Digital Agency Co.',
                'position' => 'Full Stack Developer',
                'description' => 'Developed and maintained multiple client projects including e-commerce platforms, CMS, and booking systems. Worked closely with design team to implement pixel-perfect UIs.',
                'start_date' => '2021-03-01',
                'end_date' => '2022-12-31',
                'is_current' => false,
                'location' => 'Bandung, Indonesia',
                'type' => 'full-time',
                'sort_order' => 2,
            ],
            [
                'company' => 'Freelance',
                'position' => 'Web Developer',
                'description' => 'Worked on various freelance projects including company profiles, landing pages, and small-scale web applications. Gained experience in client communication and project management.',
                'start_date' => '2020-01-01',
                'end_date' => '2021-02-28',
                'is_current' => false,
                'location' => 'Remote',
                'type' => 'freelance',
                'sort_order' => 3,
            ],
        ];

        foreach ($experiences as $exp) {
            Experience::updateOrCreate(
                ['company' => $exp['company'], 'position' => $exp['position']],
                $exp
            );
        }

        // Sample Certificates
        $certificates = [
            [
                'title' => 'Laravel Certified Developer',
                'issuer' => 'Laravel',
                'credential_id' => 'LC-2024-001',
                'credential_url' => 'https://certification.laravel.com',
                'issue_date' => '2024-01-15',
                'expiry_date' => '2026-01-15',
                'sort_order' => 1,
            ],
            [
                'title' => 'AWS Cloud Practitioner',
                'issuer' => 'Amazon Web Services',
                'credential_id' => 'AWS-CP-2023',
                'credential_url' => 'https://aws.amazon.com/certification',
                'issue_date' => '2023-06-20',
                'expiry_date' => '2026-06-20',
                'sort_order' => 2,
            ],
            [
                'title' => 'Professional Web Developer',
                'issuer' => 'Dicoding Indonesia',
                'credential_id' => 'DC-WD-2023',
                'credential_url' => 'https://dicoding.com/certificates',
                'issue_date' => '2023-03-10',
                'expiry_date' => null,
                'sort_order' => 3,
            ],
        ];

        foreach ($certificates as $cert) {
            Certificate::updateOrCreate(
                ['credential_id' => $cert['credential_id']],
                $cert
            );
        }
    }
}
