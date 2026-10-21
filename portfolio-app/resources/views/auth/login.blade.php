
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In | portcraft.</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, Helvetica, sans-serif; background: #f8f3ec; color: #392d26; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 35px 20px; }
        .auth-container { width: 100%; max-width: 440px; margin: auto; }
        .brand { display: block; text-align: center; font-size: 28px; font-weight: 700; letter-spacing: -1px; margin-bottom: 42px; color: #392d26; text-decoration: none; }
        .brand .logo-port { color: #392d26; }
        .brand .logo-craft { color: #b26043; }
        .brand .logo-dot { color: #392d26; }
        .auth-card { width: 100%; background: #fffdf9; padding: 38px 36px; border: 1px solid #e4d8ca; border-radius: 14px; box-shadow: 0 8px 30px rgba(57, 45, 38, 0.04); }
        h1 { text-align: center; font-size: 34px; font-weight: 700; margin-bottom: 12px; letter-spacing: -0.8px; }
        .subtitle { text-align: center; color: #8c7c70; font-size: 16px; margin-bottom: 35px; line-height: 1.5; }
        .form-group { margin-bottom: 24px; }
        label { display: block; font-size: 15px; font-weight: 700; color: #79695d; margin-bottom: 10px; }
        input { display: block; width: 100%; min-height: 52px; padding: 14px 15px; border: 1px solid #e1d7cd; border-radius: 9px; background: #fffefa; color: #392d26; font-size: 15px; outline: none; transition: border-color 0.2s, box-shadow 0.2s; }
        input::placeholder { color: #b1a297; }
        input:focus { border-color: #b26043; box-shadow: 0 0 0 3px rgba(178, 96, 67, 0.12); }
        .error { color: #b42318; font-size: 13px; margin-top: 7px; line-height: 1.5; }
        .alert { padding: 12px 14px; margin-bottom: 20px; border: 1px solid #f1c7bd; border-radius: 8px; background: #fff0ed; color: #9d3024; font-size: 14px; line-height: 1.5; }
        .success { padding: 12px 14px; margin-bottom: 20px; border: 1px solid #cfe3d1; border-radius: 8px; background: #edf7ee; color: #246b36; font-size: 14px; line-height: 1.5; }
        .submit-btn { display: block; width: 100%; min-height: 54px; padding: 14px; border: none; border-radius: 9px; background: #b26043; color: #fff; font-size: 17px; font-weight: 700; cursor: pointer; transition: background 0.2s; }
        .submit-btn:hover { background: #994c33; }
        .auth-footer { text-align: center; color: #8c7c70; font-size: 15px; margin-top: 30px; line-height: 1.7; }
        .auth-footer a { color: #b26043; font-weight: 700; text-decoration: none; }
        .auth-footer a:hover { text-decoration: underline; }
        @media (max-width: 480px) { body { padding: 25px 16px; } .brand { margin-bottom: 32px; } .auth-card { padding: 30px 22px; } h1 { font-size: 30px; } }
    </style>
</head>
<body>
    <main class="auth-container">
        <a href="{{ url('/') }}" class="brand" aria-label="portcraft."><span class="logo-port">port</span><span class="logo-craft">craft</span><span class="logo-dot">.</span></a>

        <section class="auth-card">
            <h1>Log In</h1>
            <p class="subtitle">Log in to your account.</p>

            @if (session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif

            @if (session('status'))
                <div class="success">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert">Please check your information and try again.</div>
            @endif

            <form action="{{ route('login.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" autocomplete="email" required autofocus>
                    @error('email') <p class="error">{{ $message }}</p> @enderror
                </div>
<label for="password">Password</label>

                
<div class="password-wrapper">
    <input
        type="password"
        id="password"
        name="password"
        placeholder="Enter your password"
        autocomplete="current-password"
        required
    >

    <button
        type="button"
        class="toggle-password"
        id="togglePassword"
        aria-label="Show password"
        aria-pressed="false"
    >
        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg"
             width="21" height="21" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2"
             stroke-linecap="round" stroke-linejoin="round"
             aria-hidden="true">
            <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/>
            <circle cx="12" cy="12" r="3"/>
        </svg>
    </button>
</div>

<style>
    /* Add space below the password field */
.password-wrapper {
    margin-bottom: 18px;
}

/* Keep a little space above the Log In button */
.login-button {
    margin-top: 6px;
}
    .password-wrapper {
        position: relative;
        width: 100%;
    }

    .password-wrapper input {
        width: 100%;
        box-sizing: border-box;
        padding-right: 48px;
    }

    .toggle-password {
        position: absolute;
        top: 50%;
        right: 12px;
        transform: translateY(-50%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 6px;
        border: none;
        background: transparent;
        color: #8b7468;
        cursor: pointer;
        border-radius: 6px;
    }

    .toggle-password:hover {
        color: #a65d43;
    }

    .toggle-password:focus-visible {
        outline: 2px solid #a65d43;
        outline-offset: 2px;
    }
</style>

<script>
    (() => {
        const password = document.getElementById('password');
        const toggle = document.getElementById('togglePassword');
        const icon = document.getElementById('eyeIcon');

        if (!password || !toggle || !icon) return;

        const eye = `
            <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/>
            <circle cx="12" cy="12" r="3"/>
        `;

        const eyeOff = `
            <path d="M3 3l18 18"/>
            <path d="M10.6 10.6a2 2 0 002.8 2.8"/>
            <path d="M9.9 5.2A11 11 0 0112 5c6.4 0 10 7 10 7a15 15 0 01-3 3.8"/>
            <path d="M6.6 6.6C3.6 8.5 2 12 2 12s3.6 7 10 7a10 10 0 003.4-.6"/>
        `;

        toggle.addEventListener('click', () => {
            const showing = password.type === 'password';

            password.type = showing ? 'text' : 'password';
            toggle.setAttribute('aria-label', showing ? 'Hide password' : 'Show password');
            toggle.setAttribute('aria-pressed', String(showing));
            icon.innerHTML = showing ? eyeOff : eye;
        });
    })();
</script>


                <button type="submit" class="submit-btn">Log In</button>
            </form>

            <div class="auth-footer">Don't have an account? <a href="{{ route('register') }}">Register.</a></div>
        </section>
    </main>
</body>
</html>
