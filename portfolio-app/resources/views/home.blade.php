<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#F7F1E8">
    <title>PortCraft | Your Portfolio, Your Story</title>

    <style>
        :root {
            --ivory: #F7F1E8;
            --sand: #D8B99C;
            --terracotta: #A65D43;
            --terracotta-dark: #8F4D37;
            --sage: #6F7654;
            --oat: #E8D8C4;
            --espresso: #342C27;
            --muted: #75685F;
            --white: #FFFCF8;
            --border: #E5D8C9;
            --shadow: 0 12px 35px rgba(52, 44, 39, 0.07);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 95px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--ivory);
            color: var(--espresso);
            line-height: 1.7;
            -webkit-font-smoothing: antialiased;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font: inherit;
            -webkit-tap-highlight-color: transparent;
        }

        button,
        a {
            -webkit-tap-highlight-color: transparent;
        }

        a:focus-visible,
        button:focus-visible {
            outline: 3px solid var(--sage);
            outline-offset: 4px;
        }

        .container {
            width: min(1120px, 90%);
            margin: 0 auto;
        }

        /* NAVIGATION */

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(247, 241, 232, 0.96);
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }

        .nav-content {
            min-height: 82px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 32px;
        }

        .logo {
            flex-shrink: 0;
            font-size: 27px;
            font-weight: 800;
            letter-spacing: -1.5px;
            line-height: 1.2;
        }

        .logo-port,
        .footer-brand .logo-port {
            color: #392D26;
        }

        .logo-craft,
        .footer-brand .logo-craft {
            color: #B26043;
        }

        .logo-dot,
        .footer-brand .logo-dot {
            color: #392D26;
        }

        .nav-links {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: clamp(18px, 2.5vw, 32px);
        }

        /* Animated underline navigation */

        .nav-links > a:not(.nav-cta) {
            position: relative;
            display: inline-flex;
            align-items: center;
            min-height: 44px;
            padding: 5px 0;
            color: var(--espresso);
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
            transition: color 0.25s ease;
        }

        .nav-links > a:not(.nav-cta)::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 4px;
            width: 100%;
            height: 2px;
            border-radius: 10px;
            background: var(--terracotta);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.25s ease;
        }

        .nav-links > a:not(.nav-cta):hover,
        .nav-links > a:not(.nav-cta).active {
            color: var(--terracotta);
        }

        .nav-links > a:not(.nav-cta):hover::after,
        .nav-links > a:not(.nav-cta).active::after {
            transform: scaleX(1);
        }

        /* Navbar buttons */

        .nav-cta {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 10px 20px;
            border: 1px solid var(--terracotta);
            border-radius: 7px;
            background: var(--terracotta);
            color: var(--white);
            font-size: 14px;
            font-weight: 700;
            transition: background 0.2s ease,
                        border-color 0.2s ease,
                        transform 0.2s ease;
        }

        .nav-cta:hover {
            background: var(--terracotta-dark);
            border-color: var(--terracotta-dark);
            color: var(--white);
            transform: translateY(-1px);
        }

        .logout-form {
            display: inline-flex;
            margin: 0;
        }

        .logout-button {
            font: inherit;
            cursor: pointer;
        }

        .menu-toggle {
            display: none;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 42px;
            padding: 8px 13px;
            border: 1px solid var(--border);
            border-radius: 7px;
            background: var(--white);
            color: var(--espresso);
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        /* PERSONALIZED GREETING */

        .welcome-message {
            margin-bottom: 30px;
        }

        .welcome-message h2 {
            font-size: clamp(24px, 3vw, 32px);
            line-height: 1.3;
            letter-spacing: -0.8px;
            margin-bottom: 5px;
        }

        .welcome-message p {
            color: var(--muted);
            font-size: 15px;
        }

        /* HERO */

        .hero {
            position: relative;
            overflow: hidden;
            padding: clamp(75px, 10vw, 125px) 0 clamp(85px, 10vw, 120px);
        }

        .hero::after {
            content: "";
            position: absolute;
            top: 65px;
            right: -140px;
            width: 360px;
            height: 360px;
            border: 1px solid rgba(166, 93, 67, 0.10);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 750px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 15px;
            margin-bottom: 24px;
            border: 1px solid rgba(111, 118, 84, 0.12);
            border-radius: 50px;
            background: #E9E8DC;
            color: var(--sage);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .hero h1 {
            margin-bottom: 24px;
            font-size: clamp(44px, 7vw, 76px);
            font-weight: 800;
            line-height: 1.08;
            letter-spacing: -3px;
        }

        .hero h1 span {
            color: var(--terracotta);
        }

        .hero-description {
            max-width: 570px;
            margin-bottom: 32px;
            color: var(--muted);
            font-size: clamp(15px, 2vw, 17px);
            line-height: 1.9;
        }

        .button-group {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 14px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 50px;
            padding: 13px 23px;
            border: 1px solid transparent;
            border-radius: 7px;
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            cursor: pointer;
            transition: background 0.2s ease,
                        color 0.2s ease,
                        border-color 0.2s ease,
                        transform 0.2s ease;
        }

        .button:hover {
            transform: translateY(-2px);
        }

        .button-primary {
            background: var(--terracotta);
            color: var(--white);
        }

        .button-primary:hover {
            background: var(--terracotta-dark);
        }

        .button-secondary {
            border-color: var(--sand);
            background: transparent;
            color: var(--espresso);
        }

        .button-secondary:hover {
            border-color: var(--terracotta);
            background: #F0E4D6;
        }

        /* GENERAL SECTIONS */

        .section {
            padding: clamp(65px, 8vw, 90px) 0;
        }

        .section-white {
            background: var(--white);
        }

        .section-heading {
            max-width: 620px;
            margin-bottom: 38px;
        }

        .section-heading .eyebrow {
            margin-bottom: 15px;
        }

        .section-heading h2 {
            margin-bottom: 13px;
            font-size: clamp(29px, 4vw, 43px);
            line-height: 1.2;
            letter-spacing: -1.5px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 15px;
        }

        /* TEMPLATE CARDS */

        .template-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .template-card {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--white);
            transition: transform 0.25s ease,
                        box-shadow 0.25s ease,
                        border-color 0.25s ease;
        }

        .template-card:hover {
            transform: translateY(-5px);
            border-color: var(--sand);
            box-shadow: var(--shadow);
        }

        .template-art {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 215px;
            padding: 24px;
            background: #F0E4D6;
        }

        .template-card:nth-child(2) .template-art {
            background: #E6E7DB;
        }

        .template-card:nth-child(3) .template-art {
            background: #E8E0D7;
        }

        .mini-page {
            width: 100%;
            max-width: 260px;
            min-height: 160px;
            padding: 18px;
            border: 1px solid rgba(52, 44, 39, 0.08);
            border-radius: 5px;
            background: var(--white);
            box-shadow: 0 7px 18px rgba(52, 44, 39, 0.06);
        }

        .mini-line {
            width: 65%;
            height: 5px;
            margin-bottom: 8px;
            border-radius: 3px;
            background: #D8C9B9;
        }

        .mini-line.short {
            width: 35%;
        }

        .mini-line.long {
            width: 85%;
        }

        .mini-line.dark {
            width: 55%;
            height: 8px;
            margin-bottom: 12px;
            background: #8E7666;
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
            border-radius: 3px;
            background: #F0E4D6;
        }

        .mini-box.olive {
            background: #E4E5D8;
        }

        .template-info {
            padding: 24px;
        }

        .template-info h3 {
            margin-bottom: 8px;
            font-size: 20px;
            letter-spacing: -0.4px;
        }

        .template-info p {
            min-height: 68px;
            margin-bottom: 18px;
            color: var(--muted);
            font-size: 14px;
        }

        .template-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: var(--terracotta);
            font-size: 14px;
            font-weight: 800;
        }

        .template-link::after {
            content: "→";
            transition: transform 0.2s ease;
        }

        .template-link:hover {
            text-decoration: underline;
            text-underline-offset: 4px;
        }

        .template-link:hover::after {
            transform: translateX(4px);
        }

        .template-note {
            margin-top: 20px;
            color: var(--muted);
            font-size: 12px;
        }

        /* HOW IT WORKS */

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .step {
            padding: 28px;
            border: 1px solid var(--border);
            border-radius: 11px;
            background: rgba(255, 252, 248, 0.58);
            transition: transform 0.2s ease,
                        box-shadow 0.2s ease;
        }

        .step:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow);
        }

        .step-number {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            margin-bottom: 20px;
            border-radius: 50%;
            background: var(--sage);
            color: white;
            font-size: 14px;
            font-weight: 800;
        }

        .step h3 {
            margin-bottom: 9px;
            font-size: 18px;
        }

        .step p {
            color: var(--muted);
            font-size: 14px;
        }

        /* CALL TO ACTION */

        .cta-section {
            padding: 75px 0;
        }

        .cta-card {
            position: relative;
            overflow: hidden;
            padding: clamp(38px, 6vw, 65px) 25px;
            border: 1px solid #E0CBB5;
            border-radius: 14px;
            background: var(--oat);
            text-align: center;
        }

        .cta-card::before,
        .cta-card::after {
            content: "";
            position: absolute;
            width: 160px;
            height: 160px;
            border: 1px solid rgba(166, 93, 67, 0.15);
            border-radius: 50%;
            pointer-events: none;
        }

        .cta-card::before {
            top: -90px;
            left: -50px;
        }

        .cta-card::after {
            right: -50px;
            bottom: -100px;
        }

        .cta-card h2 {
            position: relative;
            z-index: 1;
            margin-bottom: 14px;
            font-size: clamp(29px, 4vw, 43px);
            line-height: 1.2;
            letter-spacing: -1.5px;
        }

        .cta-card p {
            position: relative;
            z-index: 1;
            max-width: 510px;
            margin: 0 auto 26px;
            color: var(--muted);
            font-size: 15px;
        }

        .cta-card .button {
            position: relative;
            z-index: 1;
        }

        /* FOOTER */

        .footer {
            border-top: 1px solid var(--border);
            padding: 28px 0;
            background: var(--ivory);
        }

        .footer-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
        }

        .footer-brand {
            font-size: 21px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .footer p {
            color: var(--muted);
            font-size: 12px;
        }

        /* TABLETS */

        @media (max-width: 900px) {
            .nav-content {
                gap: 18px;
            }

            .nav-links {
                gap: 18px;
            }

            .nav-links > a:not(.nav-cta) {
                font-size: 13px;
            }

            .nav-cta {
                padding: 9px 13px;
                font-size: 13px;
            }

            .hero {
                padding: 85px 0;
            }

            .template-grid,
            .steps-grid {
                gap: 18px;
            }

            .template-info {
                padding: 20px;
            }
        }

        /* MOBILE NAVIGATION AND LAYOUT */

        @media (max-width: 700px) {
            html {
                scroll-padding-top: 80px;
            }

            .nav-content {
                min-height: 70px;
                flex-wrap: wrap;
                gap: 12px;
                padding: 13px 0;
            }

            .logo {
                font-size: 25px;
            }

            .menu-toggle {
                display: inline-flex;
                margin-left: auto;
            }

            .nav-links {
                display: none;
                width: 100%;
                flex-direction: column;
                align-items: stretch;
                gap: 4px;
                padding: 10px 0 5px;
                border-top: 1px solid var(--border);
            }

            .nav-links.open {
                display: flex;
            }

            .nav-links > a:not(.nav-cta) {
                display: flex;
                align-items: center;
                min-height: 45px;
                padding: 9px 4px;
                font-size: 14px;
            }

            .nav-links > a:not(.nav-cta)::after {
                bottom: 2px;
                width: 75px;
            }

            .nav-links .nav-cta {
                justify-content: center;
                width: 100%;
                margin-top: 5px;
            }

            .nav-links .logout-form {
                display: flex;
                width: 100%;
            }

            .nav-links .logout-button {
                width: 100%;
            }

            .hero {
                padding: 65px 0 75px;
            }

            .hero::after {
                top: 20px;
                right: -240px;
                width: 300px;
                height: 300px;
            }

            .hero h1 {
                font-size: clamp(42px, 10vw, 62px);
                letter-spacing: -2px;
            }

            .welcome-message {
                margin-bottom: 25px;
            }

            .hero-description {
                font-size: 15px;
                line-height: 1.8;
            }

            .button-group {
                align-items: stretch;
            }

            .button-group .button {
                flex: 1 1 180px;
            }

            .section {
                padding: 58px 0;
            }

            .template-grid,
            .steps-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .template-art {
                min-height: 205px;
            }

            .template-info p {
                min-height: auto;
            }

            .step {
                padding: 24px;
            }

            .cta-section {
                padding: 55px 0;
            }

            .footer-content {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 380px) {
            .container {
                width: 91%;
            }

            .hero h1 {
                font-size: 40px;
            }

            .button-group {
                flex-direction: column;
            }

            .button-group .button {
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
                animation-duration: 0.01ms !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>

<body>
    <header class="navbar">
        <div class="container nav-content">
            <a href="{{ url('/') }}" class="logo" aria-label="PortCraft home">
                <span class="logo-port">port</span><span class="logo-craft">craft</span><span class="logo-dot">.</span>
            </a>

            <button
                class="menu-toggle"
                id="menuToggle"
                type="button"
                aria-expanded="false"
                aria-controls="navLinks"
            >
                <span aria-hidden="true">☰</span>
                <span>Menu</span>
            </button>

            <nav class="nav-links" id="navLinks" aria-label="Main navigation">
                <a href="{{ url('/') }}" class="active" aria-current="page">Home</a>
                <a href="#templates">Templates</a>
                <a href="#how-it-works">How it works</a>

                @auth
                    <a href="{{ url('/portfolios') }}">My Portfolios</a>

                    

<form action="{{ route('logout') }}" method="POST" class="logout-form" id="logoutForm">
    @csrf
    <button type="button" class="nav-cta logout-button" id="logoutTrigger">
        Log Out
    </button>
</form>

<div class="logout-modal" id="logoutModal" aria-hidden="true">
    <div class="logout-modal-backdrop" id="logoutBackdrop"></div>

    <div class="logout-modal-card"
         role="dialog"
         aria-modal="true"
         aria-labelledby="logoutModalTitle"
         aria-describedby="logoutModalMessage">

        <div class="logout-modal-icon" aria-hidden="true">↗</div>

        <span class="logout-modal-eyebrow">PORTCRAFT ACCOUNT</span>

        <h2 id="logoutModalTitle">Leaving so soon?</h2>

        <p id="logoutModalMessage">
            Are you sure you want to log out of PortCraft?
            You can always come back to continue building your portfolio.
        </p>

        <div class="logout-modal-actions">
            <button type="button" class="logout-cancel" id="logoutCancel">
                Stay logged in
            </button>

            <button type="button" class="logout-confirm" id="logoutConfirm">
                Yes, log out
            </button>
        </div>
    </div>
</div>

<style>
    .logout-modal {
        position: fixed;
        inset: 0;
        z-index: 99999;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        visibility: hidden;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.22s ease, visibility 0.22s ease;
    }

    .logout-modal.is-open {
        visibility: visible;
        opacity: 1;
        pointer-events: auto;
    }

    .logout-modal-backdrop {
        position: absolute;
        inset: 0;
        background: rgba(30, 27, 25, 0.52);
        backdrop-filter: blur(5px);
    }

    .logout-modal-card {
        position: relative;
        width: 100%;
        max-width: 420px;
        padding: 36px 30px 28px;
        border-radius: 24px;
        background: #fffaf4;
        color: #332b27;
        text-align: center;
        box-shadow: 0 24px 80px rgba(0, 0, 0, 0.22);
        transform: translateY(12px) scale(0.98);
        transition: transform 0.22s ease;
    }

    .logout-modal.is-open .logout-modal-card {
        transform: translateY(0) scale(1);
    }

    .logout-modal-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 58px;
        height: 58px;
        margin: 0 auto 18px;
        border-radius: 18px;
        background: #f0e2d4;
        color: #a65d43;
        font-size: 30px;
        font-weight: 700;
    }

    .logout-modal-eyebrow {
        display: block;
        margin-bottom: 10px;
        color: #a65d43;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 2px;
    }

    .logout-modal-card h2 {
        margin: 0 0 12px;
        color: #332b27;
        font-size: 27px;
        line-height: 1.2;
    }

    .logout-modal-card p {
        margin: 0 auto 26px;
        max-width: 320px;
        color: #766a62;
        font-size: 14px;
        line-height: 1.8;
    }

    .logout-modal-actions {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .logout-modal-actions button {
        width: 100%;
        min-height: 46px;
        padding: 12px 18px;
        border: none;
        border-radius: 12px;
        font: inherit;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        transition: transform 0.18s ease, background 0.18s ease;
    }

    .logout-modal-actions button:hover {
        transform: translateY(-1px);
    }

    .logout-cancel {
        background: #eee5dc;
        color: #51443b;
    }

    .logout-cancel:hover {
        background: #e5d7ca;
    }

    .logout-confirm {
        background: #a65d43;
        color: #fffaf4;
    }

    .logout-confirm:hover {
        background: #8e4b35;
    }

    .logout-modal-actions button:focus-visible {
        outline: 3px solid #d8b99c;
        outline-offset: 3px;
    }

    @media (min-width: 420px) {
        .logout-modal-actions {
            flex-direction: row;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .logout-modal,
        .logout-modal-card,
        .logout-modal-actions button {
            transition: none;
        }
    }
</style>

<script>
    (() => {
        const form = document.getElementById('logoutForm');
        const trigger = document.getElementById('logoutTrigger');
        const modal = document.getElementById('logoutModal');
        const cancel = document.getElementById('logoutCancel');
        const confirm = document.getElementById('logoutConfirm');
        const backdrop = document.getElementById('logoutBackdrop');

        if (!form || !trigger || !modal || !cancel || !confirm || !backdrop) {
            return;
        }

        let previousFocus = null;

        function openModal() {
            previousFocus = document.activeElement;
            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
            cancel.focus();
        }

        function closeModal() {
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';

            if (previousFocus) {
                previousFocus.focus();
            }
        }

        trigger.addEventListener('click', openModal);
        cancel.addEventListener('click', closeModal);
        backdrop.addEventListener('click', closeModal);

        confirm.addEventListener('click', () => {
            confirm.disabled = true;
            confirm.textContent = 'Logging out...';
            form.submit();
        });

        document.addEventListener('keydown', (event) => {
            if (!modal.classList.contains('is-open')) {
                return;
            }

            if (event.key === 'Escape') {
                closeModal();
            }
        });
    })();
</script>

</form>

                @else
                    <a href="{{ route('login') }}">Log In</a>

                    <a href="{{ route('register') }}" class="nav-cta">
                        Create Account
                    </a>
                @endauth
            </nav>
        </div>
    </header>

    <main>
        <section class="hero" id="home">
            <div class="container">
                <div class="hero-content">
                    @auth
                        <div class="welcome-message">
                            <h2>Hi, {{ Auth::user()->name }}!</h2>
                            <p>Welcome to your PortCraft workspace.</p>
                        </div>
                    @endauth

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
                            Create your portfolio <span aria-hidden="true">↗</span>
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
                        Create your portfolio <span aria-hidden="true">↗</span>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer-content">
            <a href="{{ url('/') }}" class="footer-brand" aria-label="PortCraft home">
                <span class="logo-port">port</span><span class="logo-craft">craft</span><span class="logo-dot">.</span>
            </a>
            <p>Made to showcase the work that matters to you.</p>
        </div>
    </footer>

    <script>
        const menuToggle = document.getElementById('menuToggle');
        const navLinks = document.getElementById('navLinks');

        menuToggle.addEventListener('click', function () {
            const isOpen = navLinks.classList.toggle('open');
            menuToggle.setAttribute('aria-expanded', String(isOpen));
        });

        // Close the mobile menu after selecting a link.
        navLinks.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                navLinks.classList.remove('open');
                menuToggle.setAttribute('aria-expanded', 'false');
            });
        });

        // Highlight the current homepage section while scrolling.
        const sectionLinks = navLinks.querySelectorAll(
            'a[href="#templates"], a[href="#how-it-works"]'
        );

        const observedSections = document.querySelectorAll(
            '#templates, #how-it-works'
        );

        if ('IntersectionObserver' in window) {
            const sectionObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (!entry.isIntersecting) return;

                    sectionLinks.forEach(function (link) {
                        const isCurrent = link.getAttribute('href') ===
                            '#' + entry.target.id;

                        link.classList.toggle('active', isCurrent);

                        if (isCurrent) {
                            link.setAttribute('aria-current', 'location');
                        } else {
                            link.removeAttribute('aria-current');
                        }
                    });
                });
            }, {
                rootMargin: '-20% 0px -65% 0px',
                threshold: 0
            });

            observedSections.forEach(function (section) {
                sectionObserver.observe(section);
            });
        }
    </script>
</body>
</html>
