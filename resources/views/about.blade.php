<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang — EduTrack</title>
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

        body { font-family: 'DM Sans', sans-serif; background: var(--bg); color: var(--ink); min-height: 100vh; }

        nav {
            padding: 1.2rem 2.5rem;
            display: flex; align-items: center; justify-content: space-between;
            border-bottom: 1px solid var(--border);
            position: sticky; top: 0;
            background: rgba(13,15,20,0.85);
            backdrop-filter: blur(12px);
            z-index: 100;
        }
        .brand { font-family: 'DM Serif Display', serif; font-size: 1.25rem; color: var(--ink); text-decoration: none; display: flex; align-items: center; gap: 0.4rem; }
        .brand-dot { width: 7px; height: 7px; border-radius: 50%; background: var(--accent); display: inline-block; }
        .nav-links { display: flex; gap: 0.2rem; list-style: none; }
        .nav-links a { font-size: 0.82rem; font-weight: 500; color: var(--muted); text-decoration: none; padding: 0.45rem 0.9rem; border-radius: 6px; transition: all 0.2s; }
        .nav-links a:hover, .nav-links a.active { color: var(--ink); background: var(--surface2); }

        .page { max-width: 860px; margin: 4rem auto; padding: 0 2rem; display: flex; flex-direction: column; gap: 2rem; }

        /* HERO */
        .hero-about {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 3rem;
            align-items: center;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 3rem;
            overflow: hidden;
            position: relative;
        }
        .hero-about::before {
            content: '';
            position: absolute;
            top: -80px; right: -80px;
            width: 250px; height: 250px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(110,231,183,0.05), transparent 70%);
            pointer-events: none;
        }
        .hero-eyebrow {
            display: inline-flex; align-items: center; gap: 0.5rem;
            font-size: 0.7rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;
            color: var(--accent); margin-bottom: 1rem;
            background: rgba(110,231,183,0.08); border: 1px solid rgba(110,231,183,0.2);
            padding: 0.3rem 0.75rem; border-radius: 20px;
        }
        .hero-title {
            font-family: 'DM Serif Display', serif;
            font-size: 2.4rem; line-height: 1.1; letter-spacing: -0.02em; margin-bottom: 1rem;
        }
        .hero-title em { font-style: italic; color: var(--accent); }
        .hero-desc { font-size: 0.88rem; line-height: 1.75; color: var(--muted); }

        /* visual block */
        .vis-block {
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 2rem;
            display: flex; flex-direction: column; gap: 1rem;
        }
        .vis-label { font-size: 0.68rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; color: var(--muted); }
        .vis-num { font-family: 'DM Serif Display', serif; font-size: 3rem; color: var(--accent); line-height: 1; }
        .vis-sub { font-size: 0.78rem; color: var(--muted); line-height: 1.6; }
        .vis-divider { height: 1px; background: var(--border); }
        .vis-tag { display: inline-flex; padding: 0.25rem 0.65rem; border-radius: 20px; font-size: 0.7rem; font-weight: 600; background: rgba(56,189,248,0.1); color: var(--accent2); border: 1px solid rgba(56,189,248,0.2); }

        /* MISSION */
        .mission-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2.5rem;
        }
        .sec-label { font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.12em; color: var(--muted); margin-bottom: 0.75rem; }
        .card-title { font-family: 'DM Serif Display', serif; font-size: 1.5rem; margin-bottom: 1rem; }
        .card-desc { font-size: 0.875rem; line-height: 1.75; color: var(--muted); }
        .card-desc + .card-desc { margin-top: 0.75rem; }

        /* VALUES */
        .values-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1px;
            background: var(--border);
            border-radius: 16px;
            overflow: hidden;
        }
        .value-card {
            background: var(--surface);
            padding: 2rem;
            transition: background 0.2s;
        }
        .value-card:hover { background: var(--surface2); }
        .value-num {
            font-family: 'DM Serif Display', serif;
            font-size: 2.5rem;
            color: rgba(110,231,183,0.15);
            line-height: 1;
            margin-bottom: 0.75rem;
        }
        .value-title { font-size: 0.92rem; font-weight: 600; margin-bottom: 0.4rem; }
        .value-desc { font-size: 0.8rem; line-height: 1.7; color: var(--muted); }

        /* TEAM */
        .team-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2.5rem;
        }
        .team-inner {
            display: flex;
            align-items: center;
            gap: 2rem;
        }
        .team-avatar-placeholder {
            width: 72px; height: 72px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(110,231,183,0.2), rgba(56,189,248,0.2));
            border: 2px solid rgba(110,231,183,0.3);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.75rem;
            flex-shrink: 0;
        }
        .team-name { font-family: 'DM Serif Display', serif; font-size: 1.2rem; margin-bottom: 0.25rem; }
        .team-role { font-size: 0.75rem; font-weight: 600; color: var(--accent); text-transform: uppercase; letter-spacing: 0.08em; }
        .team-desc { font-size: 0.83rem; color: var(--muted); margin-top: 0.4rem; line-height: 1.65; }

        /* CTA */
        .cta-card {
            background: linear-gradient(135deg, #0d1a18, #0a1520);
            border: 1px solid rgba(110,231,183,0.2);
            border-radius: 16px;
            padding: 3rem 2.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .cta-card::before {
            content: '';
            position: absolute;
            bottom: -60px; left: 50%;
            transform: translateX(-50%);
            width: 300px; height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(110,231,183,0.07), transparent 70%);
            pointer-events: none; /* tambahan fix */
        }
        .cta-title { font-family: 'DM Serif Display', serif; font-size: 1.9rem; margin-bottom: 0.5rem; }
        .cta-title em { font-style: italic; color: var(--accent); }
        .cta-desc { font-size: 0.85rem; color: var(--muted); margin-bottom: 1.75rem; line-height: 1.65; }

        /* FIX: tambah position relative dan z-index supaya tombol bisa diklik */
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
            position: relative;
            z-index: 1;
        }
        .btn-primary { background: var(--accent); color: #0d0f14; }
        .btn-primary:hover { background: #4ade80; }

        @media (max-width: 640px) {
            .hero-about { grid-template-columns: 1fr; }
            .values-grid { grid-template-columns: 1fr; }
            .team-inner { flex-direction: column; align-items: flex-start; }
        }
    </style>
</head>
<body>

<nav>
    <a href="{{ url('/') }}" class="brand"><span class="brand-dot"></span>EduTrack</a>
    <ul class="nav-links">
        <li><a href="{{ url('/') }}">Beranda</a></li>
        <li><a href="{{ url('/about') }}" class="active">Tentang</a></li>
        <li><a href="{{ url('/fitur') }}">Fitur</a></li>
        <li><a href="{{ url('/profile') }}">Profil</a></li>
    </ul>
</nav>

<div class="page">

    <!-- HERO -->
    <div class="hero-about">
        <div>
            <div class="hero-eyebrow">Tentang EduTrack</div>
            <h1 class="hero-title">Belajar lebih cerdas,<br><em>bukan lebih keras.</em></h1>
            <p class="hero-desc">EduTrack lahir dari kebutuhan nyata para pelajar yang ingin melacak kemajuan belajar mereka secara sistematis. Kami percaya setiap langkah kecil dalam belajar layak untuk dicatat dan dirayakan.</p>
        </div>
        <div class="vis-block">
            <div class="vis-label">Pelajar Aktif</div>
            <div class="vis-num">10k+</div>
            <div class="vis-sub">bergabung sejak platform diluncurkan</div>
            <div class="vis-divider"></div>
            <div class="vis-label">Status</div>
            <div><span class="vis-tag">✓ Platform Aktif</span></div>
        </div>
    </div>

    <!-- MISSION -->
    <div class="mission-card">
        <p class="sec-label">Misi Kami</p>
        <h2 class="card-title">Mengapa EduTrack ada?</h2>
        <p class="card-desc">Kami hadir untuk membantu pelajar Indonesia melacak dan mengoptimalkan proses belajar mereka. Dengan data yang terstruktur, belajar menjadi lebih terarah dan terukur hasilnya.</p>
        <p class="card-desc">EduTrack menyediakan tools sederhana namun powerful untuk mencatat materi, memantau progress, dan merayakan setiap pencapaian belajarmu — karena setiap langkah kecil itu berarti.</p>
    </div>

    <!-- VALUES -->
    <div>
        <p class="sec-label" style="margin-bottom:1rem;">Nilai Kami</p>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-num">01</div>
                <div class="value-title">Konsistensi</div>
                <p class="value-desc">Belajar sedikit setiap hari lebih baik daripada belajar banyak tapi jarang. Bangun kebiasaan, bukan hanya semangat sesaat.</p>
            </div>
            <div class="value-card">
                <div class="value-num">02</div>
                <div class="value-title">Transparansi</div>
                <p class="value-desc">Lihat progress belajarmu secara jelas dan jujur, tanpa ilusi. Data adalah cermin terbaik untuk pertumbuhan.</p>
            </div>
            <div class="value-card">
                <div class="value-num">03</div>
                <div class="value-title">Pertumbuhan</div>
                <p class="value-desc">Setiap hari adalah kesempatan untuk menjadi versi diri yang lebih baik. Tidak ada pertumbuhan yang terlalu kecil.</p>
            </div>
        </div>
    </div>

    <!-- TEAM -->
    <div class="team-card">
        <p class="sec-label" style="margin-bottom:1.25rem;">Di Baliknya</p>
        <div class="team-inner">
            <div class="team-avatar-placeholder">🎓</div>
            <div>
                <div class="team-name">{{ session('profile_name', 'Pelajar EduTrack') }}</div>
                <div class="team-role">{{ session('profile_role', 'Pengguna Aktif') }}</div>
                <div class="team-desc">{{ session('profile_bio', 'Bergabung di EduTrack untuk mendokumentasikan perjalanan belajar dan terus berkembang setiap harinya.') }}</div>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="cta-card">
        <h2 class="cta-title">Siap mulai<br><em>belajar dengan data?</em></h2>
        <p class="cta-desc">Lihat fitur atau mulai perjalanan belajarmu sekarang.</p>
        <a href="{{ url('/fitur') }}" class="btn btn-primary">Lihat Fitur →</a>
    </div>

</div>

</body>
</html>