
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $portfolio->full_name }} - Portfolio</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            color: #1f2937;
            line-height: 1.6;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
        }

        .portfolio {
            background: white;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .header {
            text-align: center;
            padding-bottom: 25px;
            border-bottom: 2px solid #e5e7eb;
        }

        .profile-picture {
            width: 140px;
            height: 140px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #6366f1;
            margin-bottom: 15px;
        }

        h1 {
            color: #4338ca;
            margin: 10px 0;
            overflow-wrap: anywhere;
        }

        h2 {
            color: #4338ca;
            font-size: 20px;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 8px;
            margin-top: 28px;
        }

        .section-content {
            white-space: pre-wrap;
            overflow-wrap: anywhere;
        }

        .contact {
            color: #6b7280;
            overflow-wrap: anywhere;
        }

        a {
            color: #4f46e5;
            overflow-wrap: anywhere;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
            margin-top: 30px;
        }

        .button {
            display: inline-block;
            padding: 12px 20px;
            background: #4f46e5;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            border: none;
            font-size: 15px;
            cursor: pointer;
        }

        .button:hover {
            background: #3730a3;
        }

        .secondary {
            background: #4b5563;
        }

        .secondary:hover {
            background: #374151;
        }

        @media (max-width: 600px) {
            .container {
                margin: 15px auto;
                padding: 10px;
            }

            .portfolio {
                padding: 22px;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <div class="portfolio">

            <div class="header">
                @if ($portfolio->profile_picture)
                    <img
                        class="profile-picture"
                        src="/storage/{{ $portfolio->profile_picture }}"
                        alt="Profile picture"
                    >
                @endif

                <h1>{{ $portfolio->full_name }}</h1>

                @if ($portfolio->about)
                    <p>{{ $portfolio->about }}</p>
                @endif

                <div class="contact">
                    @if ($portfolio->email)
                        <div>
                            <strong>Email:</strong>
                            <a href="mailto:{{ $portfolio->email }}">
                                {{ $portfolio->email }}
                            </a>
                        </div>
                    @endif

                    @if ($portfolio->contact_number)
                        <div>
                            <strong>Contact:</strong>
                            {{ $portfolio->contact_number }}
                        </div>
                    @endif

                    @if ($portfolio->address)
                        <div>
                            <strong>Address:</strong>
                            {{ $portfolio->address }}
                        </div>
                    @endif

                    @if ($portfolio->website)
                        <div>
                            <strong>Website:</strong>
                            <a href="{{ $portfolio->website }}" target="_blank" rel="noopener noreferrer">
                                {{ $portfolio->website }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            @if ($portfolio->education)
                <section>
                    <h2>Education</h2>
                    <div class="section-content">{{ $portfolio->education }}</div>
                </section>
            @endif

            @if ($portfolio->skills)
                <section>
                    <h2>Skills</h2>
                    <div class="section-content">{{ $portfolio->skills }}</div>
                </section>
            @endif

            @if ($portfolio->projects)
                <section>
                    <h2>Projects</h2>
                    <div class="section-content">{{ $portfolio->projects }}</div>
                </section>
            @endif

            @if ($portfolio->experience)
                <section>
                    <h2>Experience</h2>
                    <div class="section-content">{{ $portfolio->experience }}</div>
                </section>
            @endif

            @if ($portfolio->social_links)
                <section>
                    <h2>Social Links</h2>
                    <div class="section-content">{{ $portfolio->social_links }}</div>
                </section>
            @endif

            <div class="actions">
                <a
                    class="button"
                    href="/portfolio/{{ $portfolio->id }}/edit"
                >
                    Edit Portfolio
                </a>

                <a
                    class="button secondary"
                    href="/portfolio/create"
                >
                    Create Another Portfolio
                </a>

                <a
                    class="button secondary"
                    href="/"
                >
                    Home
                </a>
            </div>

        </div>
    </div>
</body>
</html>
