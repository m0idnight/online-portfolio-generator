<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Portfolios | PortCraft</title>

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
            justify-content: space-between;
            align-items: center;
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
            padding: 55px 0 75px;
            min-height: calc(100vh - 150px);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 22px;
            margin-bottom: 30px;
        }

        .eyebrow {
            display: inline-block;
            margin-bottom: 10px;
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
            color: var(--espresso);
        }

        .subtitle {
            margin: 12px 0 0;
            color: var(--muted);
            font-size: 15px;
        }

        /* Buttons */

        .button {
            display: inline-block;
            padding: 11px 17px;
            border: 1px solid transparent;
            border-radius: 6px;
            background: var(--terracotta);
            color: var(--white);
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            cursor: pointer;
            transition: background 0.2s ease,
                        color 0.2s ease,
                        border-color 0.2s ease;
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

        .delete-button {
            background: var(--danger);
            color: white;
        }

        .delete-button:hover {
            background: #70251F;
        }

        /* Success message */

        .success {
            padding: 14px 18px;
            margin-bottom: 25px;
            border: 1px solid #C6D2B5;
            border-radius: 8px;
            background: #E9EEDD;
            color: #465536;
            font-size: 14px;
        }

        /* Portfolio cards */

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .portfolio-card {
            display: flex;
            flex-direction: column;
            min-width: 0;
            padding: 25px;
            border: 1px solid var(--oat);
            border-radius: 9px;
            background: var(--white);
            transition: transform 0.2s ease,
                        box-shadow 0.2s ease;
        }

        .portfolio-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(52, 44, 39, 0.08);
        }

        .card-label {
            align-self: flex-start;
            margin-bottom: 13px;
            padding: 5px 10px;
            border-radius: 30px;
            background: #E9E8DC;
            color: var(--sage);
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .portfolio-card h2 {
            margin: 0 0 12px;
            color: var(--espresso);
            font-size: 21px;
            line-height: 1.35;
            overflow-wrap: anywhere;
        }

        .portfolio-card p {
            margin: 0 0 12px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .portfolio-card strong {
            color: var(--espresso);
        }

        .portfolio-email {
            font-size: 14px;
        }

        .portfolio-description {
            margin-top: 5px !important;
        }

        .card-divider {
            height: 1px;
            margin: 8px 0 16px;
            background: var(--oat);
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
            margin-top: auto;
            padding-top: 12px;
        }

        .actions .button {
            padding: 9px 13px;
            font-size: 13px;
        }

        .actions form {
            margin: 0;
        }

        /* Empty state */

        .empty-state {
            padding: 55px 25px;
            border: 1px solid var(--oat);
            border-radius: 9px;
            background: var(--white);
            text-align: center;
        }

        .empty-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 58px;
            height: 58px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: #E9E8DC;
            color: var(--sage);
            font-size: 26px;
            font-weight: 700;
        }

        .empty-state h2 {
            margin: 0 0 10px;
            font-size: 25px;
            color: var(--espresso);
        }

        .empty-state p {
            max-width: 440px;
            margin: 0 auto 24px;
            color: var(--muted);
            font-size: 14px;
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

        /* Responsive layout */

        @media (max-width: 900px) {
            .portfolio-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 600px) {
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
                padding: 38px 0 55px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .portfolio-grid {
                grid-template-columns: 1fr;
            }

            .portfolio-card {
                padding: 22px;
            }

            .footer-content {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (prefers-reduced-motion: reduce) {
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

                <a href="{{ url('/portfolios') }}">
                    My Portfolios
                </a>

                <a href="{{ url('/portfolio/create') }}" class="nav-cta">
                    + Create Portfolio
                </a>
            </nav>

        </div>
    </header>

    <main class="container main-content">

        <!-- Page heading -->
        <header class="page-header">
            <div>
                <span class="eyebrow">Your work, all in one place</span>

                <h1>My Portfolios</h1>

                <p class="subtitle">
                    Manage all your saved portfolios in one place.
                </p>
            </div>

            <a href="{{ url('/portfolio/create') }}" class="button">
                + Create Portfolio
            </a>
        </header>

        <!-- Success message -->
        @if (session('success'))
            <div class="success" role="status">
                {{ session('success') }}
            </div>
        @endif

        <!-- Saved portfolios -->
        @if ($portfolios->count() > 0)

            <div class="portfolio-grid">

                @foreach ($portfolios as $portfolio)

                    <article class="portfolio-card">

                        <span class="card-label">
                            {{ ucfirst($portfolio->template ?? 'Portfolio') }}
                        </span>

                        <h2>
                            {{ $portfolio->full_name }}
                        </h2>

                        <p class="portfolio-email">
                            <strong>Email:</strong>
                            {{ $portfolio->email }}
                        </p>

                        @if ($portfolio->contact_number)
                            <p>
                                <strong>Contact:</strong>
                                {{ $portfolio->contact_number }}
                            </p>
                        @endif

                        @if ($portfolio->about)
                            <p class="portfolio-description">
                                {{ \Illuminate\Support\Str::limit($portfolio->about, 150) }}
                            </p>
                        @endif

                        <div class="card-divider"></div>

                        <div class="actions">

                            <a
                                href="{{ url('/portfolio/' . $portfolio->id) }}"
                                class="button"
                            >
                                View
                            </a>

                            <a
                                href="{{ url('/portfolio/' . $portfolio->id . '/edit') }}"
                                class="button secondary"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ url('/portfolio/' . $portfolio->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this portfolio? This action cannot be undone.');"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="button delete-button"
                                >
                                    Delete
                                </button>
                            </form>

                        </div>

                    </article>

                @endforeach

            </div>

        @else

            <!-- Empty state -->
            <section class="empty-state">

                <div class="empty-icon" aria-hidden="true">+</div>

                <h2>No Portfolios Yet</h2>

                <p>
                    You haven't created any portfolios yet.
                    Start building your online portfolio and bring
                    your skills, projects, and achievements together.
                </p>

                <a
                    href="{{ url('/portfolio/create') }}"
                    class="button"
                >
                    Create Your First Portfolio
                </a>

            </section>

        @endif

    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-content">

            <a href="{{ url('/') }}" class="footer-brand">
                port<span>craft</span>
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