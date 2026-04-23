<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduTrack — Lacak Perjalanan Belajarmu</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --bg: #0d0f14;
            --surface: #13161d;
            --surface2: #1a1e28;
            --border: #252a36;
            --ink: #eef0f6;
            --muted: #6b7280;
            --accent: #6ee7b7;
            --accent2: #38bdf8;
            --accent3: #f472b6;
            --warn: #fbbf24;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--ink);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* NAV */
        nav {
            padding: 1.2rem 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            background: rgba(13,15,20,0.85);
            backdrop-filter: blur(12px);
            z-index: 100;
        }
        .brand {
            font-family: 'DM Serif Display', serif;
            font-size: 1.25rem;
            color: var(--ink);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }
        .brand-dot { width: 7px; height: 7px; border-radius: 50%; background: var(--accent); display: inline-block; }
        .nav-links { display: flex; gap: 0.2rem; list-style: none; }
        .nav-links a {
            font-size: 0.82rem;
            font-weight: 500;
            color: var(--muted);
            text-decoration: none;
            padding: 0.45rem 0.9rem;
            border-radius: 6px;
            transition: all 0.2s;
            letter-spacing: 0.01em;
        }
        .nav-links a:hover, .nav-links a.active {
            color: var(--ink);
            background: var(--surface2);
        }

        /* HERO */
        .hero {
            max-width: 860px;
            margin: 5rem auto 3rem;
            padding: 0 2rem;
        }
        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 1.5rem;
            background: rgba(110,231,183,0.08);
            border: 1px solid rgba(110,231,183,0.2);
            padding: 0.35rem 0.85rem;
            border-radius: 20px;
        }
        .hero-eyebrow span { width: 6px; height: 6px; border-radius: 50%; background: var(--accent); animation: blink 2s infinite; }
        @keyframes blink { 0%,100%{opacity:1} 50%{opacity:0.2} }

        .hero-title {
            font-family: 'DM Serif Display', serif;
            font-size: clamp(2.8rem, 7vw, 4.8rem);
            line-height: 1.05;
            letter-spacing: -0.02em;
            margin-bottom: 1.5rem;
            color: var(--ink);
        }
        .hero-title em {
            font-style: italic;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-sub {
            font-size: 1rem;
            line-height: 1.75;
            color: var(--muted);
            max-width: 520px;
            margin-bottom: 2.5rem;
        }

        .hero-cta {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.7rem 1.5rem;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.85rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            border-radius: 8px;
            transition: all 0.2s;
            letter-spacing: 0.01em;
        }
        .btn-primary {
            background: var(--accent);
            color: #0d0f14;
        }
        .btn-primary:hover { background: #4ade80; transform: translateY(-1px); }
        .btn-ghost {
            background: transparent;
            color: var(--muted);
            border: 1px solid var(--border);
        }
        .btn-ghost:hover { border-color: var(--muted); color: var(--ink); }

        /* STATS STRIP */
        .stats-strip {
            max-width: 860px;
            margin: 0 auto 4rem;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
            background: var(--surface);
        }
        .stat-item {
            padding: 1.75rem 1.25rem;
            text-align: center;
            position: relative;
        }
        .stat-item:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0; top: 20%; height: 60%;
            width: 1px;
            background: var(--border);
        }
        .stat-num {
            font-family: 'DM Serif Display', serif;
            font-size: 2.2rem;
            color: var(--accent);
            line-height: 1;
            margin-bottom: 0.3rem;
        }
        .stat-lbl { font-size: 0.73rem; color: var(--muted); font-weight: 500; letter-spacing: 0.04em; }

        /* FEATURE GRID */
        .section {
            max-width: 860px;
            margin: 0 auto 4rem;
            padding: 0 2rem;
        }
        .section-label {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--muted);
            margin-bottom: 1rem;
        }
        .section-title {
            font-family: 'DM Serif Display', serif;
            font-size: 1.8rem;
            margin-bottom: 0.6rem;
        }
        .section-sub {
            font-size: 0.88rem;
            color: var(--muted);
            line-height: 1.7;
            max-width: 440px;
            margin-bottom: 2rem;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1px;
            background: var(--border);
            border-radius: 12px;
            overflow: hidden;
        }
        .feature-card {
            background: var(--surface);
            padding: 2rem;
            transition: background 0.2s;
        }
        .feature-card:hover { background: var(--surface2); }
        .feature-card:first-child { border-radius: 11px 0 0 0; }
        .feature-card:nth-child(2) { border-radius: 0 11px 0 0; }
        .feature-card:nth-child(3) { border-radius: 0 0 0 11px; }
        .feature-card:last-child { border-radius: 0 0 11px 0; }

        .feature-icon {
            width: 40px; height: 40px;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }
        .icon-green { background: rgba(110,231,183,0.1); }
        .icon-blue { background: rgba(56,189,248,0.1); }
        .icon-pink { background: rgba(244,114,182,0.1); }
        .icon-yellow { background: rgba(251,191,36,0.1); }

        .feature-title { font-size: 0.92rem; font-weight: 600; margin-bottom: 0.4rem; }
        .feature-desc { font-size: 0.8rem; line-height: 1.7; color: var(--muted); }

        /* HOW IT WORKS */
        .how-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            align-items: start;
        }
        .how-visual {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
        }
        .how-visual-header {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }
        .dot-ctrl { width: 10px; height: 10px; border-radius: 50%; }
        .dot-r { background: #ff5f57; }
        .dot-y { background: #febc2e; }
        .dot-g { background: #28c840; }
        .mock-content { padding: 1.25rem; display: flex; flex-direction: column; gap: 0.75rem; }
        .mock-row {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .mock-ava {
            width: 32px; height: 32px;
            border-radius: 8px;
            flex-shrink: 0;
        }
        .mock-text { flex: 1; display: flex; flex-direction: column; gap: 0.3rem; }
        .mock-line {
            height: 8px;
            border-radius: 4px;
            background: var(--surface2);
        }
        .mock-bar-wrap {
            height: 8px;
            background: var(--surface2);
            border-radius: 4px;
            overflow: hidden;
        }
        .mock-bar {
            height: 100%;
            border-radius: 4px;
        }
        .bar-green { background: var(--accent); }
        .bar-blue { background: var(--accent2); }
        .bar-pink { background: var(--accent3); }
        .bar-warn { background: var(--warn); }

        .steps { display: flex; flex-direction: column; gap: 1.25rem; }
        .step {
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }
        .step-num {
            font-family: 'DM Serif Display', serif;
            font-size: 1.2rem;
            color: rgba(110,231,183,0.35);
            flex-shrink: 0;
            width: 24px;
            line-height: 1.5;
        }
        .step-title { font-size: 0.88rem; font-weight: 600; margin-bottom: 0.2rem; }
        .step-desc { font-size: 0.8rem; color: var(--muted); line-height: 1.6; }

        /* QUICK LINKS */
        .link-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }
        .link-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.25rem;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            text-decoration: none;
            color: var(--ink);
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        .link-card:hover {
            background: var(--surface2);
            border-color: var(--accent);
            color: var(--accent);
        }
        .link-card svg { width: 14px; height: 14px; color: var(--muted); transition: color 0.2s; }
        .link-card:hover svg { color: var(--accent); }
        .link-card-inner { display: flex; align-items: center; gap: 0.6rem; }
        .link-icon { font-size: 1rem; }

        /* CTA */
        .cta-section {
            max-width: 860px;
            margin: 0 auto 5rem;
            padding: 0 2rem;
        }
        .cta-box {
            background: linear-gradient(135deg, #0d1a18 0%, #0a1520 100%);
            border: 1px solid rgba(110,231,183,0.2);
            border-radius: 16px;
            padding: 3rem 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
            position: relative;
            overflow: hidden;
        }
        .cta-box::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 200px; height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(110,231,183,0.08), transparent 70%);
        }
        .cta-title {
            font-family: 'DM Serif Display', serif;
            font-size: 1.75rem;
            margin-bottom: 0.4rem;
        }
        .cta-sub { font-size: 0.85rem; color: var(--muted); line-height: 1.6; }

        @media (max-width: 640px) {
            .stats-strip { grid-template-columns: repeat(2,1fr); }
            .stat-item:nth-child(2)::after { display: none; }
            .feature-grid { grid-template-columns: 1fr; }
            .feature-card { border-radius: 0 !important; }
            .how-grid { grid-template-columns: 1fr; }
            .link-grid { grid-template-columns: 1fr; }
            .cta-box { flex-direction: column; align-items: flex-start; }
        }
    </style>
</head>
<body>

<nav>
    <a href="/" class="brand">
        <span class="brand-dot"></span>EduTrack
    </a>
    <ul class="nav-links">
        <li><a href="/" class="active">Beranda</a></li>
        <li><a href="/about">Tentang</a></li>
        <li><a href="/fitur">Fitur</a></li>
        <li><a href="/profile">Profil</a></li>
        <li><a href="/users-view">Users</a></li>
    </ul>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-eyebrow"><span></span>Platform Belajar</div>
    <h1 class="hero-title">Lacak belajarmu,<br><em>raih tujuanmu.</em></h1>
    <p class="hero-sub">EduTrack membantu kamu mendokumentasikan perjalanan belajar, mencatat progress, dan mencapai target akademik dengan lebih terstruktur dan menyenangkan.</p>
    <div class="hero-cta">
        <a href="/fitur" class="btn btn-primary">Lihat Fitur →</a>
        <a href="/about" class="btn btn-ghost">Tentang EduTrack</a>
    </div>
</section>

<!-- STATS -->
<div class="stats-strip">
    <div class="stat-item"><div class="stat-num">10k+</div><div class="stat-lbl">Pelajar Aktif</div></div>
    <div class="stat-item"><div class="stat-num">500+</div><div class="stat-lbl">Materi Tersedia</div></div>
    <div class="stat-item"><div class="stat-num">98%</div><div class="stat-lbl">Kepuasan</div></div>
    <div class="stat-item"><div class="stat-num">∞</div><div class="stat-lbl">Potensi Kamu</div></div>
</div>

<!-- FEATURES -->
<section class="section">
    <p class="section-label">Fitur Unggulan</p>
    <h2 class="section-title">Semua yang kamu butuhkan.</h2>
    <p class="section-sub">Tools sederhana namun powerful untuk belajar lebih efektif setiap harinya.</p>

    <div class="feature-grid">
        <div class="feature-card">
            <div class="feature-icon icon-green">📚</div>
            <div class="feature-title">Manajemen Materi</div>
            <p class="feature-desc">Catat dan kelola semua materi pelajaran dalam satu tempat yang terorganisir dan mudah dicari.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon icon-blue">📊</div>
            <div class="feature-title">Tracking Progress</div>
            <p class="feature-desc">Pantau perkembangan belajarmu dengan grafik dan statistik yang mudah dipahami.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon icon-pink">🎯</div>
            <div class="feature-title">Target Belajar</div>
            <p class="feature-desc">Tetapkan target akademik dan lacak seberapa dekat kamu dengan tujuanmu setiap hari.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon icon-yellow">🏆</div>
            <div class="feature-title">Badge Pencapaian</div>
            <p class="feature-desc">Dapatkan badge untuk setiap milestone yang berhasil kamu capai dalam perjalanan belajar.</p>
        </div>
    </div>
</section>

<!-- HOW IT WORKS -->
<section class="section">
    <p class="section-label">Cara Kerja</p>
    <h2 class="section-title">Mulai dalam 4 langkah.</h2>

    <div class="how-grid">
        <!-- mock UI -->
        <div class="how-visual">
            <div class="how-visual-header">
                <div class="dot-ctrl dot-r"></div>
                <div class="dot-ctrl dot-y"></div>
                <div class="dot-ctrl dot-g"></div>
            </div>
            <div class="mock-content">
                <div class="mock-row">
                    <div class="mock-ava" style="background:rgba(110,231,183,0.15)"></div>
                    <div class="mock-text">
                        <div class="mock-line" style="width:60%"></div>
                        <div class="mock-line" style="width:40%"></div>
                    </div>
                </div>
                <div style="height:1px;background:var(--border);margin:0.25rem 0;"></div>
                <div style="font-size:0.7rem;color:var(--muted);margin-bottom:0.25rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;">Progress Belajar</div>
                <div>
                    <div style="display:flex;justify-content:space-between;margin-bottom:0.3rem;font-size:0.72rem;"><span style="color:var(--muted)">Matematika</span><span style="color:var(--accent)">85%</span></div>
                    <div class="mock-bar-wrap"><div class="mock-bar bar-green" style="width:85%"></div></div>
                </div>
                <div>
                    <div style="display:flex;justify-content:space-between;margin-bottom:0.3rem;font-size:0.72rem;"><span style="color:var(--muted)">Pemrograman</span><span style="color:var(--accent2)">90%</span></div>
                    <div class="mock-bar-wrap"><div class="mock-bar bar-blue" style="width:90%"></div></div>
                </div>
                <div>
                    <div style="display:flex;justify-content:space-between;margin-bottom:0.3rem;font-size:0.72rem;"><span style="color:var(--muted)">Basis Data</span><span style="color:var(--accent3)">78%</span></div>
                    <div class="mock-bar-wrap"><div class="mock-bar bar-pink" style="width:78%"></div></div>
                </div>
                <div>
                    <div style="display:flex;justify-content:space-between;margin-bottom:0.3rem;font-size:0.72rem;"><span style="color:var(--muted)">Bahasa Inggris</span><span style="color:var(--warn)">70%</span></div>
                    <div class="mock-bar-wrap"><div class="mock-bar bar-warn" style="width:70%"></div></div>
                </div>
            </div>
        </div>

        <!-- steps -->
        <div class="steps">
            <div class="step">
                <div class="step-num">01</div>
                <div>
                    <div class="step-title">Buat Profil Belajar</div>
                    <div class="step-desc">Isi data dan tentukan bidang studi yang ingin kamu kuasai.</div>
                </div>
            </div>
            <div class="step">
                <div class="step-num">02</div>
                <div>
                    <div class="step-title">Catat Materi</div>
                    <div class="step-desc">Dokumentasikan setiap materi yang sudah dipelajari hari ini.</div>
                </div>
            </div>
            <div class="step">
                <div class="step-num">03</div>
                <div>
                    <div class="step-title">Pantau Progress</div>
                    <div class="step-desc">Lihat grafik perkembangan belajarmu dari waktu ke waktu.</div>
                </div>
            </div>
            <div class="step">
                <div class="step-num">04</div>
                <div>
                    <div class="step-title">Raih Target</div>
                    <div class="step-desc">Selesaikan semua target dan dapatkan badge pencapaian.</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- QUICK LINKS -->
<section class="section">
    <p class="section-label">Jelajahi</p>
    <div class="link-grid">
        <a href="/profile" class="link-card">
            <div class="link-card-inner"><span class="link-icon">👤</span> Profil Saya</div>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
        </a>
        <a href="/about" class="link-card">
            <div class="link-card-inner"><span class="link-icon">💡</span> Tentang EduTrack</div>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
        </a>
        <a href="/fitur" class="link-card">
            <div class="link-card-inner"><span class="link-icon">⚡</span> Fitur Unggulan</div>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
        </a>
        <a href="/users-view" class="link-card">
            <div class="link-card-inner"><span class="link-icon">👥</span> Manajemen Users</div>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
        </a>
    </div>
</section>

<!-- CTA -->
<div class="cta-section">
    <div class="cta-box">
        <div>
            <h2 class="cta-title">Siap mulai belajar<br>dengan data?</h2>
            <p class="cta-sub">Mulai perjalanan belajarmu sekarang dan rasakan perbedaannya.</p>
        </div>
        <a href="/profile" class="btn btn-primary">Mulai Sekarang →</a>
    </div>
</div>

</body>
</html>