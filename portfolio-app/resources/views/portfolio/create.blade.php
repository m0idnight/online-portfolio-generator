
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose a Template | portcraft</title>

    <!-- Font Awesome Icons -->
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

        body {
            margin: 0;
            padding: 28px 16px 60px;
            font-family: Arial, Helvetica, sans-serif;
            color: var(--espresso);
            background: var(--ivory);
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            width: min(1000px, 100%);
            margin: 0 auto;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 38px;
        }

        .brand {
            font-size: 25px;
            font-weight: 700;
            letter-spacing: -1px;
            color: var(--espresso);
        }

        .brand span {
            color: var(--terracotta);
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--terracotta);
            font-size: 14px;
            font-weight: 700;
            transition: color .2s ease;
        }

        .back-link i {
            font-size: 14px;
        }

        .back-link:hover {
            color: #8F4D37;
            text-decoration: underline;
        }

        .heading {
            margin-bottom: 30px;
        }

        .eyebrow {
            color: var(--sage);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        h1 {
            margin: 8px 0 12px;
            font-size: clamp(30px, 5vw, 44px);
            line-height: 1.2;
            letter-spacing: -1.5px;
        }

        .intro {
            max-width: 650px;
            margin: 0;
            color: var(--muted);
            font-size: 15px;
        }

        .template-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .template-card {
            display: flex;
            flex-direction: column;
            overflow: hidden;
            border: 1px solid var(--oat);
            border-radius: 12px;
            background: var(--white);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .template-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 28px rgba(52, 44, 39, .09);
        }

        .preview {
            min-height: 215px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .preview.minimalist {
            background: #F0E4D6;
        }

        .preview.creative {
            background: #E6E7DB;
        }

        .preview.developer {
            background: #E8E0D7;
        }

        .mock-page {
            width: 100%;
            max-width: 255px;
            min-height: 165px;
            padding: 17px;
            background: var(--white);
            border: 1px solid rgba(52, 44, 39, .1);
            border-radius: 4px;
            box-shadow: 0 5px 12px rgba(52, 44, 39, .06);
        }

        .mock-brand {
            margin-bottom: 15px;
            font-size: 9px;
            font-weight: 700;
        }

        .mock-title {
            width: 75%;
            height: 11px;
            margin-bottom: 9px;
            border-radius: 3px;
            background: #8E7666;
        }

        .mock-line {
            width: 90%;
            height: 5px;
            margin-bottom: 7px;
            border-radius: 3px;
            background: #D8C9B9;
        }

        .mock-line.short {
            width: 55%;
        }

        .mock-blocks {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
            margin-top: 15px;
        }

        .mock-block {
            height: 44px;
            border-radius: 3px;
            background: #F0E4D6;
        }

        .creative .mock-title {
            width: 85%;
            height: 15px;
            background: var(--sage);
        }

        .creative .mock-block:first-child {
            background: #D8B99C;
        }

        .creative .mock-block:last-child {
            background: #E4E5D8;
        }

        .developer .mock-page {
            background: #342C27;
        }

        .developer .mock-brand {
            color: #D8B99C;
        }

        .developer .mock-title {
            background: #A0A68A;
        }

        .developer .mock-line {
            background: #776B60;
        }

        .developer .mock-block {
            background: #51463D;
        }

        .template-info {
            display: flex;
            flex: 1;
            flex-direction: column;
            padding: 22px;
        }

        .template-info h2 {
            margin: 0 0 7px;
            font-size: 20px;
        }

        .template-info p {
            flex: 1;
            margin: 0 0 18px;
            color: var(--muted);
            font-size: 14px;
        }

        .template-button,
        .submit-button {
            display: block;
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--terracotta);
            border-radius: 7px;
            background: var(--terracotta);
            color: white;
            text-align: center;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            font-family: inherit;
        }

        .template-button:hover,
        .submit-button:hover {
            background: #8F4D37;
        }

        .secondary-button {
            display: inline-block;
            padding: 11px 17px;
            border: 1px solid var(--sand);
            border-radius: 7px;
            background: transparent;
            color: var(--espresso);
            font-size: 13px;
            font-weight: 700;
            text-align: center;
            cursor: pointer;
            font-family: inherit;
        }

        .secondary-button:hover {
            background: var(--oat);
        }

        .form-card {
            padding: clamp(20px, 4vw, 38px);
            border: 1px solid var(--oat);
            border-radius: 12px;
            background: var(--white);
        }

        .selected-template {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 30px;
            padding: 16px;
            border: 1px solid var(--oat);
            border-radius: 8px;
            background: var(--ivory);
        }

        .selected-template strong {
            display: block;
            margin-bottom: 3px;
        }

        .selected-template p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
        }

        .step-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin: 26px auto 34px;
            max-width: 560px;
        }

        .step-item {
            display: flex;
            align-items: center;
            gap: 9px;
            color: var(--muted);
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .step-item span {
            display: grid;
            place-items: center;
            width: 32px;
            height: 32px;
            border: 1px solid var(--sand);
            border-radius: 50%;
            background: var(--white);
            color: var(--espresso);
        }

        .step-item.active { color: var(--terracotta); }
        .step-item.active span,
        .step-item.completed span {
            border-color: var(--terracotta);
            background: var(--terracotta);
            color: white;
        }

        .step-connector {
            height: 1px;
            min-width: 22px;
            flex: 1;
            background: var(--sand);
        }

        .step-connector.completed { background: var(--terracotta); }

        .review-panel[hidden],
        .step-two-actions[hidden],
        .form-grid[hidden],
        .selected-template[hidden] { display: none !important; }

        .review-panel {
            padding: 22px;
            border: 1px solid var(--oat);
            border-radius: 10px;
            background: var(--ivory);
        }

        .review-panel h2 { margin: 0 0 8px; font-size: 22px; }
        .review-panel > p { color: var(--muted); margin: 0 0 20px; font-size: 14px; }
        .review-list { display: grid; gap: 0; margin: 0; }
        .review-row { display: flex; justify-content: space-between; gap: 16px; padding: 11px 0; border-bottom: 1px solid var(--oat); }
        .review-row:last-child { border-bottom: 0; }
        .review-row dt { color: var(--muted); font-size: 13px; }
        .review-row dd { margin: 0; text-align: right; overflow-wrap: anywhere; font-size: 13px; font-weight: 700; }
        .review-note { margin-top: 16px !important; font-size: 12px !important; }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .field {
            min-width: 0;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 700;
        }

        .optional {
            color: var(--muted);
            font-weight: 400;
        }

        input,
        textarea {
            display: block;
            width: 100%;
            min-height: 46px;
            padding: 12px 13px;
            border: 1px solid var(--oat);
            border-radius: 7px;
            outline: none;
            background: #FFFFFF;
            color: var(--espresso);
            font: inherit;
            font-size: 13px;
        }

        textarea {
            min-height: 115px;
            resize: vertical;
        }

        input[type="file"] {
            padding: 9px;
        }

        input:focus,
        textarea:focus {
            border-color: var(--terracotta);
            box-shadow: 0 0 0 3px rgba(166, 93, 67, .1);
        }

        input::placeholder,
        textarea::placeholder {
            color: #95877D;
        }

        .hint {
            margin-top: 6px;
            color: var(--muted);
            font-size: 11px;
        }

        .field-error {
            margin: 7px 0 0;
            color: var(--danger);
            font-size: 12px;
            font-weight: 700;
        }

        .field-error[hidden] {
            display: none;
        }

        .errors {
            margin-bottom: 25px;
            padding: 16px 20px;
            border: 1px solid #D9A39A;
            border-radius: 8px;
            background: #FFF0ED;
            color: var(--danger);
            font-size: 13px;
        }

        .errors ul {
            margin-bottom: 0;
            padding-left: 20px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
        }

        .submit-button {
            width: auto;
            min-height: 46px;
            padding: 12px 20px;
        }

        .form-preview-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            gap: 22px;
            align-items: start;
        }

        .form-preview-layout > * {
            min-width: 0;
        }

        .live-preview-card {
            overflow: hidden;
            border: 1px solid var(--oat);
            border-radius: 12px;
            background: var(--white);
        }

        .live-preview-heading {
            padding: 16px 18px;
            border-bottom: 1px solid var(--oat);
        }

        .live-preview-heading strong {
            display: block;
            margin-bottom: 3px;
        }

        .live-preview-frame {
            display: block;
            width: 100%;
            height: 780px;
            border: 0;
            background: white;
        }

        .preview-status {
            margin: 0;
            padding: 10px 16px;
            color: var(--muted);
            font-size: 11px;
        }

        @media (max-width: 1000px) {
            .form-preview-layout {
                grid-template-columns: 1fr;
            }

            .live-preview-frame {
                height: 700px;
            }
        }

        @media (max-width: 800px) {
            .template-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 560px) {
            body {
                padding-top: 20px;
            }

            .navbar {
                margin-bottom: 30px;
            }

            .template-grid,
            .form-grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: auto;
            }

            .actions {
                flex-direction: column;
            }

            .actions a,
            .actions button {
                width: 100%;
            }

            .selected-template {
                align-items: flex-start;
                flex-direction: column;
            }

            .live-preview-frame {
                height: 600px;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <nav class="navbar">
        <a href="{{ url('/') }}" class="brand">
            port<span>craft</span>
        </a>

        <!-- Home navigation with icon -->
        <a href="{{ url('/') }}" class="back-link">
            <i class="fa-solid fa-house" aria-hidden="true"></i>
            Home
        </a>
    </nav>

    @if (empty($selectedTemplate))

        <main>
            <div class="heading">
                <p class="eyebrow">Step 1 of 3</p>
                <h1>Choose your template</h1>
                <p class="intro">
                    Start with a design that feels right for you.
                    Choose a template to continue to your portfolio form.
                </p>
            </div>

            <div class="template-grid">

                <article class="template-card">
                    <div class="preview minimalist">
                        <div class="mock-page">
                            <div class="mock-brand">YOUR NAME</div>
                            <div class="mock-title"></div>
                            <div class="mock-line"></div>
                            <div class="mock-line short"></div>
                            <div class="mock-blocks">
                                <div class="mock-block"></div>
                                <div class="mock-block"></div>
                            </div>
                        </div>
                    </div>

                    <div class="template-info">
                        <h2>Minimalist</h2>
                        <p>
                            Clean and elegant, with a simple layout
                            that keeps attention on your information.
                        </p>
                        <a
                            class="template-button"
                            href="{{ url('/portfolio/create') }}?template=minimalist"
                        >
                            Choose Minimalist
                        </a>
                    </div>
                </article>

                <article class="template-card">
                    <div class="preview creative">
                        <div class="mock-page creative">
                            <div class="mock-brand">YOUR NAME</div>
                            <div class="mock-title"></div>
                            <div class="mock-line"></div>
                            <div class="mock-line short"></div>
                            <div class="mock-blocks">
                                <div class="mock-block"></div>
                                <div class="mock-block"></div>
                            </div>
                        </div>
                    </div>

                    <div class="template-info">
                        <h2>Creative</h2>
                        <p>
                            A more expressive presentation for your
                            ideas, interests, and creative projects.
                        </p>
                        <a
                            class="template-button"
                            href="{{ url('/portfolio/create') }}?template=creative"
                        >
                            Choose Creative
                        </a>
                    </div>
                </article>

                <article class="template-card">
                    <div class="preview developer">
                        <div class="mock-page developer">
                            <div class="mock-brand">YOUR NAME</div>
                            <div class="mock-title"></div>
                            <div class="mock-line"></div>
                            <div class="mock-line short"></div>
                            <div class="mock-blocks">
                                <div class="mock-block"></div>
                                <div class="mock-block"></div>
                            </div>
                        </div>
                    </div>

                    <div class="template-info">
                        <h2>Developer</h2>
                        <p>
                            A technical, code-inspired style for
                            showcasing development skills and projects.
                        </p>
                        <a
                            class="template-button"
                            href="{{ url('/portfolio/create') }}?template=developer"
                        >
                            Choose Developer
                        </a>
                    </div>
                </article>

            </div>
        </main>

    @else

        <main>
            <div class="heading">
                <p class="eyebrow">Step 2 of 3</p>
                <h1>Create your portfolio</h1>
                <p class="intro" id="creationIntro">
                    Fill in your information below to see your portfolio update
                    as you type. Your selected profile picture will also appear
                    in the preview before you submit.
                </p>
                <div class="step-indicator" aria-label="Portfolio creation progress">
                    <div class="step-item completed"><span>1</span><small>Template</small></div>
                    <div class="step-connector completed"></div>
                    <div class="step-item active" id="stepTwoIndicator"><span>2</span><small>Details</small></div>
                    <div class="step-connector" id="stepThreeConnector"></div>
                    <div class="step-item" id="stepThreeIndicator"><span>3</span><small>Review</small></div>
                </div>
            </div>

            @if ($errors->any())
                <div class="errors">
                    <strong>Please check the following fields:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-preview-layout">

                <section class="form-card">

                    <div class="selected-template">
                        <div>
                            <strong>
                                Selected template: {{ ucfirst($selectedTemplate) }}
                            </strong>
                            <p>Your portfolio will use this design.</p>
                        </div>

                        <a
                            href="{{ url('/portfolio/create') }}"
                            class="secondary-button"
                        >
                            Change template
                        </a>
                    </div>

                    <form
                        id="portfolioForm"
                        action="{{ url('/portfolio') }}"
                        method="POST"
                        enctype="multipart/form-data"
                        novalidate
                    >
                        @csrf

                        <input
                            type="hidden"
                            name="template"
                            value="{{ $selectedTemplate }}"
                        >

                        <div class="form-grid">

                            <div class="field">
                                <label for="full_name">Full name *</label>
                                <input
                                    id="full_name"
                                    type="text"
                                    name="full_name"
                                    value="{{ old('full_name') }}"
                                    placeholder="Enter your full name"
                                    maxlength="255"
                                    aria-describedby="full_name_error"
                                    autocomplete="name"
                                    required
                                >
                                <p id="full_name_error" class="field-error" role="alert" hidden>
                                    Numbers are not allowed in your full name. Please use letters, spaces, apostrophes, periods, or hyphens only.
                                </p>
                            </div>

                            <div class="field">
                                <label for="email">Email address *</label>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="you@example.com"
                                    maxlength="255"
                                    required
                                >
                            </div>

                            <div class="field full-width">
                                <label for="profile_picture">
                                    Profile picture
                                    <span class="optional">(optional)</span>
                                </label>
                                <input
                                    id="profile_picture"
                                    type="file"
                                    name="profile_picture"
                                    accept="image/*"
                                >
                                <p class="hint">Maximum file size: 2 MB.</p>
                            </div>

                            <div class="field">
                                <label for="contact_number">
                                    Contact number
                                    <span class="optional">(optional)</span>
                                </label>
                                <input
                                    id="contact_number"
                                    type="text"
                                    name="contact_number"
                                    value="{{ old('contact_number') }}"
                                    placeholder="Your contact number"
                                    maxlength="50"
                                >
                            </div>

                            <div class="field">
                                <label for="address">
                                    Address
                                    <span class="optional">(optional)</span>
                                </label>
                                <input
                                    id="address"
                                    type="text"
                                    name="address"
                                    value="{{ old('address') }}"
                                    placeholder="City or general location"
                                >
                            </div>

                            <div class="field full-width">
                                <label for="about">
                                    About me
                                    <span class="optional">(optional)</span>
                                </label>
                                <textarea
                                    id="about"
                                    name="about"
                                    placeholder="Write a short introduction about yourself..."
                                >{{ old('about') }}</textarea>
                            </div>

                            <div class="field full-width">
                                <label for="education">
                                    Education
                                    <span class="optional">(optional)</span>
                                </label>
                                <textarea
                                    id="education"
                                    name="education"
                                    placeholder="Your school, course, and educational background..."
                                >{{ old('education') }}</textarea>
                            </div>

                            <div class="field full-width">
                                <label for="skills">
                                    Skills
                                    <span class="optional">(optional)</span>
                                </label>
                                <textarea
                                    id="skills"
                                    name="skills"
                                    placeholder="HTML, CSS, PHP, Laravel, teamwork..."
                                >{{ old('skills') }}</textarea>
                                <p class="hint">
                                    Separate skills with commas or new lines.
                                </p>
                            </div>

                            <div class="field full-width">
                                <label for="projects">
                                    Projects
                                    <span class="optional">(optional)</span>
                                </label>
                                <textarea
                                    id="projects"
                                    name="projects"
                                    placeholder="Describe your projects and contributions..."
                                >{{ old('projects') }}</textarea>
                            </div>

                            <div class="field full-width">
                                <label for="experience">
                                    Experience
                                    <span class="optional">(optional)</span>
                                </label>
                                <textarea
                                    id="experience"
                                    name="experience"
                                    placeholder="Work experience, internships, or relevant activities..."
                                >{{ old('experience') }}</textarea>
                            </div>

                            <div class="field">
                                <label for="website">
                                    Website
                                    <span class="optional">(optional)</span>
                                </label>
                                <input
                                    id="website"
                                    type="url"
                                    name="website"
                                    value="{{ old('website') }}"
                                    placeholder="https://example.com"
                                    maxlength="255"
                                >
                            </div>

                            <div class="field">
                                <label for="social_links">
                                    Social links
                                    <span class="optional">(optional)</span>
                                </label>
                                <input
                                    id="social_links"
                                    type="text"
                                    name="social_links"
                                    value="{{ old('social_links') }}"
                                    placeholder="GitHub, LinkedIn, etc."
                                >
                            </div>

                        </div>

                        <div class="actions step-two-actions" id="stepTwoActions">
                            <button type="button" class="submit-button" id="reviewPortfolioButton">
                                Review and finalize
                            </button>

                            <a href="{{ url('/portfolios') }}" class="secondary-button">Cancel</a>
                        </div>

                        <section class="review-panel" id="reviewPanel" hidden aria-labelledby="reviewTitle">
                            <h2 id="reviewTitle">Step 3: Review and finalize</h2>
                            <p>Check your details and review the live preview on the right. When everything looks right, create and save your portfolio.</p>
                            <dl class="review-list">
                                <div class="review-row"><dt>Full name</dt><dd id="reviewFullName">—</dd></div>
                                <div class="review-row"><dt>Email</dt><dd id="reviewEmail">—</dd></div>
                                <div class="review-row"><dt>Template</dt><dd>{{ ucfirst($selectedTemplate) }}</dd></div>
                                <div class="review-row"><dt>Profile picture</dt><dd id="reviewPicture">No picture selected</dd></div>
                            </dl>
                            <p class="review-note">Your portfolio is not saved until you press “Create and save portfolio”.</p>
                            <div class="actions">
                                <button type="button" class="secondary-button" id="backToDetailsButton">Back to edit details</button>
                                <button type="submit" class="submit-button" id="finalSaveButton">Create and save portfolio</button>
                            </div>
                        </section>
                    </form>

                </section>

                <aside class="live-preview-card">
                    <div class="live-preview-heading">
                        <strong>Portfolio preview</strong>
                    </div>

                    <iframe
                        id="portfolioPreview"
                        class="live-preview-frame"
                        title="Portfolio template preview"
                        src="{{ route('portfolio.preview', ['template' => $selectedTemplate]) }}"
                    ></iframe>

                    <p class="preview-status" id="previewStatus" aria-live="polite">
                        Live preview is updating as you edit. Your changes are saved
                        only when you select “Create my portfolio”.
                    </p>
                </aside>

            </div>
        </main>

    @endif

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const preview = document.getElementById('portfolioPreview');

    if (!preview) {
        return;
    }

    const form = document.getElementById('portfolioForm');
    const nameInput = document.getElementById('full_name');
    const nameError = document.getElementById('full_name_error');
    const pictureInput = document.getElementById('profile_picture');
    const previewStatus = document.getElementById('previewStatus');
    const namePattern = /^[\p{L}\p{M} .’'-]+$/u;
    const headingEyebrow = document.querySelector('.heading .eyebrow');
    const headingTitle = document.querySelector('.heading h1');
    const creationIntro = document.getElementById('creationIntro');
    const stepIndicator = document.querySelector('.step-indicator');
    const stepTwoIndicator = document.getElementById('stepTwoIndicator');
    const stepThreeIndicator = document.getElementById('stepThreeIndicator');
    const stepThreeConnector = document.getElementById('stepThreeConnector');
    const formGrid = form ? form.querySelector('.form-grid') : null;
    const selectedTemplate = document.querySelector('.selected-template');
    const stepTwoActions = document.getElementById('stepTwoActions');
    const reviewPanel = document.getElementById('reviewPanel');
    const reviewButton = document.getElementById('reviewPortfolioButton');
    const backButton = document.getElementById('backToDetailsButton');
    const reviewFullName = document.getElementById('reviewFullName');
    const reviewEmail = document.getElementById('reviewEmail');
    const reviewPicture = document.getElementById('reviewPicture');
    let currentStage = 2;

    let previewTimer = null;
    let picturePreviewUrl = null;
    let pictureTooLarge = false;

    function validateFullName() {
        if (!nameInput || !nameError) {
            return true;
        }

        const value = nameInput.value.trim();
        const invalid = value.length > 0 && !namePattern.test(value);
        const message = 'Numbers are not allowed in your full name. Please use letters, spaces, apostrophes, periods, or hyphens only.';

        nameInput.setCustomValidity(invalid ? message : '');
        nameInput.setAttribute('aria-invalid', invalid ? 'true' : 'false');
        nameError.hidden = !invalid;

        return !invalid;
    }

    // Block numeric characters as they are typed and sanitize pasted/input text.
    if (nameInput) {
        nameInput.addEventListener('keydown', function (event) {
            if (/^[0-9]$/.test(event.key)) {
                event.preventDefault();
            }
        });

        nameInput.addEventListener('beforeinput', function (event) {
            if (typeof event.data === 'string' && /[0-9]/.test(event.data)) {
                event.preventDefault();
            }
        });

        nameInput.addEventListener('input', function () {
            const originalValue = nameInput.value;
            const cleanedValue = originalValue.replace(/[^\p{L}\p{M} .’'-]/gu, '');

            if (cleanedValue !== originalValue) {
                const cursorPosition = nameInput.selectionStart;
                const removedBeforeCursor = originalValue.slice(0, cursorPosition).length
                    - originalValue.slice(0, cursorPosition).replace(/[^\p{L}\p{M} .’'-]/gu, '').length;

                nameInput.value = cleanedValue;

                const newCursorPosition = Math.max(0, cursorPosition - removedBeforeCursor);
                nameInput.setSelectionRange(newCursorPosition, newCursorPosition);
            }
        });
    }

    function setCreationStage(stage) {
        currentStage = stage;
        const isReview = stage === 3;
        if (formGrid) formGrid.hidden = isReview;
        if (selectedTemplate) selectedTemplate.hidden = isReview;
        if (stepTwoActions) stepTwoActions.hidden = isReview;
        if (reviewPanel) reviewPanel.hidden = !isReview;
        if (headingEyebrow) headingEyebrow.textContent = isReview ? 'Step 3 of 3' : 'Step 2 of 3';
        if (headingTitle) headingTitle.textContent = isReview ? 'Review and finalize' : 'Create your portfolio';
        if (creationIntro) creationIntro.textContent = isReview
            ? 'Review your information and the live portfolio preview. Go back to make changes, or create and save your portfolio when you are ready.'
            : 'Fill in your information below to see your portfolio update as you type. Your selected profile picture will also appear in the preview before you submit.';
        if (stepTwoIndicator) stepTwoIndicator.classList.toggle('active', !isReview);
        if (stepThreeIndicator) stepThreeIndicator.classList.toggle('active', isReview);
        if (stepThreeConnector) stepThreeConnector.classList.toggle('completed', isReview);
        if (stepIndicator) stepIndicator.setAttribute('aria-label', isReview ? 'Step 3 of 3: Review' : 'Step 2 of 3: Details');
        if (isReview) {
            if (reviewFullName) reviewFullName.textContent = (nameInput && nameInput.value.trim()) || 'Not provided';
            const emailInput = document.getElementById('email');
            if (reviewEmail) reviewEmail.textContent = (emailInput && emailInput.value.trim()) || 'Not provided';
            if (reviewPicture) reviewPicture.textContent = pictureInput && pictureInput.files && pictureInput.files[0] ? pictureInput.files[0].name : 'No picture selected';
            updatePreviewFields();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        } else {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }

    function updatePreviewFields() {
        if (!form || !preview) {
            return;
        }

        try {
            const url = new URL(preview.src, window.location.href);
            const fields = form.querySelectorAll('input[name], textarea[name], select[name]');

            fields.forEach(function (field) {
                if (
                    field.name === '_token' ||
                    field.name === 'template' ||
                    field.name === 'profile_picture' ||
                    field.type === 'file' ||
                    field.type === 'submit' ||
                    field.type === 'button'
                ) {
                    return;
                }

                if ((field.type === 'checkbox' || field.type === 'radio') && !field.checked) {
                    return;
                }

                url.searchParams.set(field.name, field.value);
            });

            preview.src = url.toString();
            if (previewStatus) {
                previewStatus.textContent = 'Live preview is updating as you edit. Your changes are saved only when you select “Create and save portfolio”.';
            }
        } catch (error) {
            console.warn('Could not update the portfolio preview.', error);
            if (previewStatus) {
                previewStatus.textContent = 'The preview could not be refreshed. Your form entries are still available.';
            }
        }
    }

    function schedulePreviewUpdate() {
        window.clearTimeout(previewTimer);
        previewTimer = window.setTimeout(updatePreviewFields, 250);
    }

    function applyPicturePreview() {
        if (!picturePreviewUrl || !preview.contentDocument) return;

        try {
            const doc = preview.contentDocument;
            const frame = doc.querySelector('.portrait-frame');
            let image = frame ? frame.querySelector('img.portrait, img') : doc.querySelector('img.portrait');
            const placeholder = frame
                ? frame.querySelector('.portrait-placeholder')
                : doc.querySelector('.portrait.portrait-placeholder, .portrait-placeholder');

            if (!image) {
                image = doc.createElement('img');
                image.className = 'portrait';
                image.alt = 'Selected profile picture preview';
                if (placeholder && placeholder.parentNode) {
                    placeholder.insertAdjacentElement('beforebegin', image);
                } else if (frame) {
                    frame.appendChild(image);
                } else {
                    const hero = doc.querySelector('.hero-art, .hero-visual, .hero-image, .hero');
                    if (!hero) return;
                    hero.appendChild(image);
                }
            }

            image.classList.add('portrait');
            image.src = picturePreviewUrl;
            image.alt = 'Selected profile picture preview';
            image.style.display = 'block';
            image.style.width = '100%';
            image.style.height = '100%';
            image.style.objectFit = 'cover';
            image.removeAttribute('onerror');

            if (frame) {
                image.style.borderRadius = 'inherit';
            }
            if (placeholder) placeholder.style.display = 'none';
        } catch (error) {
            console.warn('Could not display the selected profile picture in the preview.', error);
        }
    }

    if (form) {
        form.querySelectorAll('input:not([type="file"]), textarea, select').forEach(function (field) {
            field.addEventListener('input', function () {
                if (field === nameInput) {
                    validateFullName();
                }
                schedulePreviewUpdate();
            });
            field.addEventListener('change', schedulePreviewUpdate);
        });

        if (reviewButton) {
            reviewButton.addEventListener('click', function () {
                const validName = validateFullName();
                if (!validName) {
                    nameInput.focus();
                    nameInput.reportValidity();
                    return;
                }
                if (pictureTooLarge) {
                    if (previewStatus) previewStatus.textContent = 'Please choose an image no larger than 2 MB.';
                    pictureInput.focus();
                    return;
                }
                // Validate all visible form controls before moving to the review stage.
                const invalidField = Array.from(form.querySelectorAll('input, textarea, select')).find(function (field) {
                    if (field.type === 'hidden' || field.type === 'file' || field.disabled) return false;
                    if (field.name === 'full_name') return !validateFullName();
                    return !field.checkValidity();
                });
                if (invalidField) {
                    invalidField.reportValidity();
                    invalidField.focus();
                    return;
                }
                setCreationStage(3);
            });
        }

        if (backButton) {
            backButton.addEventListener('click', function () {
                setCreationStage(2);
            });
        }

        form.addEventListener('submit', function (event) {
            const validName = validateFullName();
            if (!validName) {
                event.preventDefault();
                setCreationStage(2);
                if (nameInput) {
                    nameInput.focus();
                    nameInput.reportValidity();
                }
            }
            if (pictureTooLarge) {
                event.preventDefault();
                setCreationStage(2);
                if (previewStatus) previewStatus.textContent = 'Please choose an image no larger than 2 MB.';
                if (pictureInput) pictureInput.focus();
            }
        });
    }

    if (pictureInput) {
        pictureInput.addEventListener('change', function () {
            const file = pictureInput.files && pictureInput.files[0];
            pictureTooLarge = false;

            if (picturePreviewUrl) {
                URL.revokeObjectURL(picturePreviewUrl);
                picturePreviewUrl = null;
            }

            if (!file) {
                schedulePreviewUpdate();
                return;
            }

            if (!file.type.startsWith('image/')) {
                pictureInput.setCustomValidity('Please select an image file.');
                pictureInput.reportValidity();
                pictureInput.value = '';
                return;
            }

            pictureInput.setCustomValidity('');
            if (file.size > 2 * 1024 * 1024) {
                pictureTooLarge = true;
                pictureInput.setCustomValidity('Please choose an image no larger than 2 MB.');
                pictureInput.reportValidity();
                if (previewStatus) {
                    previewStatus.textContent = 'The selected image is larger than 2 MB. Please choose a smaller image.';
                }
                return;
            }

            picturePreviewUrl = URL.createObjectURL(file);
            applyPicturePreview();
            schedulePreviewUpdate();
        });
    }

    preview.addEventListener('load', function () {
        protectPreviewLinks();
        applyPicturePreview();
    });

    if (form) {
        validateFullName();
        schedulePreviewUpdate();
    }

    const blockedPaths = new Set([
        '/',
        '/portfolio/create',
        '/portfolios'
    ]);

    const blockedPatterns = [
        /^\/portfolio\/[^/]+\/edit\/?$/,
        /^\/portfolios\/[^/]+\/edit\/?$/,
        /^\/portfolio\/[^/]+\/edit-profile\/?$/,
        /^\/portfolios\/[^/]+\/edit-profile\/?$/
    ];

    const blockedLinkText = [
        'edit profile',
        'edit portfolio',
        'edit my profile',
        'edit my portfolio'
    ];

    function normalizePath(pathname) {
        if (!pathname || pathname === '/') {
            return '/';
        }

        return pathname.replace(/\/+$/, '');
    }

    function protectPreviewLinks() {
        try {
            const previewDocument = preview.contentDocument;

            if (!previewDocument) {
                return;
            }

            previewDocument.querySelectorAll('a[href]').forEach(function (link) {
                if (link.dataset.portcraftNavigationProtected === 'true') {
                    return;
                }

                let targetUrl;

                try {
                    targetUrl = new URL(
                        link.getAttribute('href'),
                        previewDocument.baseURI
                    );
                } catch (error) {
                    return;
                }

                if (targetUrl.origin !== window.location.origin) {
                    return;
                }

                const path = normalizePath(targetUrl.pathname);
                const linkText = (link.innerText || link.textContent || '')
                    .trim()
                    .toLowerCase()
                    .replace(/\s+/g, ' ');

                const isBlockedPath =
                    blockedPaths.has(path) ||
                    blockedPatterns.some(function (pattern) {
                        return pattern.test(path);
                    });

                const isBlockedText = blockedLinkText.some(function (text) {
                    return linkText.includes(text);
                });

                if (!isBlockedPath && !isBlockedText) {
                    return;
                }

                link.dataset.portcraftNavigationProtected = 'true';

                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    event.stopImmediatePropagation();
                }, true);

                link.setAttribute('aria-disabled', 'true');
                link.setAttribute(
                    'title',
                    'Navigation is disabled in the preview'
                );
                link.style.cursor = 'default';
            });
        } catch (error) {
            console.warn(
                'Preview navigation protection could not access the iframe. ' +
                'Check that the iframe uses the same origin.',
                error
            );
        }
    }

    if (
        preview.contentDocument &&
        preview.contentDocument.readyState === 'complete'
    ) {
        protectPreviewLinks();
    }
});
</script>

</body>
</html>
