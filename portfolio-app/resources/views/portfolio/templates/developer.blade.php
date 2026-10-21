@php
    $name = $portfolio->full_name ?? 'Your Name';
    $bio = $portfolio->bio ?? '';
    $about = $portfolio->about ?? $bio;

    $toList = function ($value) {
        if (is_array($value)) {
            return $value;
        }

        if (!is_string($value) || trim($value) === '') {
            return [];
        }

        $decoded = json_decode($value, true);

        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            return $decoded;
        }

        return preg_split('/[\r\n]+/', trim($value)) ?: [];
    };

    $skills = $toList($portfolio->skills ?? '');

    if (count($skills) === 1 && is_string($skills[0])) {
        $skills = preg_split('/[,;]+/', $skills[0]) ?: $skills;
    }

    $projects = $toList($portfolio->projects ?? '');
    $experience = $toList($portfolio->experience ?? '');
    $education = $toList($portfolio->education ?? '');
    $socialLinks = $toList($portfolio->social_links ?? '');

    $picture = $portfolio->profile_picture
        ?? $portfolio->profile_image
        ?? $portfolio->photo
        ?? null;

    $pictureUrl = null;

    if (is_string($picture) && trim($picture) !== '') {
        $pictureUrl = str_starts_with($picture, 'http://')
            || str_starts_with($picture, 'https://')
            ? $picture
            : asset('storage/' . ltrim($picture, '/'));
    }

    $cleanUrl = function ($url) {
        if (!is_string($url) || !filter_var($url, FILTER_VALIDATE_URL)) {
            return false;
        }

        return in_array(parse_url($url, PHP_URL_SCHEME), ['http', 'https'], true);
    };
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $name }} | Developer Portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #0b1020;
            --panel: #111a2e;
            --panel2: #151f35;
            --line: #26344b;
            --text: #e6edf7;
            --muted: #9baac0;
            --green: #8bffb0;
            --cyan: #65e6ff;
            --purple: #b7a0ff;
            --mono: 'DM Mono', monospace;
            --sans: 'Inter', sans-serif;
        }

        * { box-sizing: border-box; }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        body {
            margin: 0;
            background:
                radial-gradient(ellipse at 15% 0%, #142541 0, transparent 42%),
                var(--bg);
            color: var(--text);
            font-family: var(--sans);
            line-height: 1.7;
        }

        a { color: inherit; }
        .mono { font-family: var(--mono); }
        .muted { color: var(--muted); }
        .green { color: var(--green); }

        .container {
            width: min(1080px, calc(100% - 40px));
            margin: auto;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 10;
            background: #0b1020ed;
            border-bottom: 1px solid var(--line);
            backdrop-filter: blur(14px);
        }

        .nav {
            min-height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 22px;
        }

        .brand {
            color: var(--green);
            font: 500 1rem var(--mono);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .nav-links a {
            color: var(--muted);
            font-size: .86rem;
            text-decoration: none;
        }

        .nav-links a:hover { color: var(--green); }

        .nav-cta {
            padding: 8px 13px;
            border: 1px solid #477a60;
            border-radius: 7px;
            color: var(--green) !important;
        }

        .hero {
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            align-items: center;
            gap: 55px;
            padding: 100px 0 90px;
        }

        .terminal-label {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 7px 11px;
            background: #101d2d;
            border: 1px solid #284638;
            border-radius: 7px;
            color: var(--green);
            font: .78rem var(--mono);
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--green);
            box-shadow: 0 0 12px #8bffb088;
        }

        h1, h2, h3, p { margin-top: 0; }

        h1 {
            margin: 24px 0 18px;
            font-size: clamp(2.7rem, 6vw, 5rem);
            line-height: 1.08;
            letter-spacing: -3px;
            overflow-wrap: anywhere;
        }

        .hero-copy {
            max-width: 600px;
            color: var(--muted);
            font-size: 1.02rem;
            white-space: pre-line;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 28px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 16px;
            border: 1px solid var(--line);
            border-radius: 7px;
            text-decoration: none;
            font-size: .88rem;
            font-weight: 700;
            transition: .2s ease;
        }

        .button-primary {
            background: var(--green);
            color: #08130d;
            border-color: var(--green);
        }

        .button-secondary {
            background: var(--panel);
            color: var(--text);
        }

        .button:hover { transform: translateY(-2px); }

        .terminal {
            overflow: hidden;
            border: 1px solid #34445c;
            border-radius: 12px;
            background: #0d1424;
            box-shadow: 0 25px 80px #0005;
        }

        .terminal-bar {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 14px 16px;
            background: #141d30;
            border-bottom: 1px solid var(--line);
        }

        .terminal-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .terminal-title {
            margin-left: auto;
            color: var(--muted);
            font: .7rem var(--mono);
        }

        .terminal-body {
            padding: 24px;
            font: .84rem/2 var(--mono);
            overflow-wrap: anywhere;
        }

        .code-muted { color: #64748b; }
        .code-purple { color: var(--purple); }
        .code-cyan { color: var(--cyan); }
        .code-green { color: var(--green); }

        .portrait {
            width: 88px;
            height: 88px;
            margin-bottom: 20px;
            border-radius: 12px;
            border: 1px solid #365344;
            object-fit: cover;
            background: var(--panel2);
        }

        .portrait-placeholder {
            display: grid;
            place-items: center;
            font: 2rem var(--mono);
            color: var(--green);
        }

        .section {
            padding: 75px 0 15px;
        }

        .section-head {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
            margin-bottom: 28px;
        }

        .section-index {
            display: block;
            margin-bottom: 6px;
            color: var(--green);
            font: .78rem var(--mono);
        }

        h2 {
            margin-bottom: 0;
            font-size: clamp(1.8rem, 4vw, 2.7rem);
            letter-spacing: -1.2px;
        }

        .section-description {
            max-width: 360px;
            margin-bottom: 0;
            color: var(--muted);
            font-size: .9rem;
        }

        .panel {
            padding: 26px;
            border: 1px solid var(--line);
            border-radius: 10px;
            background: linear-gradient(145deg, var(--panel), #0f1729);
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 20px;
        }

        .panel-title {
            margin-bottom: 16px;
            font-size: 1.05rem;
        }

        .about-text {
            color: #c1ccdb;
            white-space: pre-line;
        }

        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
        }

        .skill {
            padding: 7px 10px;
            border: 1px solid #315440;
            border-radius: 6px;
            background: #10251f;
            color: var(--green);
            font: .78rem var(--mono);
            overflow-wrap: anywhere;
        }

        .projects-grid, .timeline-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .project-card {
            display: flex;
            flex-direction: column;
            min-height: 230px;
            transition: border-color .2s, transform .2s;
        }

        .project-card:hover {
            border-color: #538c6a;
            transform: translateY(-3px);
        }

        .project-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            color: var(--green);
            font: .8rem var(--mono);
        }

        .project-card h3, .timeline-card h3 {
            margin-bottom: 8px;
            font-size: 1.13rem;
            overflow-wrap: anywhere;
        }

        .project-card p, .timeline-card p {
            color: var(--muted);
            font-size: .9rem;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .project-tech {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: auto;
            padding-top: 12px;
            color: var(--cyan);
            font: .72rem var(--mono);
        }

        .project-link {
            display: inline-block;
            margin-top: 15px;
            color: var(--green);
            font: .8rem var(--mono);
            text-decoration: none;
        }

        .project-link:hover { text-decoration: underline; }

        .timeline-card { margin-bottom: 16px; }

        .timeline-type {
            display: inline-block;
            margin-bottom: 13px;
            color: var(--cyan);
            font: .75rem var(--mono);
        }

        .timeline-meta {
            color: var(--green) !important;
            font: .76rem var(--mono);
        }

        .empty {
            padding: 20px;
            border: 1px dashed #40516a;
            border-radius: 8px;
            color: var(--muted);
            font: .85rem var(--mono);
        }

        .contact {
            margin: 90px 0 60px;
            padding: clamp(25px, 5vw, 48px);
            border: 1px solid #315440;
            border-radius: 12px;
            background:
                radial-gradient(circle at 100% 0%, #163c2b 0, transparent 42%),
                var(--panel);
        }

        .contact h2 {
            max-width: 620px;
            margin: 12px 0;
        }

        .contact p {
            max-width: 600px;
            color: var(--muted);
        }

        .contact-list, .social-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 22px;
        }

        .contact-link, .social-link {
            max-width: 100%;
            padding: 9px 12px;
            border: 1px solid #34445c;
            border-radius: 6px;
            background: #0c1424;
            color: var(--text);
            font-size: .8rem;
            overflow-wrap: anywhere;
            text-decoration: none;
        }

        .contact-link:hover, .social-link:hover {
            border-color: var(--green);
            color: var(--green);
        }

        .footer {
            padding: 25px 0 35px;
            border-top: 1px solid var(--line);
            color: var(--muted);
            font-size: .8rem;
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .footer-links {
            display: flex;
            flex-wrap: wrap;
            gap: 17px;
        }

        .footer a {
            color: var(--muted);
            text-decoration: none;
        }

        .footer a:hover { color: var(--green); }


        .portfolio-quick-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: flex-start;
            gap: 9px;
            padding: 14px 0 18px;
            margin: 0 auto;
            width: min(100% - 40px, 1120px);
        }
        .portfolio-quick-actions a {
            display: inline-flex;
            align-items: center;
            min-height: 36px;
            padding: 8px 12px;
            border: 1px solid var(--border, rgba(120, 120, 120, .28));
            border-radius: 9px;
            color: inherit;
            background: rgba(127, 127, 127, .07);
            text-decoration: none;
            font-size: .82rem;
            font-weight: 700;
            transition: transform .18s ease, background .18s ease;
        }
        .portfolio-quick-actions a:hover {
            background: rgba(127, 127, 127, .15);
            transform: translateY(-1px);
        }
        @media (max-width: 600px) {
            .portfolio-quick-actions { width: calc(100% - 28px); gap: 7px; padding: 12px 0 16px; }
            .portfolio-quick-actions a { font-size: .76rem; padding: 7px 9px; }
        }

        @media (max-width: 760px) {
            .hero, .about-grid, .projects-grid, .timeline-grid {
                grid-template-columns: 1fr;
            }

            .hero {
                gap: 32px;
                padding: 65px 0;
            }

            .section { padding-top: 58px; }

            .section-head {
                align-items: start;
                flex-direction: column;
            }

            .nav { flex-wrap: wrap; padding: 10px 0; }
            .nav-links { gap: 12px; flex-wrap: wrap; justify-content: flex-end; }
            .nav-links a:not(.nav-cta) { display: inline-flex; }
        }

        @media (max-width: 430px) {
            .container { width: calc(100% - 28px); }
            h1 { letter-spacing: -1.8px; }
            .panel { padding: 20px; }
            .terminal-body { padding: 17px; font-size: .76rem; }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                scroll-behavior: auto !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body>
<header class="topbar">
    <nav class="container nav" aria-label="Main navigation">
        <a class="brand" href="#home">&lt;{{ $name }} /&gt;</a>

        <div class="nav-links" aria-label="Portfolio navigation">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#projects">Projects</a>
            <a href="#experience">Experience</a>
            <a class="nav-cta" href="#contact">Contact ↗</a>
        </div>
    </nav>
</header>

<nav class="portfolio-quick-actions" aria-label="Portfolio actions">
    @if(isset($portfolio->id))
        <a href="{{ url('/portfolio/' . $portfolio->id . '/edit') }}">Edit portfolio</a>
    @endif
    <a href="{{ url('/portfolio/create') }}">Create another</a>
    <a href="{{ url('/portfolios') }}">All portfolios</a>
    <a href="{{ url('/') }}">Home</a>
</nav>

<main class="container">
    <section class="hero" id="home">
        <div>
            <span class="terminal-label">
                <span class="status-dot"></span>
                available_to_learn_and_build
            </span>

            <h1>Hello, I'm<br><span class="green">{{ $name }}</span><span>.</span></h1>

            <p class="hero-copy">
                {{ trim($bio) !== '' ? $bio : 'I enjoy solving problems, learning new technologies, and building useful things with code.' }}
            </p>

            <div class="hero-actions">
                <a class="button button-primary" href="#projects">Explore my work →</a>
                <a class="button button-secondary" href="#contact">Get in touch</a>
            </div>
        </div>

        <div class="terminal">
            <div class="terminal-bar">
                <span class="terminal-dot" style="background:#ff6b6b"></span>
                <span class="terminal-dot" style="background:#ffd166"></span>
                <span class="terminal-dot" style="background:#8bffb0"></span>
                <span class="terminal-title">profile.php</span>
            </div>

            <div class="terminal-body">
                @if($pictureUrl)
                    <img class="portrait" src="{{ $pictureUrl }}" alt="Portrait of {{ $name }}">
                @else
                    <div class="portrait portrait-placeholder">:)</div>
                @endif

                <div class="code-muted">// a little about me</div>
                <div><span class="code-purple">$developer</span> = [</div>
                <div>&nbsp;&nbsp;<span class="code-cyan">'name'</span> =&gt; <span class="code-green">'{{ $name }}'</span>,</div>
                <div>&nbsp;&nbsp;<span class="code-cyan">'mindset'</span> =&gt; <span class="code-green">'always_learning'</span>,</div>
                <div>&nbsp;&nbsp;<span class="code-cyan">'passion'</span> =&gt; <span class="code-green">'building_things'</span></div>
                <div>];</div>
                <div class="code-muted" style="margin-top:16px">// currently improving every day</div>
                <div><span class="code-purple">return</span> <span class="code-green">"Hello, world!"</span>;</div>
            </div>
        </div>
    </section>

    <section class="section" id="about">
        <div class="section-head">
            <div>
                <span class="section-index">01 // ABOUT</span>
                <h2>Behind the code</h2>
            </div>
            <p class="section-description">A little context about the person behind the projects.</p>
        </div>

        <div class="about-grid">
            <article class="panel">
                <h3 class="panel-title"><span class="green mono">function</span> aboutMe()</h3>
                <div class="about-text">{{ trim((string) $about) !== '' ? $about : 'I am curious, motivated, and always looking for opportunities to grow my skills and turn ideas into practical solutions.' }}</div>
            </article>

            <article class="panel">
                <h3 class="panel-title"><span class="green mono">const</span> skills = [...]</h3>

                @if(count($skills))
                    <div class="skills">
                        @foreach($skills as $skill)
                            @php
                                $skillText = is_array($skill)
                                    ? ($skill['name'] ?? $skill['title'] ?? $skill['skill'] ?? '')
                                    : $skill;
                            @endphp

                            @if(is_string($skillText) && trim($skillText) !== '')
                                <span class="skill">{{ trim($skillText) }}</span>
                            @endif
                        @endforeach
                    </div>
                @else
                    <p class="muted">Your skills will appear here when added to your portfolio.</p>
                @endif
            </article>
        </div>
    </section>

    <section class="section" id="projects">
        <div class="section-head">
            <div>
                <span class="section-index">02 // SELECTED WORK</span>
                <h2>Projects I've built</h2>
            </div>
            <p class="section-description">A collection of experiments, ideas, and solutions.</p>
        </div>

        @if(count($projects))
            <div class="projects-grid">
                @foreach($projects as $index => $project)
                    @php
                        if (is_array($project)) {
                            $projectTitle = $project['title'] ?? $project['name'] ?? $project['project_name'] ?? 'Untitled project';
                            $projectDescription = $project['description'] ?? $project['details'] ?? $project['about'] ?? '';
                            $projectUrl = $project['url'] ?? $project['link'] ?? $project['website'] ?? '';
                            $projectTech = $project['technologies'] ?? $project['tech_stack'] ?? '';
                        } else {
                            $projectTitle = trim((string) $project);
                            $projectDescription = '';
                            $projectUrl = '';
                            $projectTech = '';
                        }
                    @endphp

                    @if(trim((string) $projectTitle) !== '')
                        <article class="panel project-card">
                            <div class="project-top">
                                <span>PROJECT_{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <span>&lt;/&gt;</span>
                            </div>

                            <h3>{{ $projectTitle }}</h3>

                            @if(trim((string) $projectDescription) !== '')
                                <p>{{ $projectDescription }}</p>
                            @endif

                            @if(is_array($projectTech))
                                <div class="project-tech">
                                    @foreach($projectTech as $tech)
                                        <span>{{ is_array($tech) ? ($tech['name'] ?? '') : $tech }}</span>
                                    @endforeach
                                </div>
                            @elseif(is_string($projectTech) && trim($projectTech) !== '')
                                <div class="project-tech">{{ $projectTech }}</div>
                            @endif

                            @if($cleanUrl($projectUrl))
                                <a class="project-link" href="{{ $projectUrl }}" target="_blank" rel="noopener noreferrer">View project ↗</a>
                            @endif
                        </article>
                    @endif
                @endforeach
            </div>
        @else
            <div class="empty">No projects added yet. Your future projects will show up here.</div>
        @endif
    </section>

    <section class="section" id="experience">
        <div class="section-head">
            <div>
                <span class="section-index">03 // MY JOURNEY</span>
                <h2>Experience & education</h2>
            </div>
            <p class="section-description">Learning through study, practice, and real-world experience.</p>
        </div>

        <div class="timeline-grid">
            <div>
                <h3 class="panel-title"><span class="green mono">Experience</span></h3>

                @if(count($experience))
                    @foreach($experience as $item)
                        @php
                            $jobTitle = is_array($item) ? ($item['position'] ?? $item['title'] ?? $item['role'] ?? $item['job_title'] ?? 'Experience') : trim((string) $item);
                            $company = is_array($item) ? ($item['company'] ?? $item['organization'] ?? $item['employer'] ?? '') : '';
                            $duration = is_array($item) ? ($item['duration'] ?? $item['date'] ?? $item['dates'] ?? $item['year'] ?? '') : '';
                            $jobDescription = is_array($item) ? ($item['description'] ?? $item['details'] ?? '') : '';
                        @endphp

                        @if(trim((string) $jobTitle) !== '')
                            <article class="panel timeline-card">
                                <span class="timeline-type">ROLE / EXPERIENCE</span>
                                <h3>{{ $jobTitle }}</h3>

                                @if(trim((string) $company) !== '')
                                    <p><strong>{{ $company }}</strong></p>
                                @endif

                                @if(trim((string) $duration) !== '')
                                    <p class="timeline-meta">{{ $duration }}</p>
                                @endif

                                @if(trim((string) $jobDescription) !== '')
                                    <p>{{ $jobDescription }}</p>
                                @endif
                            </article>
                        @endif
                    @endforeach
                @else
                    <div class="empty">Your experience will appear here.</div>
                @endif
            </div>

            <div>
                <h3 class="panel-title"><span class="green mono">Education</span></h3>

                @if(count($education))
                    @foreach($education as $item)
                        @php
                            $degree = is_array($item) ? ($item['degree'] ?? $item['course'] ?? $item['title'] ?? $item['qualification'] ?? 'Education') : trim((string) $item);
                            $school = is_array($item) ? ($item['school'] ?? $item['institution'] ?? $item['university'] ?? '') : '';
                            $schoolYear = is_array($item) ? ($item['year'] ?? $item['date'] ?? $item['duration'] ?? '') : '';
                            $educationDescription = is_array($item) ? ($item['description'] ?? $item['details'] ?? '') : '';
                        @endphp

                        @if(trim((string) $degree) !== '')
                            <article class="panel timeline-card">
                                <span class="timeline-type">EDUCATION / LEARNING</span>
                                <h3>{{ $degree }}</h3>

                                @if(trim((string) $school) !== '')
                                    <p><strong>{{ $school }}</strong></p>
                                @endif

                                @if(trim((string) $schoolYear) !== '')
                                    <p class="timeline-meta">{{ $schoolYear }}</p>
                                @endif

                                @if(trim((string) $educationDescription) !== '')
                                    <p>{{ $educationDescription }}</p>
                                @endif
                            </article>
                        @endif
                    @endforeach
                @else
                    <div class="empty">Your education will appear here.</div>
                @endif

               
            </div>
        </div>
    </section>

    <section class="contact" id="contact">
        <span class="section-index">04 // GET IN TOUCH</span>
        <h2>Let's build something useful.</h2>
        <p>Have a question, an idea, or an opportunity to collaborate? Feel free to reach out.</p>

        <div class="contact-list">
            @if(!empty($portfolio->email))
                <a class="contact-link" href="mailto:{{ $portfolio->email }}">✉ {{ $portfolio->email }}</a>
            @endif

            @if(!empty($portfolio->contact_number))
                <a class="contact-link" href="tel:{{ preg_replace('/[^0-9+]/', '', $portfolio->contact_number) }}">☎ {{ $portfolio->contact_number }}</a>
            @endif

            @if(!empty($portfolio->address))
                <span class="contact-link">⌖ {{ $portfolio->address }}</span>
            @endif

            @if(!empty($portfolio->website) && $cleanUrl($portfolio->website))
                <a class="contact-link" href="{{ $portfolio->website }}" target="_blank" rel="noopener noreferrer">Personal website ↗</a>
            @endif
        </div>

        @if(count($socialLinks))
            <div class="social-list">
                @foreach($socialLinks as $social)
                    @php
                        $socialLabel = is_array($social) ? ($social['platform'] ?? $social['name'] ?? $social['title'] ?? 'Social link') : trim((string) $social);
                        $socialUrl = is_array($social) ? ($social['url'] ?? $social['link'] ?? '') : '';
                    @endphp

                    @if(trim((string) $socialLabel) !== '')
                        @if($cleanUrl($socialUrl))
                            <a class="social-link" href="{{ $socialUrl }}" target="_blank" rel="noopener noreferrer">{{ $socialLabel }} ↗</a>
                        @else
                            <span class="social-link">{{ $socialLabel }}</span>
                        @endif
                    @endif
                @endforeach
            </div>
        @endif
    </section>

</main>
</body>
</html>
