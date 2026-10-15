
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $portfolio->full_name }} | Portfolio</title>

    @php
        $picture = $portfolio->profile_picture;
        $pictureUrl = null;

        if ($picture) {
            if (\Illuminate\Support\Str::startsWith($picture, ['http://', 'https://'])) {
                $pictureUrl = $picture;
            } else {
                $pictureUrl = \Illuminate\Support\Facades\Storage::disk('public')->url($picture);
            }
        }
    @endphp

    <style>
        :root {
            --background: #090b10;
            --surface: #11151e;
            --text: #f4f5fb;
            --muted: #a0a8b8;
            --accent: #a78bfa;
            --accent-light: #211b35;
            --border: #282e3b;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        body {
            font-family: Inter, -apple-system, BlinkMacSystemFont, "Segoe UI",
                Arial, sans-serif;
            background:
                radial-gradient(ellipse at 15% 5%, rgba(124, 58, 237, .12), transparent 34%),
                radial-gradient(ellipse at 90% 40%, rgba(99, 102, 241, .07), transparent 32%),
                var(--background);
            color: var(--text);
            line-height: 1.7;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            width: min(1080px, calc(100% - 48px));
            margin: 0 auto;
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 10;
            background: rgba(9, 11, 16, .88);
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(18px);
        }

        .nav-inner {
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            font-size: 22px;
            font-weight: 850;
            letter-spacing: -1.1px;
        }

        .brand span {
            color: var(--accent);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 26px;
            font-size: 13px;
            color: var(--muted);
        }

        .nav-links a {
            transition: color .2s ease;
        }

        .nav-links a:hover {
            color: var(--accent);
        }

        .hero {
            padding: 100px 0 70px;
        }

        .hero-inner {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 250px;
            align-items: center;
            gap: 65px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #c4b5fd;
            background: rgba(167, 139, 250, .1);
            border: 1px solid rgba(167, 139, 250, .25);
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 750;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            margin-bottom: 26px;
        }

        .eyebrow::before {
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--accent);
            box-shadow: 0 0 12px var(--accent);
        }

        h1 {
            font-size: clamp(42px, 6.4vw, 76px);
            line-height: 1.04;
            letter-spacing: -3.2px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .hero-description {
            max-width: 590px;
            margin-top: 24px;
            color: var(--muted);
            font-size: 16px;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 13px;
            margin-top: 32px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 46px;
            padding: 11px 19px;
            border: 1px solid var(--accent);
            border-radius: 9px;
            background: var(--accent);
            color: #100b1c;
            font-size: 13px;
            font-weight: 750;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
            cursor: pointer;
        }

        .button:hover {
            background: #c4b5fd;
            border-color: #c4b5fd;
            box-shadow: 0 8px 28px rgba(167, 139, 250, .2);
            transform: translateY(-2px);
        }

        .button-outline {
            color: var(--text);
            border-color: var(--border);
            background: rgba(255, 255, 255, .025);
        }

        .button-outline:hover {
            color: #ddd6fe;
            background: var(--accent-light);
            border-color: rgba(167, 139, 250, .5);
        }

        .portrait-frame {
            width: 250px;
            height: 295px;
            padding: 8px;
            border: 1px solid rgba(167, 139, 250, .48);
            border-radius: 130px 130px 20px 20px;
            background: linear-gradient(145deg, #29213f, #11151e 65%);
            box-shadow: 0 25px 65px rgba(0, 0, 0, .35),
                0 0 35px rgba(139, 92, 246, .1);
        }

        .portrait {
            width: 100%;
            height: 100%;
            border-radius: 122px 122px 14px 14px;
            object-fit: cover;
            background: var(--accent-light);
        }

        .portrait-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            border-radius: 122px 122px 14px 14px;
            background: linear-gradient(145deg, #29213f, #171b27);
            color: var(--accent);
            font-size: 68px;
            font-weight: 800;
        }

        .info-strip {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            border: 1px solid var(--border);
            background: rgba(17, 21, 30, .86);
            border-radius: 14px;
            margin-bottom: 28px;
            overflow: hidden;
        }

        .info-item {
            padding: 23px 25px;
            min-width: 0;
            transition: background .2s ease;
        }

        .info-item:hover {
            background: rgba(167, 139, 250, .045);
        }

        .info-item + .info-item {
            border-left: 1px solid var(--border);
        }

        .info-label,
        .contact-label {
            display: block;
            color: var(--muted);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.4px;
            margin-bottom: 6px;
            font-weight: 700;
        }

        .info-value {
            font-size: 13px;
            font-weight: 650;
            overflow-wrap: anywhere;
        }

        .info-value a:hover {
            color: var(--accent);
        }

        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 300px;
            gap: 25px;
            align-items: start;
            padding-bottom: 60px;
        }

        .main-column,
        .side-column {
            display: grid;
            gap: 22px;
            min-width: 0;
        }

        .panel {
            min-width: 0;
            padding: 30px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: linear-gradient(145deg, rgba(19, 23, 34, .98), rgba(14, 17, 25, .98));
            box-shadow: 0 12px 35px rgba(0, 0, 0, .12);
            transition: border-color .2s ease, transform .2s ease;
        }

        .panel:hover {
            border-color: rgba(167, 139, 250, .38);
            transform: translateY(-2px);
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 22px;
        }

        .section-number {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            border-radius: 10px;
            border: 1px solid rgba(167, 139, 250, .22);
            background: var(--accent-light);
            color: #c4b5fd;
            font-size: 11px;
            font-weight: 800;
        }

        h2 {
            font-size: 18px;
            line-height: 1.4;
            letter-spacing: -.4px;
        }

        .section-content {
            color: #b4bbca;
            font-size: 14px;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .skill-list {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
        }

        .skill {
            padding: 8px 12px;
            border: 1px solid #343047;
            border-radius: 8px;
            background: rgba(167, 139, 250, .07);
            color: #d7ccff;
            font-size: 12px;
            transition: background .2s ease, border-color .2s ease;
        }

        .skill:hover {
            background: rgba(167, 139, 250, .15);
            border-color: var(--accent);
        }

        .contact-list {
            display: grid;
            gap: 19px;
        }

        .contact-value {
            color: #d6d9e2;
            font-size: 13px;
            overflow-wrap: anywhere;
        }

        .contact-value a {
            text-decoration: underline;
            text-decoration-color: #62528b;
            text-underline-offset: 4px;
        }

        .contact-value a:hover {
            color: var(--accent);
            text-decoration-color: var(--accent);
        }

        .social-text {
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .portfolio-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px;
            padding: 26px 0 55px;
            border-top: 1px solid var(--border);
        }

        .success {
            margin-top: 22px;
            padding: 14px 17px;
            border: 1px solid #28664d;
            border-radius: 10px;
            background: #10251e;
            color: #a7f3d0;
            font-size: 13px;
        }

        @media (max-width: 800px) {
            .hero-inner {
                grid-template-columns: minmax(0, 1fr) 180px;
                gap: 30px;
            }

            .portrait-frame {
                width: 180px;
                height: 225px;
            }

            .content-grid {
                grid-template-columns: minmax(0, 1fr) 250px;
                gap: 16px;
            }

            .main-column,
            .side-column {
                gap: 16px;
            }

            .panel {
                padding: 22px;
            }

            .info-item {
                padding: 18px;
            }
        }

        @media (max-width: 620px) {
            .container {
                width: calc(100% - 32px);
            }

            .nav-inner {
                min-height: 66px;
            }

            .nav-links {
                gap: 14px;
                font-size: 12px;
            }

            .hero {
                padding: 58px 0 40px;
            }

            .hero-inner {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .hero-copy {
                order: 2;
            }

            .portrait-frame {
                order: 1;
                width: 125px;
                height: 155px;
            }

            .portrait-placeholder {
                font-size: 42px;
            }

            h1 {
                font-size: clamp(38px, 10vw, 54px);
                letter-spacing: -1.8px;
            }

            .hero-description {
                font-size: 14px;
            }

            .info-strip {
                grid-template-columns: 1fr;
                margin-bottom: 16px;
            }

            .info-item {
                padding: 15px 18px;
            }

            .info-item + .info-item {
                border-left: 0;
                border-top: 1px solid var(--border);
            }

            .content-grid {
                grid-template-columns: 1fr;
                gap: 16px;
                padding-bottom: 40px;
            }

            .main-column,
            .side-column {
                gap: 16px;
            }

            .panel {
                padding: 22px 19px;
            }

            .portfolio-actions .button {
                flex: 1 1 100%;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body>
    <header class="navbar">
        <nav class="container nav-inner">
            <a href="{{ url('/') }}" class="brand">
                Port<span>Craft.</span>
            </a>

            <div class="nav-links">
                <a href="{{ url('/portfolios') }}">Portfolios</a>
                <a href="{{ url('/portfolio/' . $portfolio->id . '/edit') }}">Edit profile</a>
            </div>
        </nav>
    </header>

    <main class="container">
        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <section class="hero">
            <div class="hero-inner">
                <div class="hero-copy">
                    <p class="eyebrow">Personal Portfolio</p>

                    <h1>{{ $portfolio->full_name }}</h1>

                    <p class="hero-description">{{ $portfolio->about ?: 'Welcome to my portfolio. Explore my background, skills, and work.' }}</p>

                    <div class="hero-actions">
                        <a class="button" href="#projects">Explore my work</a>

                        @if ($portfolio->email)
                            <a class="button button-outline"
                               href="mailto:{{ $portfolio->email }}">
                                Contact me
                            </a>
                        @endif
                    </div>
                </div>

                <div class="portrait-frame">
                    @if ($pictureUrl)
                        <img
                            class="portrait"
                            src="{{ $pictureUrl }}"
                            alt="Profile picture of {{ $portfolio->full_name }}"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                        >
                        <div class="portrait-placeholder" style="display:none;">
                            {{ strtoupper(substr($portfolio->full_name, 0, 1)) }}
                        </div>
                    @else
                        <div class="portrait-placeholder">
                            {{ strtoupper(substr($portfolio->full_name, 0, 1)) }}
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <section class="info-strip" aria-label="Contact information">
            <div class="info-item">
                <span class="info-label">Email</span>
                <div class="info-value">
                    @if ($portfolio->email)
                        <a href="mailto:{{ $portfolio->email }}">{{ $portfolio->email }}</a>
                    @else
                        Not provided
                    @endif
                </div>
            </div>

            <div class="info-item">
                <span class="info-label">Location</span>
                <div class="info-value">{{ $portfolio->address ?: 'Not provided' }}</div>
            </div>

            <div class="info-item">
                <span class="info-label">Website</span>
                <div class="info-value">
                    @if ($portfolio->website)
                        <a href="{{ $portfolio->website }}" target="_blank" rel="noopener noreferrer">
                            Visit website
                        </a>
                    @else
                        Not provided
                    @endif
                </div>
            </div>
        </section>

        <div class="content-grid">
            <div class="main-column">
                @if ($portfolio->about)
                    <section class="panel">
                        <div class="section-heading">
                            <span class="section-number">01</span>
                            <h2>About me</h2>
                        </div>
                        <div class="section-content">{{ $portfolio->about }}</div>
                    </section>
                @endif

                @if ($portfolio->education)
                    <section class="panel">
                        <div class="section-heading">
                            <span class="section-number">02</span>
                            <h2>Education</h2>
                        </div>
                        <div class="section-content">{{ $portfolio->education }}</div>
                    </section>
                @endif

                @if ($portfolio->projects)
                    <section class="panel" id="projects">
                        <div class="section-heading">
                            <span class="section-number">03</span>
                            <h2>Selected projects</h2>
                        </div>
                        <div class="section-content">{{ $portfolio->projects }}</div>
                    </section>
                @endif

                @if ($portfolio->experience)
                    <section class="panel">
                        <div class="section-heading">
                            <span class="section-number">04</span>
                            <h2>Experience</h2>
                        </div>
                        <div class="section-content">{{ $portfolio->experience }}</div>
                    </section>
                @endif
            </div>

            <aside class="side-column">
                @if ($portfolio->skills)
                    <section class="panel">
                        <div class="section-heading">
                            <span class="section-number">05</span>
                            <h2>Skills</h2>
                        </div>

                        <div class="skill-list">
                            @foreach (preg_split('/[,;\n]+/', $portfolio->skills, -1, PREG_SPLIT_NO_EMPTY) as $skill)
                                <span class="skill">{{ trim($skill) }}</span>
                            @endforeach
                        </div>
                    </section>
                @endif

                @if ($portfolio->social_links || $portfolio->email || $portfolio->contact_number || $portfolio->address || $portfolio->website)
                    <section class="panel">
                        <div class="section-heading">
                            <span class="section-number">06</span>
                            <h2>Get in touch</h2>
                        </div>

                        <div class="contact-list">
                            @if ($portfolio->email)
                                <div>
                                    <span class="contact-label">Email</span>
                                    <div class="contact-value">
                                        <a href="mailto:{{ $portfolio->email }}">{{ $portfolio->email }}</a>
                                    </div>
                                </div>
                            @endif

                            @if ($portfolio->contact_number)
                                <div>
                                    <span class="contact-label">Phone</span>
                                    <div class="contact-value">{{ $portfolio->contact_number }}</div>
                                </div>
                            @endif

                            @if ($portfolio->address)
                                <div>
                                    <span class="contact-label">Address</span>
                                    <div class="contact-value">{{ $portfolio->address }}</div>
                                </div>
                            @endif

                            @if ($portfolio->website)
                                <div>
                                    <span class="contact-label">Website</span>
                                    <div class="contact-value">
                                        <a href="{{ $portfolio->website }}" target="_blank" rel="noopener noreferrer">
                                            Visit my website
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if ($portfolio->social_links)
                                <div>
                                    <span class="contact-label">Social links</span>
                                    <div class="contact-value social-text">{{ $portfolio->social_links }}</div>
                                </div>
                            @endif
                        </div>
                    </section>
                @endif
            </aside>
        </div>

        <div class="portfolio-actions">
            <a class="button" href="{{ url('/portfolio/' . $portfolio->id . '/edit') }}">
                Edit portfolio
            </a>

            <a class="button button-outline" href="{{ url('/portfolio/create') }}">
                Create another
            </a>

            <a class="button button-outline" href="{{ url('/portfolios') }}">
                All portfolios
            </a>

            <a class="button button-outline" href="{{ url('/') }}">
                Home
            </a>
        </div>
    </main>
</body>
</html>
