<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="NeonFlow - Platform Digital Modern dengan Teknologi Terdepan">
    <title>{{ $title ?? 'NeonFlow - Digital Innovation' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --neon: #00ff88;
            --neon-dim: #00cc6a;
            --neon-glow: rgba(0, 255, 136, 0.4);
            --neon-subtle: rgba(0, 255, 136, 0.1);
            --bg-primary: #0a0a0a;
            --bg-secondary: #111111;
            --bg-tertiary: #1a1a1a;
            --bg-card: rgba(20, 20, 20, 0.8);
            --text-primary: #ffffff;
            --text-secondary: #a0a0a0;
            --text-muted: #666666;
            --border-color: rgba(255, 255, 255, 0.08);
            --border-neon: rgba(0, 255, 136, 0.3);
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
            font-family: 'Space Grotesk', sans-serif;
            background: var(--bg-primary);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
        }

        ::selection {
            background: var(--neon);
            color: var(--bg-primary);
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-secondary);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--neon-dim);
            border-radius: 3px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Navigation */
        .nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 20px 0;
            transition: all 0.3s ease;
        }

        .nav.scrolled {
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-color);
            padding: 16px 0;
        }

        .nav-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'JetBrains Mono', monospace;
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--neon);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo-dot {
            width: 8px;
            height: 8px;
            background: var(--neon);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                box-shadow: 0 0 0 0 var(--neon-glow);
            }

            50% {
                opacity: 0.8;
                box-shadow: 0 0 0 8px transparent;
            }
        }

        .nav-menu {
            display: flex;
            gap: 32px;
            list-style: none;
        }

        .nav-menu a {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-menu a:hover {
            color: var(--neon);
        }

        .nav-cta {
            padding: 10px 24px;
            background: transparent;
            border: 1px solid var(--neon);
            color: var(--neon);
            border-radius: 6px;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
        }

        .nav-cta:hover {
            background: var(--neon);
            color: var(--bg-primary);
            box-shadow: 0 0 30px var(--neon-glow);
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--text-primary);
            font-size: 1.5rem;
            cursor: pointer;
        }

        @media (max-width: 768px) {

            .nav-menu,
            .nav-cta {
                display: none;
            }

            .mobile-toggle {
                display: block;
            }
        }

        /* Hero */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 120px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, var(--neon-subtle) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-content {
            max-width: 700px;
            position: relative;
            z-index: 1;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            background: var(--neon-subtle);
            border: 1px solid var(--border-neon);
            border-radius: 100px;
            font-size: 0.8rem;
            color: var(--neon);
            margin-bottom: 24px;
        }

        .hero-badge i {
            font-size: 0.7rem;
        }

        .hero-title {
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 24px;
            letter-spacing: -0.02em;
        }

        .hero-title .highlight {
            color: var(--neon);
            text-shadow: 0 0 40px var(--neon-glow);
        }

        .hero-desc {
            font-size: 1.1rem;
            color: var(--text-secondary);
            margin-bottom: 40px;
            max-width: 500px;
        }

        .hero-btns {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 28px;
            border-radius: 8px;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            border: none;
        }

        .btn-primary {
            background: var(--neon);
            color: var(--bg-primary);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 40px var(--neon-glow);
        }

        .btn-ghost {
            background: transparent;
            border: 1px solid var(--border-color);
            color: var(--text-primary);
        }

        .btn-ghost:hover {
            border-color: var(--neon);
            color: var(--neon);
        }

        .hero-stats {
            display: flex;
            gap: 48px;
            margin-top: 60px;
            padding-top: 40px;
            border-top: 1px solid var(--border-color);
        }

        .stat h4 {
            font-family: 'JetBrains Mono', monospace;
            font-size: 2rem;
            font-weight: 600;
            color: var(--neon);
        }

        .stat p {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-top: 4px;
        }

        /* Section Common */
        section {
            padding: 100px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-label {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem;
            color: var(--neon);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            font-weight: 700;
            letter-spacing: -0.01em;
        }

        /* Features */
        .features {
            background: var(--bg-secondary);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        @media (max-width: 992px) {
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .features-grid {
                grid-template-columns: 1fr;
            }
        }

        .feature-card {
            background: var(--bg-tertiary);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 32px;
            transition: all 0.3s;
        }

        .feature-card:hover {
            border-color: var(--border-neon);
            transform: translateY(-4px);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--neon-subtle);
            border-radius: 10px;
            color: var(--neon);
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .feature-card p {
            font-size: 0.9rem;
            color: var(--text-secondary);
            line-height: 1.7;
        }

        /* Services */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        @media (max-width: 768px) {
            .services-grid {
                grid-template-columns: 1fr;
            }
        }

        .service-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 40px 32px;
            position: relative;
            transition: all 0.3s;
        }

        .service-card.featured {
            border-color: var(--neon);
            background: linear-gradient(180deg, rgba(0, 255, 136, 0.05) 0%, transparent 100%);
        }

        .service-card:hover {
            border-color: var(--border-neon);
        }

        .service-badge {
            position: absolute;
            top: -10px;
            right: 24px;
            padding: 4px 12px;
            background: var(--neon);
            color: var(--bg-primary);
            font-size: 0.7rem;
            font-weight: 600;
            border-radius: 4px;
        }

        .service-num {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-bottom: 20px;
        }

        .service-card h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .service-card>p {
            font-size: 0.9rem;
            color: var(--text-secondary);
            margin-bottom: 24px;
            line-height: 1.7;
        }

        .service-list {
            list-style: none;
        }

        .service-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-bottom: 10px;
        }

        .service-list li i {
            color: var(--neon);
            font-size: 0.7rem;
        }

        /* Testimonials */
        .testimonials {
            background: var(--bg-secondary);
        }

        .testimonial-wrapper {
            max-width: 700px;
            margin: 0 auto;
            text-align: center;
        }

        .testimonial-card {
            display: none;
            animation: fadeIn 0.4s ease;
        }

        .testimonial-card.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .testimonial-quote {
            font-size: 1.4rem;
            line-height: 1.8;
            margin-bottom: 32px;
            color: var(--text-primary);
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
        }

        .author-avatar {
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, var(--neon) 0%, var(--neon-dim) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: var(--bg-primary);
        }

        .author-info h4 {
            font-size: 1rem;
            font-weight: 600;
        }

        .author-info span {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .testimonial-nav {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 40px;
        }

        .nav-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--border-color);
            border: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        .nav-dot.active {
            background: var(--neon);
            box-shadow: 0 0 12px var(--neon-glow);
        }

        /* Contact */
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: start;
        }

        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }

        .contact-info h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .contact-info>p {
            color: var(--text-secondary);
            margin-bottom: 40px;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 24px;
        }

        .contact-icon {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--neon-subtle);
            border-radius: 8px;
            color: var(--neon);
            flex-shrink: 0;
        }

        .contact-item h4 {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .contact-item p {
            color: var(--text-primary);
        }

        .contact-form {
            background: var(--bg-tertiary);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 40px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            color: var(--text-primary);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--neon);
            box-shadow: 0 0 0 3px var(--neon-subtle);
        }

        .form-input::placeholder {
            color: var(--text-muted);
        }

        textarea.form-input {
            resize: vertical;
            min-height: 120px;
        }

        .form-error {
            font-size: 0.8rem;
            color: #ff4757;
            margin-top: 6px;
        }

        .form-success {
            background: var(--neon-subtle);
            border: 1px solid var(--border-neon);
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 24px;
            color: var(--neon);
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
        }

        .btn-full {
            width: 100%;
            justify-content: center;
        }

        /* Footer */
        footer {
            background: var(--bg-primary);
            border-top: 1px solid var(--border-color);
            padding: 60px 0 30px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr repeat(3, 1fr);
            gap: 40px;
            margin-bottom: 40px;
        }

        @media (max-width: 768px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 480px) {
            .footer-grid {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }

        .footer-brand p {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin: 16px 0 24px;
            max-width: 280px;
        }

        @media (max-width: 480px) {
            .footer-brand p {
                max-width: 100%;
            }
        }

        .social-links {
            display: flex;
            gap: 12px;
        }

        @media (max-width: 480px) {
            .social-links {
                justify-content: center;
            }
        }

        .social-links a {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg-tertiary);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            color: var(--text-secondary);
            transition: all 0.3s;
        }

        .social-links a:hover {
            border-color: var(--neon);
            color: var(--neon);
        }

        .footer-title {
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--text-primary);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--neon);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid var(--border-color);
            color: var(--text-muted);
            font-size: 0.85rem;
        }
    </style>

    @livewireStyles
</head>

<body>
    {{ $slot }}

    @livewireScripts

    <script>
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('.nav');
            nav.classList.toggle('scrolled', window.scrollY > 50);
        });
    </script>
</body>

</html>