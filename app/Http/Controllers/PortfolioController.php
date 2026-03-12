<?php
// app/Http/Controllers/PortfolioController.php
namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\Project;
use App\Models\Certification;
use App\Models\Experience;

class PortfolioController extends Controller
{
    public function index()
    {
        // ── Load admin profile (drives all dynamic data) ──────────────
        $admin = AdminUser::first();
        if ($admin) {
            $admin->increment('profile_views');
        }

        // ── Projects ──────────────────────────────────────────────────
        $projectRows    = Project::orderBy('sort_order')->get();
        $certRows       = Certification::orderBy('sort_order')->get();
        $experienceRows = Experience::orderBy('sort_order')->get();

        // ── Build portfolio object (real data or dummy) ───────────────
        $portfolio = $this->buildPortfolio($admin);

        // ── Map DB rows to blade-friendly arrays ─────────────────────
        $projects       = $this->mapProjects($projectRows);
        $certifications = $this->mapCertifications($certRows);
        $experiences    = $this->mapExperiences($experienceRows);
        $skillGroups    = $this->skillGroups();
        $education      = $this->education();

        // ── Shared nav/social links (pulled from admin profile) ───────
        $navLinks    = $this->navLinks();
        $socialLinks = $this->socialLinks($admin);
        $heroChips   = $this->heroChips();

        return view('portfolio', compact(
            'portfolio',
            'projects',
            'certifications',
            'experiences',
            'skillGroups',
            'education',
            'navLinks',
            'socialLinks',
            'heroChips'
        ));
    }

    public function downloadResume()
    {
        $admin = AdminUser::first();
        if ($admin && $admin->resume_pdf) {
            $path = storage_path('app/public/' . $admin->resume_pdf);
            if (file_exists($path)) {
                return response()->download($path, 'Vikash_Kumar_Resume.pdf');
            }
        }
        abort(404, 'Resume not found. Please upload it from Admin → Profile.');
    }

    // ═══════════════════════════════════════════════════════════════
    // Build portfolio object from AdminUser OR dummy fallback
    // ═══════════════════════════════════════════════════════════════
    private function buildPortfolio(?AdminUser $admin): object
    {
        $name     = $admin?->name     ?? 'Vikash Kumar';
        $email    = $admin?->email_contact ?? $admin?->email ?? 'vikashkumarbth381@gmail.com';
        $phone    = $admin?->phone    ?? '+91 95239 19654';
        $location = $admin?->location ?? 'New Delhi';
        $github   = $admin?->github_url   ?? 'https://github.com/Vikashgupta95239';
        $linkedin = $admin?->linkedin_url ?? 'https://linkedin.com/in/vikash-kumar-computer-science';

        $resumeUrl = ($admin?->resume_pdf)
            ? route('resume.download')
            : '#';

        // Parse github/linkedin handles
        $githubHandle   = ltrim(parse_url($github, PHP_URL_PATH) ?? 'Vikashgupta95239', '/');
        $linkedinHandle = last(explode('/', rtrim($linkedin, '/')));

        // Bio: from admin or default
        $bio = $admin?->bio
            ? e($admin->bio)
            : 'Building <strong>scalable web applications</strong> &amp; government-grade CMS solutions with clean code, precision, and real-world impact. Specialized in <strong>REST APIs</strong>, Laravel &amp; GIGW compliance.';

        return (object) [
            'name'             => $name,
            'title'            => 'Laravel Developer',
            'bio'              => $bio,
            'location'         => $location,
            'is_available'     => true,
            'email'            => $email,
            'phone'            => $phone,
            'github'           => $github,
            'github_handle'    => $githubHandle,
            'linkedin'         => $linkedin,
            'linkedin_handle'  => $linkedinHandle,
            'resume_url'       => $resumeUrl,
            'type_roles'       => 'Laravel Developer|PHP Developer|Backend Engineer|API Architect|CMS Specialist',
            'contact_intro'    => "Have a project, opportunity, or want to connect? I'm always open to new challenges. I respond within 24 hours.",
            'meta_description' => 'Laravel Developer specializing in scalable web applications and government-grade CMS solutions.',
            'photo'            => $admin?->photo,
            'stats' => [
                ['value' => '2+',  'label' => 'Years Exp.'],
                ['value' => $this->countOrDefault(Project::count(), 10) . '+', 'label' => 'Projects'],
                ['value' => '3',   'label' => 'Companies'],
                ['value' => $this->countOrDefault(Certification::count(), 6) . '', 'label' => 'Certs'],
            ],
        ];
    }

