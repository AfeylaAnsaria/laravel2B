<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitur — EduTrack</title>
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

        nav { padding: 1.2rem 2.5rem; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid var(--border); position: sticky; top: 0; background: rgba(13,15,20,0.85); backdrop-filter: blur(12px); z-index: 100; }
        .brand { font-family: 'DM Serif Display', serif; font-size: 1.25rem; color: var(--ink); text-decoration: none; display: flex; align-items: center; gap: 0.4rem; }
        .brand-dot { width: 7px; height: 7px; border-radius: 50%; background: var(--accent); }
        .nav-links { display: flex; gap: 0.2rem; list-style: none; }
        .nav-links a { font-size: 0.82rem; font-weight: 500; color: var(--muted); text-decoration: none; padding: 0.45rem 0.9rem; border-radius: 6px; transition: all 0.2s; }
        .nav-links a:hover, .nav-links a.active { color: var(--ink); background: var(--surface2); }

        .page { max-width: 860px; margin: 4rem auto; padding: 0 2rem; display: flex; flex-direction: column; gap: 2rem; }

        .sec-label { font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.12em; color: var(--muted); margin-bottom: 0.75rem; }

        /* HERO */
        .hero-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 3rem;
            position: relative;
            overflow: hidden;
        }
        .hero-card::after {
            content: '⚡';
            position: absolute;
            right: 2rem; top: 50%;
            transform: translateY(-50%);
            font-size: 7rem;
            opacity: 0.04;
            pointer-events: none;
        }
        .hero-title { font-family: 'DM Serif Display', serif; font-size: 2.4rem; line-height: 1.1; letter-spacing: -0.02em; margin-bottom: 0.75rem; }
        .hero-title em { font-style: italic; color: var(--accent); }
        .hero-desc { font-size: 0.9rem; line-height: 1.75; color: var(--muted); max-width: 480px; }

        /* FEATURES BIG GRID */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1px;
            background: var(--border);
            border-radius: 16px;
            overflow: hidden;
        }
        .feature-item {
            background: var(--surface);
            padding: 2rem;
            transition: background 0.2s;
            position: relative;
        }
        .feature-item:hover { background: var(--surface2); }
        .feature-badge {
            display: inline-flex;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 0.2rem 0.55rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        .badge-green { background: rgba(110,231,183,0.12); color: var(--accent); }
        .badge-blue { background: rgba(56,189,248,0.12); color: var(--accent2); }
        .badge-pink { background: rgba(244,114,182,0.12); color: var(--accent3); }
        .badge-warn { background: rgba(251,191,36,0.12); color: var(--warn); }
        .badge-purple { background: rgba(167,139,250,0.12); color: #a78bfa; }
        .badge-gray { background: var(--surface2); color: var(--muted); }

        .feature-icon { font-size: 1.75rem; margin-bottom: 0.75rem; }
        .feature-title { font-size: 0.92rem; font-weight: 600; margin-bottom: 0.4rem; }
        .feature-desc { font-size: 0.79rem; line-height: 1.7; color: var(--muted); }

        /* HIGHLIGHT ROW */
        .highlight-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
        }
        .highlight-item {
            padding: 2rem;
            text-align: center;
            position: relative;
        }
        .highlight-item:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0; top: 20%; height: 60%;
            width: 1px;
            background: var(--border);
        }
        .highlight-num { font-family: 'DM Serif Display', serif; font-size: 2.4rem; color: var(--accent); line-height: 1; margin-bottom: 0.3rem; }
        .highlight-lbl { font-size: 0.74rem; color: var(--muted); font-weight: 500; }

        /* DETAIL TABLE */
        .detail-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
        }
        .detail-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--border);
        }
        .detail-title { font-family: 'DM Serif Display', serif; font-size: 1.2rem; }
        .detail-table { width: 100%; border-collapse: collapse; }
        .detail-table th {
            padding: 0.75rem 1.5rem;
            text-align: left;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--muted);
            background: var(--surface2);
            border-bottom: 1px solid var(--border);
        }
        .detail-table td {
            padding: 0.85rem 1.5rem;
            font-size: 0.83rem;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }
        .detail-table tr:last-child td { border-bottom: none; }
        .detail-table tr:hover td { background: var(--surface2); }
        .status-badge {
            display: inline-flex; align-items: center; gap: 0.3rem;
            font-size: 0.7rem; font-weight: 600;
            padding: 0.2rem 0.65rem; border-radius: 20px;
        }
        .status-done { background: rgba(110,231,183,0.12); color: var(--accent); }
        .status-soon { background: rgba(251,191,36,0.12); color: var(--warn); }

        /* CTA */
        .cta-card { background: linear-gradient(135deg, #0d1a18, #0a1520); border: 1px solid rgba(110,231,183,0.2); border-radius: 16px; padding: 3rem 2.5rem; text-align: center; }
        .cta-title { font-family: 'DM Serif Display', serif; font-size: 1.9rem; margin-bottom: 0.5rem; }
        .cta-title em { font-style: italic; color: var(--accent); }
        .cta-desc { font-size: 0.85rem; color: var(--muted); margin-bottom: 1.75rem; line-height: 1.65; }

        .btn { padding: 0.7rem 1.5rem; font-family: 'DM Sans', sans-serif; font-size: 0.85rem; font-weight: 600; border: none; cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; gap: 0.45rem; border-radius: 8px; transition: all 0.2s; }
        .btn-primary { background: var(--accent); color: #0d0f14; }
        .btn-primary:hover { background: #4ade80; }

        @media (max-width: 640px) {
            .features-grid { grid-template-columns: 1fr; }
            .highlight-row { grid-template-columns: 1fr; }
            .highlight-item::after { display: none !important; }
        }
    </style>
</head>
<body>

<nav>
    <a href="/" class="brand"><span class="brand-dot"></span>EduTrack</a>
    <ul class="nav-links">
        <li><a href="/">Beranda</a></li>
        <li><a href="/about">Tentang</a></li>
        <li><a href="/fitur" class="active">Fitur</a></li>
        <li><a href="/profile">Profil</a></li>
    </ul>
</nav>

<div class="page">

    <!-- HERO -->
    <div class="hero-card">
        <p class="sec-label">Fitur Unggulan</p>
        <h1 class="hero-title">Semua yang kamu butuhkan<br><em>untuk belajar lebih baik.</em></h1>
        <p class="hero-desc">EduTrack hadir dengan fitur-fitur yang dirancang khusus untuk membantu pelajar Indonesia mencapai potensi terbaik mereka.</p>
    </div>

    <!-- FEATURES GRID -->
    <div class="features-grid">
        <div class="feature-item">
            <div class="feature-badge badge-green">Inti</div>
            <div class="feature-icon">📚</div>
            <div class="feature-title">Manajemen Materi</div>
            <p class="feature-desc">Catat dan kelola semua materi pelajaran dalam satu tempat yang terorganisir.</p>
        </div>
        <div class="feature-item">
            <div class="feature-badge badge-blue">Analitik</div>
            <div class="feature-icon">📊</div>
            <div class="feature-title">Tracking Progress</div>
            <p class="feature-desc">Pantau perkembangan belajarmu dengan grafik dan statistik yang mudah dipahami.</p>
        </div>
        <div class="feature-item">
            <div class="feature-badge badge-pink">Goal</div>
            <div class="feature-icon">🎯</div>
            <div class="feature-title">Target Belajar</div>
            <p class="feature-desc">Tetapkan target akademik dan lacak seberapa dekat kamu dengan tujuanmu.</p>
        </div>
        <div class="feature-item">
            <div class="feature-badge badge-warn">Reward</div>
            <div class="feature-icon">🏆</div>
            <div class="feature-title">Badge Pencapaian</div>
            <p class="feature-desc">Dapatkan badge untuk setiap milestone yang berhasil kamu capai dalam belajar.</p>
        </div>
        <div class="feature-item">
            <div class="feature-badge badge-purple">Jadwal</div>
            <div class="feature-icon">📅</div>
            <div class="feature-title">Jadwal Studi</div>
            <p class="feature-desc">Atur jadwal belajar harian dan mingguan agar waktu belajarmu lebih efisien.</p>
        </div>
        <div class="feature-item">
            <div class="feature-badge badge-gray">Catatan</div>
            <div class="feature-icon">📝</div>
            <div class="feature-title">Catatan Pintar</div>
            <p class="feature-desc">Buat catatan belajar yang terstruktur dan mudah dicari kapan saja.</p>
        </div>
    </div>

    <!-- STATS -->
    <div class="highlight-row">
        <div class="highlight-item">
            <div class="highlight-num">10k+</div>
            <div class="highlight-lbl">Pelajar Aktif</div>
        </div>
        <div class="highlight-item">
            <div class="highlight-num">500+</div>
            <div class="highlight-lbl">Materi Tersedia</div>
        </div>
        <div class="highlight-item">
            <div class="highlight-num">98%</div>
            <div class="highlight-lbl">Tingkat Kepuasan</div>
        </div>
    </div>

    <!-- DETAIL TABLE -->
    <div class="detail-card">
        <div class="detail-header">
            <div class="sec-label" style="margin-bottom:0.25rem;">Ringkasan Fitur</div>
            <div class="detail-title">Fitur tersedia & roadmap</div>
        </div>
        <table class="detail-table">
            <thead>
                <tr>
                    <th>Fitur</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Manajemen Materi</strong></td>
                    <td style="color:var(--muted)">Kelola catatan pelajaran</td>
                    <td><span class="status-badge status-done">✓ Tersedia</span></td>
                </tr>
                <tr>
                    <td><strong>Tracking Progress</strong></td>
                    <td style="color:var(--muted)">Grafik perkembangan belajar</td>
                    <td><span class="status-badge status-done">✓ Tersedia</span></td>
                </tr>
                <tr>
                    <td><strong>Target Belajar</strong></td>
                    <td style="color:var(--muted)">Tetapkan & pantau tujuan</td>
                    <td><span class="status-badge status-done">✓ Tersedia</span></td>
                </tr>
                <tr>
                    <td><strong>Badge Pencapaian</strong></td>
                    <td style="color:var(--muted)">Reward setiap milestone</td>
                    <td><span class="status-badge status-done">✓ Tersedia</span></td>
                </tr>
                <tr>
                    <td><strong>Jadwal Studi</strong></td>
                    <td style="color:var(--muted)">Kelola jadwal harian & mingguan</td>
                    <td><span class="status-badge status-soon">⏳ Segera</span></td>
                </tr>
                <tr>
                    <td><strong>Ekspor Laporan</strong></td>
                    <td style="color:var(--muted)">Unduh ringkasan progress belajar</td>
                    <td><span class="status-badge status-soon">⏳ Segera</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- CTA -->
    <div class="cta-card">
        <h2 class="cta-title">Siap mencoba<br><em>semua fiturnya?</em></h2>
        <p class="cta-desc">Mulai perjalanan belajarmu sekarang dan rasakan perbedaannya.</p>
        <a href="/profile" class="btn btn-primary">Mulai Sekarang →</a>
    </div>

</div>

</body>
</html>