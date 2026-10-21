
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolios | PortCraft</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

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
            font-family: Arial, Helvetica, sans-serif;
            background: var(--ivory);
            color: var(--espresso);
            line-height: 1.6;
        }

        body.modal-open {
            overflow: hidden;
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

        .logo .logo-port,
        .footer-brand .logo-port {
            color: var(--espresso);
        }

        .logo .logo-craft,
        .footer-brand .logo-craft {
            color: var(--terracotta);
        }

        .logo i {
            color: var(--terracotta);
            font-size: 20px;
            margin-right: 5px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-links a {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 0;
            color: var(--muted);
            font-size: 14px;
            font-weight: 600;
            transition: color .2s ease;
        }

        .nav-links a i {
            font-size: 14px;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--terracotta);
        }

        .nav-links a.active::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 2px;
            background: var(--terracotta);
            border-radius: 2px;
        }

        .menu-toggle {
            display: none;
            padding: 9px 12px;
            border: 1px solid var(--oat);
            border-radius: 6px;
            background: var(--white);
            color: var(--espresso);
            cursor: pointer;
        }

        /* Main content */

        .main-content {
            min-height: calc(100vh - 150px);
            padding: 55px 0 75px;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
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
            letter-spacing: .5px;
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

        /* Buttons */

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 17px;
            border: 1px solid transparent;
            border-radius: 6px;
            background: var(--terracotta);
            color: var(--white);
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            cursor: pointer;
            transition: background .2s ease, transform .2s ease;
        }

        .button:hover {
            background: #8F4D37;
            transform: translateY(-1px);
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
            margin-bottom: 25px;
            padding: 14px 18px;
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
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .portfolio-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(52, 44, 39, .08);
        }

        .card-label {
            align-self: flex-start;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 13px;
            padding: 5px 10px;
            border-radius: 30px;
            background: #E9E8DC;
            color: var(--sage);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .4px;
            text-transform: uppercase;
        }

        .portfolio-card h2 {
            margin: 0 0 12px;
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
            align-items: center;
            justify-content: center;
            width: 62px;
            height: 62px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: #E9E8DC;
            color: var(--sage);
            font-size: 24px;
        }

        .empty-state h2 {
            margin: 0 0 10px;
            font-size: 25px;
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
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .footer-brand {
            font-size: 18px;
            font-weight: 700;
        }

        .footer-brand .logo-port {
            color: var(--espresso);
        }

        .footer-brand .logo-craft {
            color: var(--terracotta);
        }

        .footer p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
        }

        /* Delete confirmation modal */

        .delete-modal {
            position: fixed;
            inset: 0;
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity .25s ease, visibility .25s ease;
        }

        .delete-modal.is-open {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .delete-modal-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(42, 32, 27, .55);
            backdrop-filter: blur(5px);
        }

        .delete-modal-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 440px;
            padding: 36px 30px 28px;
            border: 1px solid rgba(166, 93, 67, .16);
            border-radius: 24px;
            background: var(--ivory);
            color: var(--espresso);
            text-align: center;
            box-shadow: 0 24px 70px rgba(35, 25, 20, .24);
            transform: translateY(12px) scale(.98);
            transition: transform .25s ease;
        }

        .delete-modal.is-open .delete-modal-card {
            transform: translateY(0) scale(1);
        }

        .delete-modal-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 54px;
            height: 54px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #F0DED2;
            color: var(--terracotta);
            font-size: 27px;
            font-weight: 700;
        }

        .delete-modal-eyebrow {
            display: block;
            margin-bottom: 10px;
            color: var(--terracotta);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .delete-modal-card h2 {
            margin: 0 0 12px;
            color: var(--espresso);
            font-family: inherit;
            font-size: 25px;
            line-height: 1.3;
        }

        .delete-modal-card p {
            margin: 0 auto 26px;
            max-width: 340px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.8;
        }

        .delete-modal-actions {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .delete-modal-actions button {
            min-height: 46px;
            padding: 12px 18px;
            border-radius: 12px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: background .2s ease, transform .2s ease;
        }

        .delete-cancel {
            border: 1px solid var(--sand);
            background: transparent;
            color: #6F5143;
        }

        .delete-cancel:hover {
            background: #EFE3D7;
        }

        .delete-confirm {
            border: 1px solid var(--terracotta);
            background: var(--terracotta);
            color: #FFFFFF;
        }

        .delete-confirm:hover {
            background: #8E4C36;
            transform: translateY(-1px);
        }

        .delete-modal-actions button:focus-visible {
            outline: 2px solid var(--terracotta);
            outline-offset: 3px;
        }

        /* Responsive */

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
                display: inline-flex;
                align-items: center;
                gap: 7px;
            }

            .nav-links {
                display: none;
                width: 100%;
                flex-direction: column;
                align-items: stretch;
                gap: 4px;
                padding: 8px 0 12px;
            }

            .nav-links.open {
                display: flex;
            }

            .nav-links a {
                padding: 12px 8px;
            }

            .nav-links a.active::after {
                right: auto;
                width: 100%;
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
                align-items: flex-start;
                flex-direction: column;
            }

            .delete-modal-card {
                padding: 30px 20px 24px;
            }

            .delete-modal-actions {
                flex-direction: column-reverse;
            }

            .delete-modal-actions button {
                width: 100%;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

<header class="navbar">
    <div class="container nav-content">

        <a href="{{ url('/') }}" class="logo">
            <span class="logo-port">port</span><span class="logo-craft">craft</span><span>.</span>
        </a>

        <button
            class="menu-toggle"
            id="menuToggle"
            type="button"
            aria-expanded="false"
            aria-controls="navLinks"
        >
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
            Menu
        </button>

        <nav class="nav-links" id="navLinks">
            <a href="{{ url('/') }}">
                <i class="fa-solid fa-house" aria-hidden="true"></i>
                Home
            </a>

            <a href="{{ url('/portfolios') }}" class="active" aria-current="page">
                <i class="fa-solid fa-folder-open" aria-hidden="true"></i>
                My Portfolios
            </a>
        </nav>

    </div>
</header>

<main class="container main-content">

    <header class="page-header">
        <div>
            <span class="eyebrow">Your work, all in one place</span>
            <h1>My Portfolios</h1>
            <p class="subtitle">
                Manage all your saved portfolios in one place.
            </p>
        </div>

        <a href="{{ url('/portfolio/create') }}" class="button">
            <i class="fa-solid fa-plus" aria-hidden="true"></i>
            Create Portfolio
        </a>
    </header>

    @if (session('success'))
        <div class="success" role="status">
            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
            {{ session('success') }}
        </div>
    @endif

    @if ($portfolios->count() > 0)

        <div class="portfolio-grid">
            @foreach ($portfolios as $portfolio)

                <article class="portfolio-card">

                    <span class="card-label">
                        <i class="fa-solid fa-palette" aria-hidden="true"></i>
                        {{ ucfirst($portfolio->template ?? 'Portfolio') }}
                    </span>

                    <h2>{{ $portfolio->full_name }}</h2>

                    <p>
                        <strong>
                            <i class="fa-regular fa-envelope" aria-hidden="true"></i>
                            Email:
                        </strong>
                        {{ $portfolio->email }}
                    </p>

                    @if ($portfolio->contact_number)
                        <p>
                            <strong>
                                <i class="fa-solid fa-phone" aria-hidden="true"></i>
                                Contact:
                            </strong>
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
                        <a href="{{ url('/portfolio/' . $portfolio->id) }}" class="button">
                            <i class="fa-regular fa-eye" aria-hidden="true"></i>
                            View
                        </a>

                        <a href="{{ url('/portfolio/' . $portfolio->id . '/edit') }}" class="button secondary">
                            <i class="fa-solid fa-pen" aria-hidden="true"></i>
                            Edit
                        </a>

                        <form
    action="{{ route('portfolio.destroy', $portfolio->id) }}"
    method="POST"
    class="delete-form"
>
    @csrf
    @method('DELETE')

    <button
        type="button"
        class="button delete-button"
        onclick="openDeleteModal(this)"
        aria-label="Delete portfolio for {{ $portfolio->full_name }}"
    >
        <i class="fa-regular fa-trash-can" aria-hidden="true"></i>
        Delete
    </button>
</form>
                    </div>

                </article>

            @endforeach
        </div>

    @else

        <section class="empty-state">
            <div class="empty-icon" aria-hidden="true">
                <i class="fa-solid fa-folder-open"></i>
            </div>

            <h2>No Portfolios Yet</h2>

            <p>
                You haven't created any portfolios yet.
                Start building your online portfolio and bring
                your skills, projects, and achievements together.
            </p>

            <a href="{{ url('/portfolio/create') }}" class="button">
                <i class="fa-solid fa-plus" aria-hidden="true"></i>
                Create Your First Portfolio
            </a>
        </section>

    @endif

</main>

<footer class="footer">
    <div class="container footer-content">

        <a href="{{ url('/') }}" class="footer-brand">
            <span class="logo-port">port</span><span class="logo-craft">craft</span><span>.</span>
        </a>

        <p>Made to showcase the work that matters to you.</p>

    </div>
</footer>

<!-- Delete confirmation modal -->
<div
    class="delete-modal"
    id="deleteModal"
    aria-hidden="true"
>
    <div
        class="delete-modal-backdrop"
        id="deleteModalBackdrop"
    ></div>

    <div
        class="delete-modal-card"
        role="dialog"
        aria-modal="true"
        aria-labelledby="deleteModalTitle"
        aria-describedby="deleteModalMessage"
        tabindex="-1"
    >
        <div class="delete-modal-icon" aria-hidden="true">
            <i class="fa-regular fa-trash-can"></i>
        </div>

        <span class="delete-modal-eyebrow">PORTCRAFT ACCOUNT</span>

        <h2 id="deleteModalTitle">Delete this portfolio?</h2>

        <p id="deleteModalMessage">
            Are you sure you want to delete this portfolio?
            This action cannot be undone.
        </p>

        <div class="delete-modal-actions">
            <button
                type="button"
                class="delete-cancel"
                id="cancelDeleteButton"
            >
                Keep portfolio
            </button>

            <button
                type="button"
                class="delete-confirm"
                id="confirmDeleteButton"
            >
                Yes, delete it
            </button>
        </div>
    </div>
</div>

<script>
    // Mobile navigation
    const menuToggle = document.getElementById('menuToggle');
    const navLinks = document.getElementById('navLinks');

    if (menuToggle && navLinks) {
        menuToggle.addEventListener('click', function () {
            const isOpen = navLinks.classList.toggle('open');
            menuToggle.setAttribute('aria-expanded', String(isOpen));
        });

        navLinks.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                navLinks.classList.remove('open');
                menuToggle.setAttribute('aria-expanded', 'false');
            });
        });
    }

    // Delete confirmation modal
    (() => {
        const modal = document.getElementById('deleteModal');
        const modalCard = modal.querySelector('.delete-modal-card');
        const cancelButton = document.getElementById('cancelDeleteButton');
        const confirmButton = document.getElementById('confirmDeleteButton');
        const backdrop = document.getElementById('deleteModalBackdrop');

        let selectedForm = null;
        let previousButton = null;
        let isSubmitting = false;

        window.openDeleteModal = function (button) {
            selectedForm = button.closest('form');
            previousButton = button;
            isSubmitting = false;

            if (!selectedForm) return;

            confirmButton.disabled = false;
            confirmButton.textContent = 'Yes, delete it';

            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');
            document.body.classList.add('modal-open');

            cancelButton.focus();
        };

        function closeDeleteModal() {
            if (isSubmitting) return;

            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('modal-open');

            if (previousButton) {
                previousButton.focus();
            }

            selectedForm = null;
            previousButton = null;
        }

        function confirmDeletePortfolio() {
            if (!selectedForm || isSubmitting) return;

            isSubmitting = true;
            confirmButton.disabled = true;
            confirmButton.textContent = 'Deleting...';

            // Submit the original Laravel form, including its CSRF token
            // and DELETE method spoofing.
            HTMLFormElement.prototype.submit.call(selectedForm);
        }

        cancelButton.addEventListener('click', closeDeleteModal);
        backdrop.addEventListener('click', closeDeleteModal);
        confirmButton.addEventListener('click', confirmDeletePortfolio);

        document.addEventListener('keydown', function (event) {
            if (!modal.classList.contains('is-open')) return;

            if (event.key === 'Escape') {
                event.preventDefault();
                closeDeleteModal();
            }

            // Keep keyboard focus inside the open dialog.
            if (event.key === 'Tab') {
                const focusable = modal.querySelectorAll(
                    'button:not(:disabled)'
                );

                if (!focusable.length) return;

                const first = focusable[0];
                const last = focusable[focusable.length - 1];

                if (event.shiftKey && document.activeElement === first) {
                    event.preventDefault();
                    last.focus();
                } else if (
                    !event.shiftKey &&
                    document.activeElement === last
                ) {
                    event.preventDefault();
                    first.focus();
                }
            }
        });
    })();
</script>

</body>
</html>