    private function countOrDefault(int $count, int $default): int
    {
        return $count > 0 ? $count : $default;
    }

    // ═══════════════════════════════════════════════════════════════
    // Map Eloquent rows → blade arrays
    // ═══════════════════════════════════════════════════════════════
    private function mapProjects($rows): array
    {
        if ($rows->isEmpty()) {
            return $this->dummyProjects();
        }

        return $rows->map(function ($p) {
            $thumb = $p->thumbnail
                ? asset('storage/' . $p->thumbnail)
                : 'https://images.unsplash.com/photo-1607799279861-4dd421887fb3?w=600&h=380&fit=crop&q=70';

            return [
                'category'     => $p->category,
                'title'        => $p->title,
                'description'  => $p->short_description ?: $p->description,
                'image_url'    => $thumb,
                'tags'         => $p->tech_stack ?? [],
                'github_url'   => $p->github_url,
                'live_url'     => $p->live_url,
                'confidential' => empty($p->github_url) && empty($p->live_url),
            ];
        })->toArray();
    }

    private function mapCertifications($rows): array
    {
        if ($rows->isEmpty()) {
            return $this->dummyCertifications();
        }

        return $rows->map(function ($c) {
            return [
                'icon'        => 'fas fa-' . ($c->icon ?? 'certificate'),
                'name'        => $c->title,
                'issuer'      => $c->issuer,
                'issuer_icon' => in_array(strtolower($c->issuer), ['coursera','google']) ? 'fab fa-google' : 'fas fa-building',
                'cert_url'    => $c->certificate_url ?? '#',
            ];
        })->toArray();
    }

    private function mapExperiences($rows): array
    {
        if ($rows->isEmpty()) {
            return $this->dummyExperiences();
        }

        return $rows->map(function ($e) {
            return [
                'period'   => $e->duration,
                'role'     => $e->title,
                'company'  => $e->company . ' · ' . $e->location,
                'location' => $e->location . ', India',
                'current'  => (bool) $e->is_current,
                'badge'    => $e->is_current ? '● Current' : null,
                'bullets'  => is_array($e->responsibilities) ? $e->responsibilities : [],
            ];
        })->toArray();
    }

    // ═══════════════════════════════════════════════════════════════
    // Static data (skills & education are managed here — not in DB yet)
    // ═══════════════════════════════════════════════════════════════
    private function skillGroups(): array
    {
        return [
            ['emoji' => '⚙️', 'category' => 'Backend',     'skills' => [['name'=>'PHP','percent'=>92],['name'=>'Laravel','percent'=>90],['name'=>'CakePHP','percent'=>75]]],
            ['emoji' => '🎨', 'category' => 'Frontend',    'skills' => [['name'=>'HTML / CSS','percent'=>88],['name'=>'JavaScript','percent'=>80],['name'=>'Bootstrap / AJAX','percent'=>85]]],
            ['emoji' => '🗄️','category' => 'Database',    'skills' => [['name'=>'MySQL','percent'=>88],['name'=>'DB Design','percent'=>82],['name'=>'Query Optimization','percent'=>78]]],
            ['emoji' => '🔧', 'category' => 'Tools & APIs','skills' => [['name'=>'Git / GitHub','percent'=>85],['name'=>'REST APIs','percent'=>90],['name'=>'GIGW / WCAG','percent'=>80]]],
        ];
    }

