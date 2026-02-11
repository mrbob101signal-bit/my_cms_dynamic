<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Auth') | CMS Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <style>
        :root {
            --pxa-primary: #ee3770;
            --pxa-secondary: #111111;
            --pxa-body-color: #f9f7fd;
            --pxa-title-color: #222222;
            --pxa-text-color: #797979;
            --pxa-white-color: #ffffff;
            --pxa-border-color: #e8e8e8;
            --pxa-danger: #e81a46;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Outfit", sans-serif;
            color: var(--pxa-title-color);
            background:
                radial-gradient(circle at 10% 10%, rgba(238, 55, 112, 0.12), transparent 35%),
                radial-gradient(circle at 90% 90%, rgba(17, 17, 17, 0.08), transparent 30%),
                var(--pxa-body-color);
            min-height: 100vh;
        }

        .auth-shell {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .auth-card {
            width: 100%;
            max-width: @yield('auth_card_max_width', '440px');
            background: var(--pxa-white-color);
            border: 1px solid var(--pxa-border-color);
            border-radius: 20px;
            box-shadow: 0 16px 45px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .auth-card-header {
            padding: 26px 26px 8px;
            text-align: center;
        }

        .auth-logo {
            margin: 0 0 12px;
            font-size: 29px;
            font-weight: 700;
            letter-spacing: 0.3px;
            color: var(--pxa-secondary);
        }

        .auth-logo span {
            color: var(--pxa-primary);
        }

        .auth-subtitle {
            margin: 0;
            color: var(--pxa-text-color);
            font-size: 15px;
        }

        .auth-card-body {
            padding: 22px 26px 26px;
        }

        .alert-error {
            margin-bottom: 14px;
            padding: 10px 12px;
            border-radius: 10px;
            border: 1px solid rgba(232, 26, 70, 0.25);
            background: rgba(232, 26, 70, 0.08);
            color: #a61536;
            font-size: 14px;
        }

        .field-group {
            margin-bottom: 14px;
        }

        .field-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 500;
            color: var(--pxa-title-color);
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #989898;
            font-size: 14px;
        }

        .auth-input {
            width: 100%;
            height: 46px;
            border-radius: 12px;
            border: 1px solid var(--pxa-border-color);
            padding: 0 14px 0 42px;
            font-size: 15px;
            outline: none;
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        .auth-input:focus {
            border-color: rgba(238, 55, 112, 0.55);
            box-shadow: 0 0 0 3px rgba(238, 55, 112, 0.12);
        }

        .is-invalid {
            border-color: rgba(232, 26, 70, 0.55) !important;
        }

        .field-error {
            margin-top: 6px;
            color: var(--pxa-danger);
            font-size: 13px;
        }

        .auth-meta {
            margin: 2px 0 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .remember-wrap {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: var(--pxa-text-color);
        }

        .remember-wrap input {
            accent-color: var(--pxa-primary);
        }

        .auth-btn {
            width: 100%;
            height: 46px;
            border: 0;
            border-radius: 12px;
            background: linear-gradient(120deg, var(--pxa-primary), #c32156);
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            letter-spacing: 0.2px;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .auth-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(238, 55, 112, 0.28);
        }

        .auth-footer {
            margin-top: 16px;
            text-align: center;
            color: var(--pxa-text-color);
            font-size: 14px;
        }

        .auth-link {
            color: var(--pxa-primary);
            text-decoration: none;
            font-weight: 600;
        }

        .auth-link:hover {
            color: #c32156;
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .auth-shell {
                padding: 16px;
            }

            .auth-card {
                border-radius: 16px;
            }

            .auth-card-header {
                padding: 20px 18px 6px;
            }

            .auth-card-body {
                padding: 18px;
            }

            .auth-logo {
                font-size: 24px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
<main class="auth-shell">
    <section class="auth-card">
        <div class="auth-card-header">
            <h1 class="auth-logo"><span>CMS</span> Admin</h1>
            <p class="auth-subtitle">@yield('auth_subtitle')</p>
        </div>

        <div class="auth-card-body">
            @if ($errors->any())
                <div class="alert-error">{{ $errors->first() }}</div>
            @endif

            @yield('auth_form')
        </div>
    </section>
</main>

<script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
