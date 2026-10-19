
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

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="current-password" required>
                    @error('password') <p class="error">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="submit-btn">Log In</button>
            </form>

            <div class="auth-footer">Don't have an account? <a href="{{ route('register') }}">Register.</a></div>
        </section>
    </main>
</body>
</html>