    private function education(): array
    {
        return [
            ['period'=>'2020 – 2024','location'=>'Bhopal', 'emoji'=>'🎓','degree'=>'B.Tech — Computer Science Engineering','school'=>'Sagar Group of Institutions','score'=>'CGPA: 8.33 / 10'],
            ['period'=>'2018 – 2020','location'=>'Bettiah','emoji'=>'🏫','degree'=>'Intermediate — Science Stream',          'school'=>'MJK College Bettiah',            'score'=>'76.20%'],
            ['period'=>'2018',       'location'=>'Bettiah','emoji'=>'📚','degree'=>'Class X — Bihar State Board',             'school'=>'Alok Bharati Bettiah',           'score'=>'75.80%'],
        ];
    }

    private function navLinks(): array
    {
        return [
            ['href' => '#about',      'label' => 'About',      'index' => '01'],
            ['href' => '#skills',     'label' => 'Skills',     'index' => '02'],
            ['href' => '#experience', 'label' => 'Experience', 'index' => '03'],
            ['href' => '#projects',   'label' => 'Projects',   'index' => '04'],
            ['href' => '#contact',    'label' => 'Contact',    'index' => '05'],
        ];
    }

    private function socialLinks(?AdminUser $admin): array
    {
        $github   = $admin?->github_url   ?? 'https://github.com/Vikashgupta95239';
        $linkedin = $admin?->linkedin_url ?? 'https://linkedin.com/in/vikash-kumar-computer-science';
        $email    = $admin?->email_contact ?? $admin?->email ?? 'vikashkumarbth381@gmail.com';
        $phone    = preg_replace('/\s+/', '', $admin?->phone ?? '+919523919654');

        return [
            ['href' => $github,               'icon' => 'fab fa-github',      'label' => 'GitHub'],
            ['href' => $linkedin,             'icon' => 'fab fa-linkedin-in', 'label' => 'LinkedIn'],
            ['href' => 'mailto:' . $email,   'icon' => 'fas fa-envelope',    'label' => 'Email'],
            ['href' => 'tel:' . $phone,      'icon' => 'fas fa-phone',       'label' => 'Phone'],
        ];
    }

    private function heroChips(): array
    {
        return [
            ['label' => 'Laravel 12', 'color' => '#C8860A'],
            ['label' => 'PHP 8.2',    'color' => '#4BAB7C'],
            ['label' => 'REST APIs',  'color' => '#5aaee8'],
        ];
    }

    // ═══════════════════════════════════════════════════════════════
    // Dummy fallbacks (shown when DB is empty)
    // ═══════════════════════════════════════════════════════════════
    private function dummyProjects(): array
    {
        return [
            ['category'=>'government','title'=>'Government Ministry Portal',    'description'=>'GIGW & DBIM 3.0 compliant portal with multilingual support serving 50,000+ citizens.','image_url'=>'https://images.unsplash.com/photo-1568992687947-868a62a9f521?w=600&h=380&fit=crop&q=70','tags'=>['Laravel','PHP','MySQL','GIGW'],       'github_url'=>null,'live_url'=>null,'confidential'=>true],
            ['category'=>'api',       'title'=>'REST API Integration Platform', 'description'=>'Robust RESTful API with JWT auth, rate limiting & Swagger documentation.',              'image_url'=>'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=600&h=380&fit=crop&q=70','tags'=>['Laravel','REST API','JWT'],           'github_url'=>'https://github.com/Vikashgupta95239','live_url'=>null,'confidential'=>false],
            ['category'=>'laravel',   'title'=>'CMS Backend Module System',     'description'=>'Modular Laravel backend with multi-role auth, dynamic forms & scheduled tasks.',        'image_url'=>'https://images.unsplash.com/photo-1607799279861-4dd421887fb3?w=600&h=380&fit=crop&q=70','tags'=>['Laravel 10','Blade','MySQL'],         'github_url'=>'https://github.com/Vikashgupta95239','live_url'=>null,'confidential'=>false],
            ['category'=>'laravel',   'title'=>'Web Application Dashboard',     'description'=>'Real-time analytics with chart visualizations, export & role-based reporting.',         'image_url'=>'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=600&h=380&fit=crop&q=70','tags'=>['PHP','CakePHP','Chart.js'],           'github_url'=>'https://github.com/Vikashgupta95239','live_url'=>null,'confidential'=>false],
            ['category'=>'php',       'title'=>'E-Commerce Backend Platform',   'description'=>'Full-featured e-commerce with inventory management & payment integration.',              'image_url'=>'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&h=380&fit=crop&q=70','tags'=>['Laravel 11','Razorpay','Redis'],       'github_url'=>'https://github.com/Vikashgupta95239','live_url'=>null,'confidential'=>false],
            ['category'=>'government','title'=>'Accessibility Compliance Tool', 'description'=>'Automated WCAG 2.1 checker integrated into CMS to detect accessibility violations.',    'image_url'=>'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=600&h=380&fit=crop&q=70','tags'=>['Laravel','WCAG','PHP'],               'github_url'=>null,'live_url'=>null,'confidential'=>true],
        ];
    }

