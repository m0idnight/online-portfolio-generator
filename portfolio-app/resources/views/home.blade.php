<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PortCraft | Your Portfolio, Your Story</title>

    <style>
        :root {
            --ivory: #F7F1E8;
            --sand: #D8B99C;
            --terracotta: #A65D43;
            --sage: #6F7654;
            --oat: #E8D8C4;
            --espresso: #342C27;
            --white: #FFFCF8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--ivory);
            color: var(--espresso);
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font: inherit;
            -webkit-tap-highlight-color: transparent;
        }

        .container {
            width: min(1120px, 90%);
            margin: 0 auto;
        }

        /* Navigation */

        .navbar {
            background: var(--ivory);
            border-bottom: 1px solid var(--oat);
        }

        .nav-content {
            min-height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .logo {
            font-size: 25px;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .logo span,
        .footer-brand span {
            color: var(--terracotta);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-links a {
            font-size: 14px;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .nav-links a:hover {
            color: var(--terracotta);
        }

        .nav-cta {
            background: var(--terracotta);
            color: var(--white);
            padding: 11px 20px;
            border-radius: 6px;
        }

        .nav-cta:hover {
            background: #8F4D37;
            color: var(--white) !important;
        }

        .menu-toggle {
            display: none;
            border: 1px solid var(--oat);
            background: var(--white);
            color: var(--espresso);
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
        }

        /* Hero section */

        .hero {
            padding: 100px 0 95px;
        }

        .hero-content {
            max-width: 720px;
        }

        .eyebrow {
            display: inline-block;
            color: var(--sage);
            background: #E9E8DC;
            padding: 7px 13px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            margin-bottom: 22px;
        }

        .hero h1 {
            font-size: clamp(40px, 6vw, 64px);
            line-height: 1.12;
            letter-spacing: -2px;
            font-weight: 700;
            margin-bottom: 22px;
        }

        .hero h1 span {
            color: var(--terracotta);
        }

        .hero-description {
            max-width: 560px;
            font-size: 16px;
            color: #75685F;
            margin-bottom: 30px;
        }

        .button-group {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 14px;
        }

        .button {
            display: inline-block;
            border: 1px solid transparent;
            border-radius: 6px;
            padding: 13px 22px;
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            cursor: pointer;
            transition: background 0.2s ease,
                        color 0.2s ease,
                        border-color 0.2s ease;
        }

        .button-primary {
            background: var(--terracotta);
            color: var(--white);
        }

        .button-primary:hover {
            background: #8F4D37;
        }

        .button-secondary {
            border-color: var(--sand);
            color: var(--espresso);
            background: transparent;
        }

        .button-secondary:hover {
            background: var(--oat);
        }

        /* Template section */

        .section {
            padding: 76px 0;
        }

        .section-white {
            background: var(--white);
        }

        .section-heading {
            max-width: 600px;
            margin-bottom: 35px;
        }

        .section-heading .eyebrow {
            margin-bottom: 13px;
        }

        .section-heading h2 {
            font-size: clamp(28px, 4vw, 40px);
            line-height: 1.2;
            letter-spacing: -1px;
            margin-bottom: 12px;
        }

        .section-heading p {
            color: #75685F;
            font-size: 15px;
        }

        .template-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .template-card {
            border: 1px solid var(--oat);
            background: var(--white);
            border-radius: 9px;
            overflow: hidden;
            transition: transform 0.2s ease,
                        box-shadow 0.2s ease;
        }

        .template-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 28px rgba(52, 44, 39, 0.08);
        }

        .template-art {
            padding: 22px;
            min-height: 205px;
            background: #F0E4D6;
        }

        .template-card:nth-child(2) .template-art {
            background: #E6E7DB;
        }

        .template-card:nth-child(3) .template-art {
            background: #E8E0D7;
        }

        .mini-page {
            max-width: 260px;
            min-height: 160px;
            margin: 0 auto;
            padding: 17px;
            background: var(--white);
            border: 1px solid rgba(52, 44, 39, 0.08);
            border-radius: 4px;
            box-shadow: 0 5px 12px rgba(52, 44, 39, 0.05);
        }

        .mini-line {
            height: 5px;
            background: #D8C9B9;
            border-radius: 3px;
            margin-bottom: 7px;
            width: 65%;
        }

        .mini-line.short {
            width: 35%;
        }

        .mini-line.long {
            width: 85%;
        }

        .mini-line.dark {
            background: #8E7666;
            height: 8px;
            width: 55%;
            margin-bottom: 12px;
        }

        .mini-line.olive {
            background: #A0A68A;
        }

        .mini-columns {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
            margin-top: 13px;
        }

        .mini-box {
            height: 43px;
            background: #F0E4D6;
            border-radius: 3px;
        }

        .mini-box.olive {
            background: #E4E5D8;
        }

        .template-info {
            padding: 22px;
        }

        .template-info h3 {
            font-size: 19px;
            margin-bottom: 7px;
        }

        .template-info p {
            color: #75685F;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .template-link {
            display: inline-block;
            color: var(--terracotta);
            font-size: 14px;
            font-weight: 700;
        }

        .template-link:hover {
            text-decoration: underline;
        }

        .template-note {
            color: #75685F;
            font-size: 12px;
            margin-top: 18px;
        }

        /* How it works */

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 30px;
        }

        .step {
            padding: 24px;
            border: 1px solid var(--oat);
            border-radius: 8px;
            background: var(--ivory);
        }

        .step-number {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--sage);
            color: white;
            border-radius: 50%;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .step h3 {
            font-size: 18px;
            margin-bottom: 8px;
        }

        .step p {
            color: #75685F;
            font-size: 14px;
        }

        /* Call to action */

        .cta-section {
            padding: 76px 0;
        }

        .cta-card {
            padding: 52px 30px;
            text-align: center;
            border-radius: 10px;
            background: var(--oat);
        }

        .cta-card h2 {
            font-size: clamp(28px, 4vw, 40px);
            line-height: 1.2;
            letter-spacing: -1px;
            margin-bottom: 14px;
        }

        .cta-card p {
            color: #75685F;
            max-width: 510px;
            margin: 0 auto 25px;
            font-size: 15px;
        }

        /* Footer */

        .footer {
            border-top: 1px solid var(--oat);
            padding: 25px 0;
        }

        .footer-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
        }

        .footer-brand {
            font-size: 18px;
            font-weight: 700;
        }

        .footer p {
            color: #75685F;
            font-size: 12px;
        }

        /* Responsive design */

        @media (max-width: 850px) {
            .hero {
                padding: 75px 0;
            }

            .template-grid,
            .steps-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 600px) {
            .nav-content {
                min-height: 68px;
                flex-wrap: wrap;
                padding: 13px 0;
            }

            .menu-toggle {
                display: block;
            }

            .nav-links {
                display: none;
                width: 100%;
                flex-direction: column;
                align-items: stretch;
                gap: 0;
                padding: 8px 0 4px;
            }

            .nav-links.open {
                display: flex;
            }

            .nav-links a {
                padding: 12px 4px;
            }

            .nav-links .nav-cta {
                margin-top: 6px;
                text-align: center;
            }

            .hero {
                padding: 58px 0;
            }

            .hero h1 {
                letter-spacing: -1.2px;
            }

            .hero-description {
                font-size: 15px;
            }

            .section {
                padding: 55px 0;
            }

            .template-grid,
            .steps-grid {
                grid-template-columns: 1fr;
            }

            .template-art {
                min-height: 190px;
            }

            .cta-section {
                padding: 50px 0;
            }

            .cta-card {
                padding: 38px 20px;
            }

            .footer-content {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>

<body>
    <header class="navbar">
        <div class="container nav-content">
            <a href="{{ url('/') }}" class="logo">
                port<span>craft</span>
            </a>

            <button
                class="menu-toggle"
                id="menuToggle"
                type="button"
                aria-expanded="false"
                aria-controls="navLinks"
            >
                Menu
            </button>

            <nav class="nav-links" id="navLinks">
                <a href="{{ url('/') }}">Home</a>
                <a href="#templates">Templates</a>
                <a href="#how-it-works">How it works</a>
                <a href="{{ url('/portfolios') }}">My Portfolios</a>
                <a href="{{ url('/portfolio/create') }}" class="nav-cta">
                    Create Portfolio
                </a>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <span class="eyebrow">Your work deserves a home</span>

                    <h1>
                        Your portfolio,<br>
                        <span>your story.</span>
                    </h1>

                    <p class="hero-description">
                        Create a personal portfolio that brings your skills,
                        projects, and achievements together in one place.
                        Simple to build, easy to share.
                    </p>

                    <div class="button-group">
                        <a href="{{ url('/portfolio/create') }}"
                           class="button button-primary">
                            Create your portfolio
                        </a>

                        <a href="#templates"
                           class="button button-secondary">
                            Explore templates
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-white" id="templates">
            <div class="container">
                <div class="section-heading">
                    <span class="eyebrow">Find your style</span>
                    <h2>A portfolio that feels like you.</h2>
                    <p>
                        Choose a design that fits your personality and the
                        work you want to share.
                    </p>
                </div>

                <div class="template-grid">
                    <article class="template-card">
                        <div class="template-art">
                            <div class="mini-page">
                                <div class="mini-line short"></div>
                                <div class="mini-line dark"></div>
                                <div class="mini-line long"></div>
                                <div class="mini-line"></div>
                                <div class="mini-columns">
                                    <div class="mini-box"></div>
                                    <div class="mini-box"></div>
                                </div>
                            </div>
                        </div>

                        <div class="template-info">
                            <h3>Minimalist</h3>
                            <p>
                                Clean, calm, and focused on what matters
                                most: your work.
                            </p>
                            <a href="{{ url('/portfolio/create') }}?template=minimalist"
                               class="template-link">
                                Choose Minimalist
                            </a>
                        </div>
                    </article>

                    <article class="template-card">
                        <div class="template-art">
                            <div class="mini-page">
                                <div class="mini-line olive short"></div>
                                <div class="mini-line dark long"></div>
                                <div class="mini-line"></div>
                                <div class="mini-columns">
                                    <div class="mini-box olive"></div>
                                    <div class="mini-box"></div>
                                </div>
                                <div class="mini-line olive"
                                     style="margin-top: 12px;"></div>
                            </div>
                        </div>

                        <div class="template-info">
                            <h3>Creative</h3>
                            <p>
                                A little more personality for creative
                                projects and unique ideas.
                            </p>
                            <a href="{{ url('/portfolio/create') }}?template=creative"
                               class="template-link">
                                Choose Creative
                            </a>
                        </div>
                    </article>

                    <article class="template-card">
                        <div class="template-art">
                            <div class="mini-page">
                                <div class="mini-line dark short"></div>
                                <div class="mini-line long"></div>
                                <div class="mini-line short"></div>
                                <div class="mini-columns">
                                    <div class="mini-box olive"></div>
                                    <div class="mini-box olive"></div>
                                </div>
                                <div class="mini-line long"
                                     style="margin-top: 12px;"></div>
                            </div>
                        </div>

                        <div class="template-info">
                            <h3>Developer</h3>
                            <p>
                                A straightforward layout for technical
                                skills, projects, and experience.
                            </p>
                            <a href="{{ url('/portfolio/create') }}?template=developer"
                               class="template-link">
                                Choose Developer
                            </a>
                        </div>
                    </article>
                </div>

                <p class="template-note">
                    These are homepage previews of the existing templates.
                    Your portfolio template designs remain separate.
                </p>
            </div>
        </section>

        <section class="section" id="how-it-works">
            <div class="container">
                <div class="section-heading">
                    <span class="eyebrow">Simple by design</span>
                    <h2>Three steps to get started.</h2>
                    <p>
                        Bring your information together and create a
                        portfolio you can share.
                    </p>
                </div>

                <div class="steps-grid">
                    <article class="step">
                        <div class="step-number">1</div>
                        <h3>Choose a template</h3>
                        <p>
                            Start with a design that suits your style
                            and the work you want to showcase.
                        </p>
                    </article>

                    <article class="step">
                        <div class="step-number">2</div>
                        <h3>Add your details</h3>
                        <p>
                            Include your introduction, skills, education,
                            projects, and other achievements.
                        </p>
                    </article>

                    <article class="step">
                        <div class="step-number">3</div>
                        <h3>Share your work</h3>
                        <p>
                            Preview your portfolio and share its link
                            with classmates, teachers, or future employers.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="cta-section">
            <div class="container">
                <div class="cta-card">
                    <h2>Ready to tell your story?</h2>
                    <p>
                        Start building your portfolio today.
                        Your projects and achievements deserve to be seen.
                    </p>
                    <a href="{{ url('/portfolio/create') }}"
                       class="button button-primary">
                        Create your portfolio
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer-content">
            <a href="{{ url('/') }}" class="footer-brand">
                port<span>craft</span>
            </a>
            <p>Made to showcase the work that matters to you.</p>
        </div>
    </footer>

    <script>
        const menuToggle = document.getElementById('menuToggle');
        const navLinks = document.getElementById('navLinks');

        menuToggle.addEventListener('click', function () {
            const isOpen = navLinks.classList.toggle('open');
            menuToggle.setAttribute('aria-expanded', isOpen);
        });

        navLinks.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                navLinks.classList.remove('open');
                menuToggle.setAttribute('aria-expanded', 'false');
            });
        });
    </script>
</body>
</html>