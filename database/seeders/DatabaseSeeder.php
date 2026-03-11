<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminUser;
use App\Models\Project;
use App\Models\Certification;
use App\Models\Experience;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        AdminUser::create([
            'name' => 'Vikash Kumar',
            'email' => 'vikashkumarbth381@gmail.com',
            'password' => Hash::make('Admin@123'),
            'bio' => 'Dedicated Laravel Developer with 2+ years of experience in building scalable web applications and CMS solutions. Skilled in REST API integration, database design, backend performance optimization, and delivering secure government and enterprise-level projects.',
            'github_url' => 'https://github.com/Vikashgupta95239',
            'linkedin_url' => 'https://linkedin.com/in/vikash-kumar-computer-science',
            'email_contact' => 'vikashkumarbth381@gmail.com',
            'phone' => '+91 95239 19654',
            'location' => 'New Delhi, India',
        ]);

        // Projects
        $projects = [
            [
                'title' => 'Government Ministry Portal',
                'description' => 'A fully compliant government website built according to GIGW and DBIM 3.0 guidelines. Features include accessibility compliance, STQC audit clearance, secure authentication, and dynamic CMS modules for content management.',
                'short_description' => 'GIGW-compliant government portal with CMS and security audits.',
                'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'Bootstrap', 'jQuery'],
                'category' => 'government',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'REST API Integration Platform',
                'description' => 'Built a robust API integration layer connecting government platforms with third-party services. Implemented secure token-based authentication, rate limiting, and comprehensive error handling.',
                'short_description' => 'Scalable API platform with secure token auth and rate limiting.',
                'tech_stack' => ['Laravel', 'REST API', 'MySQL', 'PHP'],
                'category' => 'api',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'CMS Backend Module System',
                'description' => 'Developed and optimized backend CMS modules for enterprise clients. The system supports multi-user roles, content versioning, media management, and workflow approvals.',
                'short_description' => 'Enterprise CMS with roles, versioning, and media management.',
                'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'AJAX', 'Bootstrap'],
                'category' => 'laravel',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Web Application Dashboard',
                'description' => 'A feature-rich web application dashboard with real-time data visualization, user management, and analytics reporting. Built with Laravel backend and interactive frontend.',
                'short_description' => 'Real-time dashboard with analytics and user management.',
                'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'JavaScript', 'Chart.js'],
                'category' => 'laravel',
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'title' => 'E-Commerce Backend',
                'description' => 'Scalable e-commerce backend system with product management, order processing, payment gateway integration, and inventory control.',
                'short_description' => 'Full-featured e-commerce backend with payment integration.',
                'tech_stack' => ['PHP', 'MySQL', 'AJAX', 'jQuery', 'Bootstrap'],
                'category' => 'php',
                'is_featured' => false,
                'sort_order' => 5,
            ],
            [
                'title' => 'Accessibility Compliance Tool',
                'description' => 'Internal tool developed to audit and fix WCAG 2.1 accessibility issues across government websites. Automated scanning and report generation.',
                'short_description' => 'WCAG 2.1 audit tool for government websites.',
                'tech_stack' => ['PHP', 'JavaScript', 'MySQL', 'HTML', 'CSS'],
                'category' => 'government',
                'is_featured' => false,
                'sort_order' => 6,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        // Certifications
        $certs = [
            ['title' => 'Full Stack Web Development', 'issuer' => 'Internshala', 'icon' => 'code'],
            ['title' => 'The SQL Programming Essentials Immersive Training', 'issuer' => 'Udemy', 'certificate_url' => '#', 'icon' => 'database'],
            ['title' => 'Master Laravel 2025: From Zero to Pro with Hands-On Projects', 'issuer' => 'Udemy', 'certificate_url' => '#', 'icon' => 'layers'],
            ['title' => 'Data Structures and Algorithms (C++)', 'issuer' => 'iNeuron Intelligence Pvt. Ltd.', 'icon' => 'cpu'],
            ['title' => 'Master Prompt Strategies to Communicate with AI', 'issuer' => 'Udemy', 'certificate_url' => '#', 'icon' => 'zap'],
            ['title' => 'Master ChatGPT to Enhance Creativity and Productivity', 'issuer' => 'Udemy', 'certificate_url' => '#', 'icon' => 'brain'],
        ];

        foreach ($certs as $i => $cert) {
            Certification::create(array_merge($cert, ['sort_order' => $i + 1]));
        }

        // Experience
        Experience::create([
            'title' => 'PHP Developer',
            'company' => 'ABM Knowledgeware Ltd',
            'location' => 'India',
            'start_date' => '2026-01-02',
            'is_current' => true,
            'responsibilities' => [
                'Working as a PHP Developer on web-based applications',
                'Involved in backend development, bug fixing, and feature enhancements',
                'Collaborating with team members to deliver scalable and maintainable solutions',
            ],
            'sort_order' => 1,
        ]);

        Experience::create([
            'title' => 'Jr. PHP / Laravel Developer',
            'company' => 'Silver Touch Technologies Ltd.',
            'location' => 'New Delhi, India',
            'start_date' => '2024-01-01',
            'end_date' => '2025-12-31',
            'is_current' => false,
            'responsibilities' => [
                'Completed 6 months of professional training in PHP and Laravel as part of onboarding',
                'Contributed to government website development in compliance with GIGW and DBIM 3.0 guidelines',
                'Worked at client locations including ministries, participating in requirement discussions and deployment',
                'Managed end-to-end project lifecycle from requirement gathering to backend CMS module development',
                'Resolved issues identified during accessibility, STQC, and security audits ensuring successful project go-live',
                'Developed and optimized backend CMS modules to improve efficiency and maintainability',
                'Integrated APIs with government platforms and third-party services',
            ],
            'sort_order' => 2,
        ]);

        Experience::create([
            'title' => 'Web Development Intern',
            'company' => 'iNeuron Intelligence Pvt Ltd',
            'location' => 'Bangalore, India',
            'start_date' => '2023-07-01',
            'end_date' => '2023-12-31',
            'is_current' => false,
            'responsibilities' => [
                'Assisted in developing user-friendly UI components',
                'Supported the team with bug fixes, maintenance, and minor feature updates',
            ],
            'sort_order' => 3,
        ]);
    }
}
