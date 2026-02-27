<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LARAVEL POST // SYSTEM.ACTIVE</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=space-grotesk:300,400,500,600,700|jetbrains-mono:400,500|inter:300,400,500,600" rel="stylesheet" />
    
    <style>
        /* Futuristic Design System */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg-base: #050507;
            --bg-panel: rgba(15, 15, 20, 0.65);
            --text-main: #e2e8f0;
            --text-muted: #8b949e;
            --laravel-red: #ff2d20;
            --laravel-glow: rgba(255, 45, 32, 0.5);
            --accent-cyan: #00f0ff;
            --border-color: rgba(255, 255, 255, 0.08);
            
            --font-display: 'Space Grotesk', sans-serif;
            --font-mono: 'JetBrains Mono', monospace;
            --font-sans: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-base);
            color: var(--text-main);
            font-family: var(--font-sans);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 2rem 1.5rem;
            position: relative;
            overflow-x: hidden;
        }

        /* Cyber Grid Background */
        body::before {
            content: '';
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 40px 40px;
            z-index: -1;
            pointer-events: none;
        }

        /* Subtle glowing orb in background */
        body::after {
            content: '';
            position: fixed;
            top: -20%; left: -10%; width: 60vw; height: 60vh;
            background: radial-gradient(circle, var(--laravel-glow) 0%, transparent 60%);
            opacity: 0.15;
            z-index: -1;
            pointer-events: none;
            filter: blur(80px);
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Typography */
        h1, h2, h3 {
            font-family: var(--font-display);
            font-weight: 600;
            letter-spacing: -0.02em;
        }

        .mono {
            font-family: var(--font-mono);
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        /* Header & Navigation */
        .masthead {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0 3rem;
            flex-wrap: wrap;
            gap: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 3rem;
        }

        .logo {
            display: flex;
            align-items: baseline;
            gap: 1rem;
        }

        .logo-mark {
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
            font-family: var(--font-display);
            text-shadow: 0 0 20px var(--laravel-glow);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo-mark span {
            color: var(--laravel-red);
        }

        .status-indicator {
            width: 8px;
            height: 8px;
            background-color: var(--accent-cyan);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--accent-cyan);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.4; }
            100% { opacity: 1; }
        }

        .tagline {
            font-size: 0.85rem;
            color: var(--accent-cyan);
            border-left: 1px solid rgba(0, 240, 255, 0.3);
            padding-left: 1rem;
        }

        .nav-links {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .nav-link {
            text-decoration: none;
            padding: 0.5rem 1.2rem;
            border: 1px solid var(--border-color);
            color: var(--text-muted);
            font-size: 0.85rem;
            font-family: var(--font-mono);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            background: rgba(0,0,0,0.5);
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: 0.5s;
        }

        .nav-link:hover {
            color: #fff;
            border-color: var(--laravel-red);
            box-shadow: 0 0 15px rgba(255, 45, 32, 0.2);
        }

        .nav-link:hover::before {
            left: 100%;
        }

        .nav-link.highlight {
            background: rgba(255, 45, 32, 0.1);
            border-color: var(--laravel-red);
            color: #fff;
        }

        /* Main Grid */
        .cyber-grid {
            display: grid;
            grid-template-columns: 1.2fr 0.9fr;
            gap: 3rem;
            align-items: center;
        }

        /* Feature Card (Glassmorphism Cyber Panel) */
        .feature-card {
            background: var(--bg-panel);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--border-color);
            padding: 3rem;
            position: relative;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            border-left: 4px solid var(--laravel-red);
        }

        /* Decorative tech corners */
        .feature-card::before, .feature-card::after {
            content: ''; position: absolute; width: 10px; height: 10px; border: 1px solid var(--accent-cyan);
        }
        .feature-card::before { top: -1px; right: -1px; border-left: none; border-bottom: none; }
        .feature-card::after { bottom: -1px; right: -1px; border-left: none; border-top: none; }

        .feature-label {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.8rem;
            color: var(--accent-cyan);
            margin-bottom: 2rem;
            background: rgba(0, 240, 255, 0.1);
            padding: 0.3rem 0.8rem;
            border-radius: 4px;
        }

        .feature-title {
            font-size: 3.5rem;
            line-height: 1.1;
            margin: 1rem 0 1.5rem;
            background: linear-gradient(to right, #fff, #8b949e);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .post-meta {
            display: flex;
            gap: 2rem;
            margin: 2rem 0;
            font-size: 0.85rem;
            color: var(--text-muted);
            font-family: var(--font-mono);
        }

        .post-meta strong {
            color: #fff;
        }

        .feature-excerpt {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #a1aab5;
            margin: 2rem 0;
        }

        .read-link {
            text-decoration: none;
            color: #fff;
            font-family: var(--font-mono);
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding-bottom: 0.25rem;
            border-bottom: 1px solid var(--laravel-red);
            transition: all 0.3s;
        }

        .read-link:hover {
            color: var(--laravel-red);
            gap: 1.25rem;
            text-shadow: 0 0 10px var(--laravel-glow);
        }

        /* Right Side Poster Area */
        .poster-area {
            display: flex;
            flex-direction: column;
            gap: 2.5rem;
        }

        .hero-type {
            text-align: right;
        }

        .hero-main {
            font-size: 5rem;
            font-family: var(--font-display);
            font-weight: 700;
            line-height: 0.9;
            color: transparent;
            -webkit-text-stroke: 1px rgba(255, 255, 255, 0.2);
        }

        .hero-main .filled {
            color: #fff;
            -webkit-text-stroke: 0;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
        }

        .hero-sub {
            font-family: var(--font-mono);
            font-size: 0.85rem;
            color: var(--laravel-red);
            margin-top: 1rem;
        }

        /* Story Cards (Cyber Nodes) */
        .story-stack {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .story-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .story-card::before {
            content: '';
            position: absolute;
            left: 0; top: 0;
            width: 2px; height: 100%;
            background: var(--laravel-red);
            transform: scaleY(0);
            transition: 0.3s;
        }

        .story-card:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 45, 32, 0.3);
            transform: translateX(10px);
        }

        .story-card:hover::before {
            transform: scaleY(1);
        }

        .story-icon {
            font-size: 1.5rem;
            color: var(--accent-cyan);
            font-family: var(--font-mono);
            opacity: 0.8;
        }

        .story-content h3 {
            font-size: 1.1rem;
            margin-bottom: 0.3rem;
            color: #fff;
        }

        .story-content p {
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        .story-arrow {
            margin-left: auto;
            color: var(--laravel-red);
            font-family: var(--font-mono);
            opacity: 0;
            transition: 0.3s;
        }

        .story-card:hover .story-arrow {
            opacity: 1;
            transform: translateX(5px);
        }

        /* Ecosystem Terminals */
        .ecosystem-row {
            display: flex;
            gap: 0.8rem;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .ecosystem-pill {
            padding: 0.5rem 1rem;
            background-color: transparent;
            border: 1px solid var(--border-color);
            text-decoration: none;
            color: var(--text-muted);
            font-size: 0.8rem;
            font-family: var(--font-mono);
            transition: 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .ecosystem-pill:hover {
            background-color: var(--laravel-red);
            color: #fff;
            border-color: var(--laravel-red);
            box-shadow: 0 0 15px var(--laravel-glow);
        }

        /* Data Pillars */
        .data-pillars {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin: 4rem 0 2rem;
            padding: 2rem;
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid var(--border-color);
        }

        .pillar {
            padding-right: 2rem;
            border-right: 1px dotted rgba(255,255,255,0.1);
        }
        .pillar:last-child { border-right: none; padding-right: 0; }

        .pillar h3 {
            font-size: 0.9rem;
            margin-bottom: 0.75rem;
            color: var(--accent-cyan);
            font-family: var(--font-mono);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .pillar p {
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        /* Footer */
        .footer-note {
            margin-top: 2rem;
            padding: 2rem 0;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            font-size: 0.85rem;
            font-family: var(--font-mono);
            color: var(--text-muted);
        }

        .footer-links {
            display: flex;
            gap: 2rem;
        }

        .footer-links a {
            text-decoration: none;
            color: inherit;
            transition: 0.2s;
        }

        .footer-links a:hover {
            color: var(--accent-cyan);
            text-shadow: 0 0 8px rgba(0, 240, 255, 0.4);
        }

        /* Mobile Adjustments */
        @media (max-width: 900px) {
            .cyber-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            .hero-main {
                font-size: 3.5rem;
                text-align: left;
            }
            .hero-sub {
                text-align: left;
            }
            .ecosystem-row {
                justify-content: flex-start;
            }
            .feature-card {
                padding: 2rem;
            }
            .feature-title {
                font-size: 2.5rem;
            }
            .data-pillars {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            .pillar {
                border-right: none;
                border-bottom: 1px dotted rgba(255,255,255,0.1);
                padding-right: 0;
                padding-bottom: 1.5rem;
            }
            .pillar:last-child { border-bottom: none; padding-bottom: 0; }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="masthead">
            <div class="logo">
                <div class="logo-mark">
                    <div class="status-indicator"></div>
                    LARAVEL<span>POST</span>
                </div>
                <div class="tagline mono">NODE: COMMUNITY_HUB</div>
            </div>
            <div class="nav-links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-link highlight">[ dashboard ]</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">SYS.LOGIN</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link highlight">INIT.JOIN</a>
                        @endif
                    @endauth
                @endif
            </div>
        </header>

        <div class="cyber-grid">
            <div class="feature-card">
                <div class="feature-label mono">
                    [ TX-01 ] FEATURED TRANSMISSION
                </div>
                <h2 class="feature-title">
                    The New Laravel<br>Architecture
                </h2>
                <div class="post-meta mono">
                    <span>AUTH: <strong>T. OTWELL</strong></span>
                    <span>//</span>
                    <span>SIZE: 12 MIN</span>
                </div>
                <div class="feature-excerpt">
                    "From elegant syntax to a high-performance ecosystem. Laravel 12 optimizes the architecture of web craftsmanship. Scanning directories, facades, and future protocols."
                </div>
                <a href="#" class="read-link">
                    EXECUTE_READ <span style="font-size: 1.2rem;">>_</span>
                </a>
            </div>

            <div class="poster-area">
                <div class="hero-type">
                    <div class="hero-main">
                        LARAVEL<br><span class="filled">POST</span>
                    </div>
                    <div class="hero-sub mono">VERSION 1.0 // BUILD 2025</div>
                </div>

                <div class="story-stack">
                    <div class="story-card">
                        <div class="story-icon">[DOC]</div>
                        <div class="story-content">
                            <h3>Access Documentation</h3>
                            <p>Eloquent, collections, starter kits</p>
                        </div>
                        <div class="story-arrow">-></div>
                    </div>
                    <div class="story-card">
                        <div class="story-icon">[VID]</div>
                        <div class="story-content">
                            <h3>Laracasts Uplink</h3>
                            <p>Stream: "Testing Architectures"</p>
                        </div>
                        <div class="story-arrow">-></div>
                    </div>
                </div>

                <div class="ecosystem-row">
                    <a href="https://laravel.com/docs" target="_blank" class="ecosystem-pill">_docs</a>
                    <a href="https://laracasts.com" target="_blank" class="ecosystem-pill">_laracasts</a>
                    <a href="https://cloud.laravel.com" target="_blank" class="ecosystem-pill">_deploy</a>
                    <a href="#" class="ecosystem-pill">_forums</a>
                </div>
            </div>
        </div>

        <div class="data-pillars">
            <div class="pillar">
                <h3>> RECENT_LOGS</h3>
                <p>Pint, Breeze, and the new Folio architecture — fully deployed to main.</p>
            </div>
            <div class="pillar">
                <h3>> COMM_PICKS</h3>
                <p>"Constructing with Livewire protocols" engineered by Caleb Porzio.</p>
            </div>
            <div class="pillar">
                <h3>> ECO_SYSTEM</h3>
                <p>Nova, Forge, Vapor — enterprise-grade modules for optimal performance.</p>
            </div>
        </div>

        <footer class="footer-note">
            <div>LARAVEL POST <span style="color: rgba(255,255,255,0.2)">//</span> CYBERPUNK UI OVERRIDE</div>
            <div class="footer-links">
                <a href="#">/about</a>
                <a href="#">/transmissions</a>
                <a href="#">/github</a>
                <span>SYS.TIME {{ date('Y') }}</span>
            </div>
        </footer>
    </div>
</body>
</html>g