    private function dummyCertifications(): array
    {
        return [
            ['icon'=>'fas fa-code',        'name'=>'Full Stack Web Development',                         'issuer'=>'Internshala',  'issuer_icon'=>'fas fa-building','cert_url'=>'#'],
            ['icon'=>'fas fa-database',    'name'=>'The SQL Programming Essentials Immersive Training',  'issuer'=>'Udemy',        'issuer_icon'=>'fas fa-building','cert_url'=>'#'],
            ['icon'=>'fas fa-laptop-code', 'name'=>'Master Laravel 2025: From Zero to Pro',              'issuer'=>'Udemy',        'issuer_icon'=>'fas fa-building','cert_url'=>'#'],
            ['icon'=>'fas fa-sitemap',     'name'=>'Data Structures and Algorithms (C++)',               'issuer'=>'iNeuron',      'issuer_icon'=>'fas fa-building','cert_url'=>'#'],
            ['icon'=>'fas fa-lightbulb',   'name'=>'Master Prompt Strategies to Communicate with AI',   'issuer'=>'Udemy',        'issuer_icon'=>'fas fa-building','cert_url'=>'#'],
            ['icon'=>'fab fa-google',      'name'=>'Master ChatGPT to Enhance Creativity & Productivity','issuer'=>'Udemy',       'issuer_icon'=>'fas fa-building','cert_url'=>'#'],
        ];
    }

    private function dummyExperiences(): array
    {
        return [
            ['period'=>'Jan 2026 – Present',  'role'=>'PHP Developer',              'company'=>'ABM Knowledgeware Ltd · India',                  'location'=>'India',           'current'=>true, 'badge'=>'● Current','bullets'=>['Working as a PHP Developer on web-based applications','Backend development, bug fixing, and feature enhancements','Collaborating with team members to deliver scalable solutions']],
            ['period'=>'Jan 2024 – Dec 2025', 'role'=>'Jr. PHP / Laravel Developer','company'=>'Silver Touch Technologies Ltd · New Delhi, India', 'location'=>'New Delhi, India','current'=>false,'badge'=>null,      'bullets'=>['Government website development in compliance with GIGW and DBIM 3.0 guidelines','Managed end-to-end project lifecycle from requirements to deployment','Resolved STQC, security and accessibility audit issues','Developed and optimized backend CMS modules','Integrated APIs with government platforms and third-party services']],
            ['period'=>'Jul 2023 – Dec 2023', 'role'=>'Web Development Intern',     'company'=>'iNeuron Intelligence Pvt Ltd · Bangalore, India', 'location'=>'Bangalore, India','current'=>false,'badge'=>null,      'bullets'=>['Assisted in developing user-friendly UI components','Supported the team with bug fixes, maintenance, and minor feature updates']],
        ];
    }
}
