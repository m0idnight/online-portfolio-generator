
@php
    use Illuminate\Support\Facades\Storage;

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
            : Storage::disk('public')->url($picture);
    }

    $socialColors = ['#FF6B6B', '#6657D9', '#168D89', '#E9A23B'];
    $cardColors = ['pink', 'yellow', 'blue', 'green'];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $name }} | Doodle Portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Fredoka:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --ink: #24212c;
            --paper: #fffdf6;
            --pink: #ff759d;
            --yellow: #ffdc58;
            --blue: #74d9f4;
            --green: #9be6b0;
            --purple: #b7a1ff;
            --orange: #ff9b66;
            --line: 2.5px solid var(--ink);
            --shadow: 5px 5px 0 var(--ink);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        body {
            margin: 0;
            color: var(--ink);
            background-color: var(--paper);
            background-image: radial-gradient(#24212c18 1px, transparent 1px);
            background-size: 18px 18px;
            font-family: 'DM Sans', sans-serif;
            line-height: 1.65;
            overflow-x: hidden;
        }

        a {
            color: inherit;
        }

        button, a {
            -webkit-tap-highlight-color: transparent;
        }

        .page {
            width: min(1120px, calc(100% - 36px));
            margin: auto;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 10;
            background: #fffdf6ed;
            border-bottom: var(--line);
            backdrop-filter: blur(12px);
        }

        .nav {
            width: min(1120px, calc(100% - 36px));
            margin: auto;
            min-height: 74px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            font: 700 1.35rem 'Fredoka', sans-serif;
            text-decoration: none;
            letter-spacing: -.5px;
        }

        .brand-mark {
            display: inline-grid;
            place-items: center;
            width: 35px;
            height: 35px;
            margin-right: 7px;
            background: var(--yellow);
            border: var(--line);
            border-radius: 50% 45% 55% 40%;
            transform: rotate(-9deg);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-links a {
            font-size: .88rem;
            font-weight: 800;
            text-decoration: none;
        }

        .nav-links a:hover {
            text-decoration: underline wavy var(--pink) 2px;
            text-underline-offset: 5px;
        }

        .nav-cta, .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            padding: 11px 17px;
            border: var(--line);
            border-radius: 13px 16px 12px 17px;
            background: var(--yellow);
            box-shadow: 3px 3px 0 var(--ink);
            font-weight: 800;
            text-decoration: none;
            transition: transform .18s, box-shadow .18s;
        }

        .nav-cta:hover, .button:hover {
            transform: translate(2px, 2px) rotate(-1deg);
            box-shadow: 1px 1px 0 var(--ink);
        }

        .hero {
            position: relative;
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 45px;
            align-items: center;
            min-height: 540px;
            padding: 75px 0 85px;
        }

        .eyebrow {
            display: inline-block;
            padding: 6px 13px;
            background: var(--green);
            border: var(--line);
            border-radius: 8px 13px 9px 12px;
            font-size: .78rem;
            font-weight: 800;
            letter-spacing: 1.4px;
            text-transform: uppercase;
            transform: rotate(-2deg);
        }

        h1, h2, h3, p {
            margin-top: 0;
        }

        h1, h2, h3, .section-title {
            font-family: 'Fredoka', sans-serif;
        }

        h1 {
            max-width: 680px;
            margin: 20px 0;
            font-size: clamp(3rem, 7vw, 5.7rem);
            line-height: .99;
            letter-spacing: -2.7px;
        }

        .name-highlight {
            position: relative;
            display: inline;
            z-index: 0;
            overflow-wrap: anywhere;
        }

        .name-highlight::after {
            position: absolute;
            content: '';
            left: 0;
            right: 0;
            bottom: 3px;
            height: 35%;
            z-index: -1;
            background: var(--pink);
            transform: rotate(-1.5deg);
            border-radius: 5px;
        }

        .hero-copy {
            max-width: 560px;
            font-size: 1.05rem;
            color: #57515f;
            white-space: pre-line;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 26px;
        }

        .button-primary {
            background: var(--pink);
        }

        .button-secondary {
            background: white;
        }

        .hero-art {
            position: relative;
            display: grid;
            place-items: center;
            min-height: 360px;
        }

        .portrait-frame {
            position: relative;
            z-index: 1;
            width: min(310px, 78%);
            aspect-ratio: .83;
            display: grid;
            place-items: center;
            overflow: hidden;
            background: var(--blue);
            border: 3px solid var(--ink);
            border-radius: 48% 44% 42% 46% / 36% 38% 48% 48%;
            box-shadow: 8px 8px 0 var(--ink);
            transform: rotate(3deg);
        }

        .portrait-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .portrait-placeholder {
            font-size: 7rem;
            line-height: 1;
        }

        .doodle {
            position: absolute;
            z-index: 2;
            display: grid;
            place-items: center;
            font-family: 'Fredoka', sans-serif;
            font-weight: 700;
            user-select: none;
        }

        .doodle-star {
            top: 4%;
            right: 3%;
            color: var(--ink);
            font-size: 4rem;
            transform: rotate(15deg);
        }

        .doodle-burst {
            left: 0;
            top: 19%;
            font-size: 3.2rem;
            color: var(--orange);
            -webkit-text-stroke: 1px var(--ink);
            transform: rotate(-15deg);
        }

        .doodle-note {
            right: -1%;
            bottom: 13%;
            padding: 10px 15px;
            background: var(--yellow);
            border: var(--line);
            border-radius: 10px 16px 11px 15px;
            box-shadow: 3px 3px 0 var(--ink);
            transform: rotate(8deg);
            font-size: .85rem;
        }

        .doodle-heart {
            left: 7%;
            bottom: 4%;
            color: var(--pink);
            font-size: 3.5rem;
            -webkit-text-stroke: 1px var(--ink);
            transform: rotate(-12deg);
        }

        .scribble {
            position: absolute;
            top: 0;
            left: 2%;
            width: 65px;
            height: 30px;
            border-top: 4px solid var(--purple);
            border-radius: 50%;
            transform: rotate(-25deg);
        }

        .marquee {
            overflow: hidden;
            border-top: var(--line);
            border-bottom: var(--line);
            background: var(--yellow);
            transform: rotate(-1deg) scale(1.02);
        }

        .marquee-inner {
            display: flex;
            justify-content: space-around;
            align-items: center;
            gap: 30px;
            width: max-content;
            padding: 13px 0;
            font: 600 1.1rem 'Fredoka', sans-serif;
        }

        .marquee-inner span:nth-child(even) {
            color: #e64f7c;
        }

        .section {
            padding: 90px 0 35px;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
            margin-bottom: 30px;
        }

        .section-kicker {
            display: block;
            margin-bottom: 5px;
            font-size: .76rem;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .section-title {
            margin: 0;
            font-size: clamp(2.2rem, 5vw, 3.5rem);
            line-height: 1.1;
            letter-spacing: -1px;
        }

        .title-scribble {
            text-decoration: underline wavy var(--pink) 4px;
            text-underline-offset: 8px;
        }

        .section-note {
            max-width: 300px;
            margin: 0;
            color: #625b69;
            font-size: .9rem;
        }

        .card {
            position: relative;
            padding: 27px;
            border: var(--line);
            border-radius: 18px 24px 19px 22px;
            box-shadow: var(--shadow);
        }

        .card-pink { background: #ffdce6; }
        .card-yellow { background: #fff0a8; }
        .card-blue { background: #c9f1ff; }
        .card-green { background: #d4f5dc; }
        .card-purple { background: #e3d9ff; }
        .card-white { background: #fff; }

        .about-grid {
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 25px;
        }

        .about-copy {
            font-size: 1.04rem;
            white-space: pre-line;
        }

        .about-sticker {
            display: inline-block;
            margin-top: 12px;
            padding: 7px 12px;
            background: white;
            border: 2px dashed var(--ink);
            border-radius: 10px;
            font-size: .83rem;
            font-weight: 800;
            transform: rotate(-2deg);
        }

        .mini-title {
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill-tag {
            padding: 8px 13px;
            background: white;
            border: 2px solid var(--ink);
            border-radius: 9px 13px 10px 12px;
            box-shadow: 2px 2px 0 var(--ink);
            font-size: .88rem;
            font-weight: 800;
            transform: rotate(var(--tilt, -1deg));
        }

        .skill-tag:nth-child(3n) { --tilt: 2deg; }
        .skill-tag:nth-child(3n + 1) { --tilt: -2deg; }
        .skill-tag:nth-child(3n + 2) { --tilt: 1deg; }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
        }

        .project-card {
            min-height: 210px;
            transition: transform .2s;
        }

        .project-card:hover {
            transform: translateY(-5px) rotate(-.5deg);
        }

        .card-number {
            display: inline-grid;
            place-items: center;
            width: 42px;
            height: 42px;
            margin-bottom: 17px;
            border: var(--line);
            border-radius: 50%;
            background: white;
            font-family: 'Fredoka', sans-serif;
            font-size: 1.2rem;
        }

        .project-card h3, .timeline-card h3 {
            margin-bottom: 8px;
            font-size: 1.5rem;
            overflow-wrap: anywhere;
        }

        .project-card p, .timeline-card p {
            color: #504957;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .text-link {
            display: inline-block;
            margin-top: 4px;
            font-size: .88rem;
            font-weight: 800;
            text-underline-offset: 4px;
        }

        .text-link:hover {
            color: #8b3158;
        }

        .timeline-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
        }

        .timeline-card {
            background: white;
        }

        .timeline-label {
            display: inline-block;
            margin-bottom: 12px;
            padding: 5px 10px;
            border: 2px solid var(--ink);
            border-radius: 8px;
            background: var(--purple);
            font-size: .75rem;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .contact-card {
            position: relative;
            overflow: hidden;
            margin: 80px 0 60px;
            padding: clamp(28px, 6vw, 65px);
            background: var(--blue);
            border: 3px solid var(--ink);
            border-radius: 25px 30px 22px 32px;
            box-shadow: 7px 7px 0 var(--ink);
        }

        .contact-card h2 {
            max-width: 650px;
            margin-bottom: 15px;
            font-size: clamp(2.4rem, 6vw, 4.4rem);
            line-height: 1.05;
        }

        .contact-card p {
            max-width: 580px;
        }

        .contact-details {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 24px;
        }

        .contact-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            max-width: 100%;
            padding: 9px 13px;
            overflow-wrap: anywhere;
            background: white;
            border: 2px solid var(--ink);
            border-radius: 11px 15px 10px 14px;
            font-size: .87rem;
            font-weight: 800;
            text-decoration: none;
        }

        .contact-pill:hover {
            background: var(--yellow);
        }

        .contact-spark {
            position: absolute;
            right: 5%;
            top: 8%;
            font-size: 5rem;
            transform: rotate(15deg);
        }

        .social-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 18px;
        }

        .social-link {
            padding: 7px 12px;
            background: white;
            border: 2px solid var(--ink);
            border-radius: 9px;
            font-size: .85rem;
            font-weight: 800;
            text-decoration: none;
        }

        .social-link:hover {
            background: var(--pink);
        }

        .footer {
            padding: 24px 0 35px;
            border-top: 2px dashed #b5acb8;
            color: #655e6a;
            font-size: .83rem;
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .footer-links {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .footer a {
            font-weight: 800;
            text-decoration: none;
        }

        .empty-note {
            padding: 18px;
            border: 2px dashed #9b91a0;
            border-radius: 14px;
            color: #625b69;
            background: #fffdf8;
        }

        @media (max-width: 760px) {
            .nav {
                min-height: 65px;
            }

            .nav-links {
                gap: 12px;
            }

            .nav-links a:not(.nav-cta) {
                display: none;
            }

            .hero {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 60px 0;
            }

            .hero-art {
                min-height: 330px;
            }

            .portrait-frame {
                width: min(270px, 70%);
            }

            .about-grid,
            .projects-grid,
            .timeline-grid {
                grid-template-columns: 1fr;
            }

            .section {
                padding-top: 65px;
            }

            .section-heading {
                align-items: start;
                flex-direction: column;
            }

            .contact-spark {
                right: 2%;
                top: 2%;
                font-size: 3.2rem;
            }
        }

        @media (max-width: 420px) {
            .page, .nav {
                width: calc(100% - 26px);
            }

            h1 {
                font-size: 3rem;
            }

            .card {
                padding: 21px;
            }

            .brand {
                font-size: 1.15rem;
            }

            .nav-cta {
                padding: 9px 11px;
                font-size: .8rem;
            }
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
        <nav class="nav" aria-label="Main navigation">
            <a class="brand" href="#home">
                <span class="brand-mark">✳</span>
                {{ $name }}
            </a>

            <div class="nav-links">
                <a href="#about">About</a>
                <a href="#projects">Projects</a>
                <a href="#experience">Journey</a>
                <a class="nav-cta" href="#contact">Say hello ↗</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="page">
            <section class="hero" id="home">
                <div>
                    <span class="eyebrow">✦ A little corner of my creativity</span>

                    <h1>
                        Hey, I'm<br>
                        <span class="name-highlight">{{ $name }}</span><span>!</span>
                    </h1>

                    <p class="hero-copy">
                        {{ trim($bio) !== '' ? $bio : 'Creative thinker, curious learner, and maker of things. Welcome to my little corner of the internet!' }}
                    </p>

                    <div class="hero-actions">
                        <a href="#projects" class="button button-primary">See my work ↘</a>
                        <a href="#about" class="button button-secondary">Get to know me ✿</a>
                    </div>
                </div>

                <div class="hero-art" aria-label="Decorative portrait illustration">
                    <div class="scribble"></div>
                    <span class="doodle doodle-star" aria-hidden="true">✳</span>
                    <span class="doodle doodle-burst" aria-hidden="true">✷</span>

                    <div class="portrait-frame">
                        @if($pictureUrl)
                            <img src="{{ $pictureUrl }}" alt="Portrait of {{ $name }}">
                        @else
                            <div class="portrait-placeholder" aria-hidden="true">☺</div>
                        @endif
                    </div>

                    <span class="doodle doodle-heart" aria-hidden="true">♥</span>
                    <span class="doodle doodle-note">made with ✦ creativity</span>
                </div>
            </section>
        </div>

        <div class="marquee" aria-label="Creative portfolio">
            <div class="marquee-inner">
                <span>✳ MAKE STUFF</span>
                <span>✦ DREAM BIG</span>
                <span>♡ STAY CURIOUS</span>
                <span>✷ KEEP CREATING</span>
                <span>✳ MAKE STUFF</span>
                <span>✦ DREAM BIG</span>
                <span>♡ STAY CURIOUS</span>
                <span>✷ KEEP CREATING</span>
            </div>
        </div>

        <div class="page">
            <section class="section" id="about">
                <div class="section-heading">
                    <div>
                        <span class="section-kicker">A little introduction ✎</span>
                        <h2 class="section-title">The <span class="title-scribble">person</span> behind the doodles</h2>
                    </div>
                    <p class="section-note">A bit about who I am, what I love, and the things I enjoy creating.</p>
                </div>

                <div class="about-grid">
                    <article class="card card-yellow">
                        <span class="doodle" style="top:12px;right:18px;font-size:2rem" aria-hidden="true">✷</span>
                        <h3 class="mini-title">Hello, friend! 👋</h3>

                        <div class="about-copy">{{ trim((string) $about) !== '' ? $about : 'I love learning new things, exploring ideas, and turning inspiration into something creative. This is where I share a little bit of my journey.' }}</div>

                        <span class="about-sticker">✎ currently creating my own path</span>
                    </article>

                    <article class="card card-pink">
                        <h3 class="mini-title">Things in my toolbox 🖍</h3>

                        @if(count($skills))
                            <div class="skills-list">
                                @foreach($skills as $skill)
                                    @php
                                        $skillText = is_array($skill)
                                            ? ($skill['name'] ?? $skill['title'] ?? $skill['skill'] ?? '')
                                            : $skill;
                                    @endphp

                                    @if(is_string($skillText) && trim($skillText) !== '')
                                        <span class="skill-tag">{{ trim($skillText) }}</span>
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <p>New skills, fresh ideas, and lots of curiosity. ✨</p>
                        @endif
                    </article>
                </div>
            </section>

            <section class="section" id="projects">
                <div class="section-heading">
                    <div>
                        <span class="section-kicker">Things I've made ✂</span>
                        <h2 class="section-title">My <span class="title-scribble">projects</span></h2>
                    </div>
                    <p class="section-note">Little ideas turned into real work, one project at a time.</p>
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

                                $projectColor = $cardColors[$index % count($cardColors)];
                            @endphp

                            @if(trim((string) $projectTitle) !== '')
                                <article class="card project-card card-{{ $projectColor }}">
                                    <span class="card-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>

                                    <h3>{{ $projectTitle }}</h3>

                                    @if(trim((string) $projectDescription) !== '')
                                        <p>{{ $projectDescription }}</p>
                                    @endif

                                    @if(is_array($projectTech))
                                        <p><strong>Made with:</strong> {{ implode(', ', $projectTech) }}</p>
                                    @elseif(is_string($projectTech) && trim($projectTech) !== '')
                                        <p><strong>Made with:</strong> {{ $projectTech }}</p>
                                    @endif

                                    @if(is_string($projectUrl) && filter_var($projectUrl, FILTER_VALIDATE_URL) && in_array(parse_url($projectUrl, PHP_URL_SCHEME), ['http', 'https'], true))
                                        <a class="text-link" href="{{ $projectUrl }}" target="_blank" rel="noopener noreferrer">Check it out ↗</a>
                                    @endif

                                    <span class="doodle" style="right:18px;bottom:10px;font-size:2rem" aria-hidden="true">
                                        {{ ['✳', '✿', '✷', '♡'][$index % 4] }}
                                    </span>
                                </article>
                            @endif
                        @endforeach
                    </div>
                @else
                    <div class="empty-note">My project gallery is still growing. Watch this space for new creations! ✨</div>
                @endif
            </section>

            <section class="section" id="experience">
                <div class="section-heading">
                    <div>
                        <span class="section-kicker">The journey so far ↗</span>
                        <h2 class="section-title">Experience & <span class="title-scribble">education</span></h2>
                    </div>
                    <p class="section-note">Every experience teaches me something new.</p>
                </div>

                <div class="timeline-grid">
                    <div>
                        <h3 class="mini-title">✷ Experience</h3>

                        @if(count($experience))
                            @foreach($experience as $item)
                                @php
                                    $jobTitle = is_array($item)
                                        ? ($item['position'] ?? $item['title'] ?? $item['role'] ?? $item['job_title'] ?? 'Experience')
                                        : trim((string) $item);

                                    $company = is_array($item)
                                        ? ($item['company'] ?? $item['organization'] ?? $item['employer'] ?? '')
                                        : '';

                                    $duration = is_array($item)
                                        ? ($item['duration'] ?? $item['date'] ?? $item['dates'] ?? $item['year'] ?? '')
                                        : '';

                                    $jobDescription = is_array($item)
                                        ? ($item['description'] ?? $item['details'] ?? '')
                                        : '';
                                @endphp

                                @if(trim((string) $jobTitle) !== '')
                                    <article class="card timeline-card" style="margin-bottom:18px">
                                        <span class="timeline-label">Experience</span>
                                        <h3>{{ $jobTitle }}</h3>

                                        @if(trim((string) $company) !== '')
                                            <p><strong>{{ $company }}</strong></p>
                                        @endif

                                        @if(trim((string) $duration) !== '')
                                            <p>{{ $duration }}</p>
                                        @endif

                                        @if(trim((string) $jobDescription) !== '')
                                            <p>{{ $jobDescription }}</p>
                                        @endif
                                    </article>
                                @endif
                            @endforeach
                        @else
                            <div class="empty-note">Every new opportunity is another chance to grow. 🌱</div>
                        @endif
                    </div>

                    <div>
                        <h3 class="mini-title">✿ Education</h3>

                        @if(count($education))
                            @foreach($education as $item)
                                @php
                                    $degree = is_array($item)
                                        ? ($item['degree'] ?? $item['course'] ?? $item['title'] ?? $item['qualification'] ?? 'Education')
                                        : trim((string) $item);

                                    $school = is_array($item)
                                        ? ($item['school'] ?? $item['institution'] ?? $item['university'] ?? '')
                                        : '';

                                    $schoolYear = is_array($item)
                                        ? ($item['year'] ?? $item['date'] ?? $item['duration'] ?? '')
                                        : '';

                                    $educationDescription = is_array($item)
                                        ? ($item['description'] ?? $item['details'] ?? '')
                                        : '';
                                @endphp

                                @if(trim((string) $degree) !== '')
                                    <article class="card timeline-card" style="margin-bottom:18px">
                                        <span class="timeline-label" style="background:var(--green)">Education</span>
                                        <h3>{{ $degree }}</h3>

                                        @if(trim((string) $school) !== '')
                                            <p><strong>{{ $school }}</strong></p>
                                        @endif

                                        @if(trim((string) $schoolYear) !== '')
                                            <p>{{ $schoolYear }}</p>
                                        @endif

                                        @if(trim((string) $educationDescription) !== '')
                                            <p>{{ $educationDescription }}</p>
                                        @endif
                                    </article>
                                @endif
                            @endforeach
                        @else
                            <div class="empty-note">Learning is a journey, and this is just one chapter. 📚</div>
                        @endif
                    </div>
                </div>
            </section>

            <section class="contact-card" id="contact">
                <span class="contact-spark" aria-hidden="true">✳</span>

                <span class="section-kicker">Have an idea? Let's talk! ✉</span>
                <h2>Let's make something cool together.</h2>
                <p>
                    Got a question, a fun idea, or just want to say hi?
                    I'd love to hear from you!
                </p>

                <div class="contact-details">
                    @if(!empty($portfolio->email))
                        <a class="contact-pill" href="mailto:{{ $portfolio->email }}">✉ {{ $portfolio->email }}</a>
                    @endif

                    @if(!empty($portfolio->contact_number))
                        <a class="contact-pill" href="tel:{{ preg_replace('/[^0-9+]/', '', $portfolio->contact_number) }}">☎ {{ $portfolio->contact_number }}</a>
                    @endif

                    @if(!empty($portfolio->address))
                        <span class="contact-pill">⌖ {{ $portfolio->address }}</span>
                    @endif

                    @if(!empty($portfolio->website) && filter_var($portfolio->website, FILTER_VALIDATE_URL) && in_array(parse_url($portfolio->website, PHP_URL_SCHEME), ['http', 'https'], true))
                        <a class="contact-pill" href="{{ $portfolio->website }}" target="_blank" rel="noopener noreferrer">↗ My website</a>
                    @endif
                </div>

                @if(count($socialLinks))
                    <div class="social-list">
                        @foreach($socialLinks as $index => $social)
                            @php
                                if (is_array($social)) {
                                    $socialLabel = $social['platform'] ?? $social['name'] ?? $social['title'] ?? 'Social link';
                                    $socialUrl = $social['url'] ?? $social['link'] ?? '';
                                } else {
                                    $socialLabel = trim((string) $social);
                                    $socialUrl = '';
                                }

                                $validSocialUrl = is_string($socialUrl)
                                    && filter_var($socialUrl, FILTER_VALIDATE_URL)
                                    && in_array(parse_url($socialUrl, PHP_URL_SCHEME), ['http', 'https'], true);
                            @endphp

                            @if(trim((string) $socialLabel) !== '')
                                @if($validSocialUrl)
                                    <a class="social-link" href="{{ $socialUrl }}" target="_blank" rel="noopener noreferrer">
                                        {{ $socialLabel }} ↗
                                    </a>
                                @else
                                    <span class="social-link">{{ $socialLabel }}</span>
                                @endif
                            @endif
                        @endforeach
                    </div>
                @endif
            </section>


<footer class="footer">
    <div class="footer-inner">
        <div class="footer-links">
            <a href="#home">Back to top ↑</a>
            <a href="/portfolios">Portfolio gallery</a>
            <a href="/">Home</a>
            <a href="/portfolio/create">Create portfolio</a>

            @if(isset($portfolio->id))
                <a href="/portfolio/{{ $portfolio->id }}/edit">Edit portfolio</a>
            @endif
        </div>
    </div>
</footer>
</div>
</main>
</body>
</html>
