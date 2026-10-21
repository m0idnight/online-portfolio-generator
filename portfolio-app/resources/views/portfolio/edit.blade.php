
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Portfolio | PortCraft</title>

    <style>
        :root {
            --ivory: #F7F1E8;
            --sand: #D8B99C;
            --terracotta: #A65D43;
            --sage: #6F7654;
            --oat: #E8D8C4;
            --espresso: #342C27;
            --white: #FFFCF8;
            --muted: #75685F;
            --danger: #8D3029;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 0;
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
            gap: 28px;
        }

        .nav-links a {
            font-size: 14px;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .nav-links a:hover {
            color: var(--terracotta);
        }

        .nav-links .nav-cta {
            background: var(--terracotta);
            color: var(--white);
            padding: 11px 18px;
            border-radius: 6px;
        }

        .nav-links .nav-cta:hover {
            background: #8F4D37;
            color: var(--white);
        }

        .menu-toggle {
            display: none;
            padding: 8px 12px;
            border: 1px solid var(--oat);
            border-radius: 6px;
            background: var(--white);
            color: var(--espresso);
            cursor: pointer;
        }

        /* Main content */

        .main-content {
            padding: 50px 0 75px;
        }

        .page-heading {
            margin-bottom: 28px;
        }

        .eyebrow {
            display: inline-block;
            margin-bottom: 12px;
            padding: 6px 12px;
            border-radius: 30px;
            background: #E9E8DC;
            color: var(--sage);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        h1 {
            margin: 0;
            font-size: clamp(30px, 4vw, 42px);
            line-height: 1.2;
            letter-spacing: -1px;
        }

        .subtitle {
            margin: 12px 0 0;
            color: var(--muted);
            font-size: 15px;
        }

        /* Form card */

        .form-card {
            padding: 32px;
            border: 1px solid var(--oat);
            border-radius: 10px;
            background: var(--white);
            box-shadow: 0 8px 28px rgba(52, 44, 39, 0.04);
        }

        .form-section-title {
            margin: 0 0 8px;
            font-size: 20px;
            color: var(--espresso);
        }

        .form-section-description {
            margin: 0 0 25px;
            color: var(--muted);
            font-size: 14px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 0;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        label {
            color: var(--espresso);
            font-size: 14px;
            font-weight: 700;
        }

        .required {
            color: var(--terracotta);
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid var(--sand);
            border-radius: 6px;
            background: var(--white);
            color: var(--espresso);
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            line-height: 1.5;
            transition: border-color 0.2s ease,
                        box-shadow 0.2s ease;
        }

        textarea {
            min-height: 115px;
            resize: vertical;
        }

        input[type="file"] {
            padding: 10px;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: var(--terracotta);
            box-shadow: 0 0 0 3px rgba(166, 93, 67, 0.12);
        }

        input::placeholder,
        textarea::placeholder {
            color: #9A8D83;
        }

        .hint {
            color: var(--muted);
            font-size: 12px;
        }

        /* Validation errors */

        .error {
            padding: 15px 18px;
            margin-bottom: 25px;
            border: 1px solid #E5B8B1;
            border-radius: 8px;
            background: #FBEAE7;
            color: var(--danger);
            font-size: 14px;
        }

        .error strong {
            display: block;
            margin-bottom: 6px;
        }

        .error ul {
            margin: 0;
            padding-left: 22px;
        }

        /* Action buttons */

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
            padding-top: 24px;
            border-top: 1px solid var(--oat);
        }

        .button {
            display: inline-block;
            padding: 12px 20px;
            border: 1px solid transparent;
            border-radius: 6px;
            background: var(--terracotta);
            color: var(--white);
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            cursor: pointer;
            transition: background 0.2s ease,
                        color 0.2s ease;
        }

        .button:hover {
            background: #8F4D37;
        }

        .secondary {
            border-color: var(--sand);
            background: transparent;
            color: var(--espresso);
        }

        .secondary:hover {
            background: var(--oat);
        }

        /* Footer */

        .footer {
            border-top: 1px solid var(--oat);
            padding: 24px 0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .footer-brand {
            font-size: 18px;
            font-weight: 700;
        }

        .footer p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
        }

        /* Responsive design */

        @media (max-width: 700px) {
            .nav-content {
                min-height: 68px;
                flex-wrap: wrap;
                padding: 12px 0;
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
                padding: 12px;
                text-align: center;
            }

            .main-content {
                padding: 35px 0 50px;
            }

            .form-card {
                padding: 22px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 19px;
            }

            .full-width {
                grid-column: auto;
            }

            .actions {
                flex-direction: column;
            }

            .actions .button {
                width: 100%;
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

    <!-- Navigation -->
    <header class="navbar">
        <div class="container nav-content">

            <a href="{{ url('/') }}" class="logo">
                port<span>craft.</span>
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

                <a href="{{ url('/portfolios') }}">
                    My Portfolios
                </a>

                <a href="{{ url('/portfolio/create') }}" class="nav-cta">
                    + Create Portfolio
                </a>
            </nav>

        </div>
    </header>

    <!-- Main content -->
    <main class="container main-content">

        <header class="page-heading">
            <span class="eyebrow">Keep your story up to date</span>

            <h1>Edit Your Portfolio</h1>

            <p class="subtitle">
                Update your information below and save your changes.
            </p>
        </header>

        <!-- Validation errors -->
        @if ($errors->any())
            <div class="error" role="alert">
                <strong>Please correct the following:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit form -->
        <section class="form-card">

            <h2 class="form-section-title">Your Information</h2>

            <p class="form-section-description">
                Fields marked with <span class="required">*</span> are required.
                Your saved information is filled in automatically.
            </p>

            <form
                action="{{ url('/portfolio/' . $portfolio->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                <div class="form-grid">

                    <div class="field full-width">
                        <label for="full_name">
                            Full Name <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="full_name"
                            name="full_name"
                            value="{{ old('full_name', $portfolio->full_name) }}"
                            autocomplete="name"
                            required
                        >
                    </div>

                    <div class="field">
                        <label for="email">
                            Email Address <span class="required">*</span>
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', $portfolio->email) }}"
                            autocomplete="email"
                            required
                        >
                    </div>

                    <div class="field">
                        <label for="contact_number">
                            Contact Number
                        </label>

                        <input
                            type="text"
                            id="contact_number"
                            name="contact_number"
                            value="{{ old('contact_number', $portfolio->contact_number) }}"
                            autocomplete="tel"
                        >
                    </div>

                    <div class="field full-width">
                        <label for="profile_picture">
                            Profile Picture
                        </label>

                        <input
                            type="file"
                            id="profile_picture"
                            name="profile_picture"
                            accept="image/*"
                        >

                        <span class="hint">
                            Optional. Leave empty to keep your current picture.
                            Maximum size: 2 MB.
                        </span>
                    </div>

                    <div class="field full-width">
                        <label for="address">Address</label>

                        <textarea
                            id="address"
                            name="address"
                        >{{ old('address', $portfolio->address) }}</textarea>
                    </div>

                    <div class="field full-width">
                        <label for="about">About Me</label>

                        <textarea
                            id="about"
                            name="about"
                            placeholder="Write a short introduction about yourself..."
                        >{{ old('about', $portfolio->about) }}</textarea>
                    </div>

                    <div class="field full-width">
                        <label for="education">Education</label>

                        <textarea
                            id="education"
                            name="education"
                            placeholder="Add your educational background..."
                        >{{ old('education', $portfolio->education) }}</textarea>
                    </div>

                    <div class="field full-width">
                        <label for="skills">Skills</label>

                        <textarea
                            id="skills"
                            name="skills"
                            placeholder="List your skills..."
                        >{{ old('skills', $portfolio->skills) }}</textarea>
                    </div>

                    <div class="field full-width">
                        <label for="projects">Projects</label>

                        <textarea
                            id="projects"
                            name="projects"
                            placeholder="Describe your projects..."
                        >{{ old('projects', $portfolio->projects) }}</textarea>
                    </div>

                    <div class="field full-width">
                        <label for="experience">Experience</label>

                        <textarea
                            id="experience"
                            name="experience"
                            placeholder="Add your work or relevant experience..."
                        >{{ old('experience', $portfolio->experience) }}</textarea>
                    </div>

                    <div class="field full-width">
                        <label for="social_links">Social Links</label>

                        <textarea
                            id="social_links"
                            name="social_links"
                            placeholder="Add your social media links..."
                        >{{ old('social_links', $portfolio->social_links) }}</textarea>
                    </div>

                    <div class="field full-width">
                        <label for="website">Personal Website</label>

                        <input
                            type="url"
                            id="website"
                            name="website"
                            placeholder="https://example.com"
                            value="{{ old('website', $portfolio->website) }}"
                        >
                    </div>

                </div>

                <!-- Form actions -->
                <div class="actions">

                    <button type="submit" class="button">
                        Save Changes
                    </button>

                    <a
                        href="{{ url('/portfolio/' . $portfolio->id) }}"
                        class="button secondary"
                    >
                        Cancel
                    </a>

                </div>
            </form>
        </section>

    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-content">

            <a href="{{ url('/') }}" class="footer-brand">
                port<span>craft.</span>
            </a>

            <p>
                Made to showcase the work that matters to you.
            </p>

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
