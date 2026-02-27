<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LARAVEL POST · aesthetic hub</title>
    <!-- fonts & smoothness -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz@14..32&family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet">
    <!-- minimal style reset / custom design -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f7f5f0;  /* warm paper */
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: #2c2b28;
            line-height: 1.5;
            padding: 1.5rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* dark mode gentle */
        @media (prefers-color-scheme: dark) {
            body {
                background-color: #1e1e1b;
                color: #e3e1da;
            }
            .card, .post-card, .glass-panel {
                background-color: #2b2a26;
                border-color: #44433e;
            }
            .meta, .date {
                color: #b0aea6;
            }
            .outline-btn {
                border-color: #5f5e58;
                color: #dedbd2;
            }
            .outline-btn:hover {
                background-color: #3f3e39;
                border-color: #8f8d86;
            }
            .hero-laravel {
                color: #ff9f4b;
            }
        }

        /* main container — soft width */
        .post-container {
            max-width: 1280px;
            width: 100%;
            margin: 0 auto;
        }

        /* header with LARAVEL POST */
        .masthead {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 4rem;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .laravel-badge {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 400;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, #f05340, #ff8c4b);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            line-height: 1.1;
        }
        .laravel-badge span {
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: 300;
            letter-spacing: 0.3em;
            margin-left: 0.5rem;
            color: #8b6f5c;
            background: none;
            -webkit-text-fill-color: #8b6f5c;
        }
        .post-tagline {
            font-size: 0.95rem;
            color: #6f6358;
            border-left: 1px solid #ccc7bc;
            padding-left: 1.2rem;
        }

        /* auth nav — soft */
        .auth-links {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        .auth-link {
            text-decoration: none;
            font-size: 0.95rem;
            padding: 0.4rem 1rem;
            border-radius: 40px;
            background-color: transparent;
            border: 1px solid #d4cdc0;
            color: #3f3b36;
            transition: 0.2s ease;
        }
        .auth-link:hover {
            background-color: #2c2b28;
            border-color: #2c2b28;
            color: white;
        }
        .auth-link.highlight {
            background-color: #2c2b28;
            border-color: #2c2b28;
            color: white;
        }
        .auth-link.highlight:hover {
            background-color: #4a433b;
            border-color: #4a433b;
        }
        @media (prefers-color-scheme: dark) {
            .auth-link {
                border-color: #4e4b45;
                color: #e8e2d9;
            }
            .auth-link:hover {
                background-color: #faf7f0;
                color: #1e1e1b;
                border-color: #faf7f0;
            }
            .auth-link.highlight {
                background-color: #e0d9cd;
                color: #1e1e1b;
                border-color: #e0d9cd;
            }
        }

        /* main grid — editorial & aesthetic */
        .editorial-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2.5rem;
            align-items: center;
        }

        /* left: featured card "post of the day" */
        .feature-post {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            border: 1px solid #e7dfd3;
            border-radius: 36px;
            padding: 2.5rem 2.2rem;
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.08);
        }

        .feature-label {
            display: inline-block;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.2rem;
            font-weight: 400;
            color: #b7805a;
            border-bottom: 2px solid #e1cfba;
            padding-bottom: 0.6rem;
            margin-bottom: 1.5rem;
        }

        .post-title {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            line-height: 1.1;
            font-weight: 400;
            margin: 1rem 0 1.2rem;
        }
        .post-title a {
            text-decoration: none;
            color: inherit;
        }
        .post-meta {
            display: flex;
            gap: 1.8rem;
            margin: 2rem 0 1.5rem;
            color: #7b6e60;
            font-size: 0.95rem;
        }
        .post-excerpt {
            font-size: 1.1rem;
            color: #4d463e;
            border-left: 3px solid #f09b6b;
            padding-left: 1.5rem;
            margin-bottom: 2.5rem;
        }
        .read-more {
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            border-bottom: 1.5px solid #c5aa93;
            padding-bottom: 0.3rem;
            color: #1f1c18;
        }
        .read-more:hover {
            border-bottom-color: #f05340;
        }

        /* right side – LARAVEL POST svg calligram + two cards */
        .right-panel {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .hero-type {
            font-size: 4.5rem;
            font-family: 'Playfair Display', serif;
            font-weight: 500;
            line-height: 1.0;
            text-align: right;
            color: #312d28;
            word-break: break-word;
        }
        .hero-type .laravel-glow {
            background: linear-gradient(145deg, #e3512b, #b8562c);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
        .hero-sub {
            text-align: right;
            font-size: 1rem;
            letter-spacing: 0.4rem;
            text-transform: uppercase;
            color: #9f8b7a;
            margin-top: -0.5rem;
        }

        /* stack cards */
        .stack-cards {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }
        .story-card {
            background-color: #ffffffd9;
            backdrop-filter: blur(4px);
            border: 1px solid #ebe3d7;
            border-radius: 26px;
            padding: 1.5rem 2rem;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            transition: transform 0.2s;
            box-shadow: 0 8px 18px -6px rgba(0,0,0,0.05);
        }
        .story-card:hover {
            transform: translateX(6px);
            background: white;
        }
        .card-icon {
            font-size: 2.2rem;
            line-height: 1;
            opacity: 0.7;
        }
        .card-content h3 {
            font-weight: 500;
            font-size: 1.3rem;
            margin-bottom: 0.2rem;
        }
        .card-content p {
            font-size: 0.95rem;
            color: #6f6459;
        }
        .card-arrow {
            margin-left: auto;
            font-size: 1.5rem;
            opacity: 0.4;
        }

        /* seconday list (laravel ecosystem) */
        .ecosystem-links {
            margin-top: 2rem;
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: flex-start;
            border-top: 1px dashed #cfc6b8;
            padding-top: 2.2rem;
        }
        .ecosystem-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            color: #4b433b;
            font-size: 0.95rem;
            border: 1px solid transparent;
            padding: 0.4rem 1rem;
            border-radius: 40px;
            background: #ede7de;
        }
        .ecosystem-item:hover {
            background: #2c2b28;
            color: white;
        }
        @media (prefers-color-scheme: dark) {
            .ecosystem-item {
                background: #3a3732;
                color: #dfdad1;
            }
            .ecosystem-item:hover {
                background: #c7b8a8;
                color: #161614;
            }
            .feature-post, .story-card {
                background: #2f2e2abf;
                border-color: #4a4842;
            }
            .post-excerpt {
                color: #c5bcb1;
            }
            .read-more {
                color: #ebdacb;
            }
        }

        /* footer spacer */
        .footer-credit {
            margin-top: 5rem;
            font-size: 0.85rem;
            color: #8f887d;
            text-align: center;
            border-top: 1px solid #e3dbcf;
            padding-top: 2rem;
            width: 100%;
        }
        .footer-credit strong {
            font-weight: 500;
            color: #b95f38;
        }

        /* responsive */
        @media (max-width: 850px) {
            .editorial-grid {
                grid-template-columns: 1fr;
            }
            .hero-type {
                text-align: left;
                font-size: 3.5rem;
            }
            .hero-sub {
                text-align: left;
            }
            .masthead {
                flex-direction: column;
                align-items: start;
            }
        }
    </style>
</.h>
<body>
    <div class="post-container">
        <!-- header with LARAVEL POST identity & auth -->
        <div class="masthead">
            <div class="logo-area">
                <div class="laravel-badge">
                    LARAVEL <span>POST</span>
                </div>
                <div class="post-tagline">— stories · packages · ideas</div>
            </div>
            <div class="auth-links">
                                    <a href="#" class="auth-link">log in</a>
                    <a href="#" class="auth-link highlight">register</a>
                            </div>
        </div>

        <!-- main editorial spread -->
        <div class="editorial-grid">
            <!-- left side – feature article (post) -->
            <div class="feature-post">
                <div class="feature-label">✨ LATEST EDITION</div>
                <h1 class="post-title"><a href="#">The Art of Laravel<br>Eloquent</a></h1>
                <div class="post-meta">
                    <span>✍️ by Taylor Otwell</span>
                    <span class="date">📅 27 Feb 2025</span>
                </div>
                <div class="post-excerpt">
                    “Accessors, mutators, and relationships — sculpt your data with grace. A deep dive into presenters and local scopes.”
                </div>
                <a href="#" class="read-more">continue reading <span style="font-size:1.4rem;">↗</span></a>

                <!-- tiny ecosystem quick hits (nested inside card) -->
                <div class="ecosystem-links">
                    <a href="https://laravel.com/docs" target="_blank" class="ecosystem-item">📘 docs</a>
                    <a href="https://laracasts.com" target="_blank" class="ecosystem-item">🎥 laracasts</a>
                    <a href="https://cloud.laravel.com" target="_blank" class="ecosystem-item">☁️ deploy now</a>
                </div>
            </div>

            <!-- right side – LARAVEL POST typographic + cards -->
            <div class="right-panel">
                <div class="hero-type">
                    <span class="laravel-glow">LARAVEL</span><br>POST
                </div>
                <div class="hero-sub">community edition</div>

                <!-- two story cards (replaces old bullet list) -->
                <div class="stack-cards">
                    <div class="story-card">
                        <span class="card-icon">📚</span>
                        <div class="card-content">
                            <h3>From the documentation</h3>
                            <p>Read the entire Laravel guide – updated for v12.</p>
                        </div>
                        <span class="card-arrow">↗</span>
                    </div>
                    <div class="story-card">
                        <span class="card-icon">🎬</span>
                        <div class="card-content">
                            <h3>Laracasts new season</h3>
                            <p>“Eloquent performance” – 8 videos, free.</p>
                        </div>
                        <span class="card-arrow">↗</span>
                    </div>
                </div>

                <!-- subtle call to deploy (inspired by original but refined) -->
                <div style="display: flex; justify-content: flex-end; margin-top: 1rem;">
                    <a href="#" style="padding: 0.6rem 2rem; background: #d9cdbc; border-radius: 60px; text-decoration: none; color: #1c1b17; font-weight: 500; letter-spacing: -0.01em; border: 1px solid #b7aa99;">⚡ spin up on cloud</a>
                </div>
            </div>
        </div>

        <!-- footer minimal echo of original layout (optional) -->
        <div class="footer-credit">
            <strong>LARAVEL POST</strong> — aesthetic take on the welcome page · <span>crafted with 🩶 for the ecosystem</span>
        </div>
    </div>

    <!-- subtle script: just to preserve any auth route logic if needed (no real change) -->
    <script>
        // (silent) the design is pure html/css, but we keep the Laravel spirit
    </script>
</body>
</html>