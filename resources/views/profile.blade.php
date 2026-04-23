<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil — EduTrack</title>
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

        .alert-success { background: rgba(110,231,183,0.08); border: 1px solid rgba(110,231,183,0.25); color: var(--accent); padding: 0.9rem 1.25rem; border-radius: 10px; font-size: 0.83rem; }

        .sec-label { font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.12em; color: var(--muted); margin-bottom: 0.75rem; }

        /* HERO */
        .profile-hero {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2.5rem;
            display: flex;
            align-items: flex-start;
            gap: 2rem;
        }
        .avatar-wrap {
            position: relative;
            flex-shrink: 0;
        }
        .avatar-circle {
            width: 80px; height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(110,231,183,0.25), rgba(56,189,248,0.25));
            border: 2px solid rgba(110,231,183,0.3);
            display: flex; align-items: center; justify-content: center;
            font-size: 2rem;
            box-shadow: 0 0 0 4px rgba(110,231,183,0.05);
        }
        .avatar-status {
            position: absolute;
            bottom: 3px; right: 3px;
            width: 14px; height: 14px;
            border-radius: 50%;
            background: var(--accent);
            border: 2px solid var(--surface);
            animation: pulse-dot 2s infinite;
        }
        @keyframes pulse-dot {
            0%,100% { box-shadow: 0 0 0 0 rgba(110,231,183,0.4); }
            50% { box-shadow: 0 0 0 5px rgba(110,231,183,0); }
        }
        .profile-name { font-family: 'DM Serif Display', serif; font-size: 1.7rem; letter-spacing: -0.02em; line-height: 1.1; margin-bottom: 0.35rem; }
        .profile-role {
            font-size: 0.8rem; color: var(--muted);
            display: flex; align-items: center; gap: 0.5rem;
            margin-bottom: 0.9rem;
        }
        .role-dot { width: 3px; height: 3px; border-radius: 50%; background: var(--border); }
        .active-badge {
            display: inline-flex; align-items: center; gap: 0.3rem;
            background: rgba(110,231,183,0.1); color: var(--accent);
            font-size: 0.68rem; font-weight: 700;
            padding: 0.2rem 0.6rem; border-radius: 20px;
            border: 1px solid rgba(110,231,183,0.2);
        }
        .active-badge::before { content: ''; width: 5px; height: 5px; border-radius: 50%; background: var(--accent); animation: blink 2s infinite; }
        @keyframes blink { 0%,100%{opacity:1} 50%{opacity:0.2} }
        .profile-bio { font-size: 0.875rem; line-height: 1.7; color: var(--muted); max-width: 440px; margin-bottom: 1.25rem; }
        .profile-actions { display: flex; gap: 0.6rem; }

        .btn { padding: 0.6rem 1.25rem; font-family: 'DM Sans', sans-serif; font-size: 0.82rem; font-weight: 600; border: none; cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; gap: 0.4rem; border-radius: 8px; transition: all 0.2s; }
        .btn-primary { background: var(--accent); color: #0d0f14; }
        .btn-primary:hover { background: #4ade80; }
        .btn-ghost { background: transparent; color: var(--muted); border: 1px solid var(--border); }
        .btn-ghost:hover { border-color: var(--muted); color: var(--ink); }

        /* STATS */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
        }
        .stat { padding: 1.5rem; text-align: center; position: relative; }
        .stat:not(:last-child)::after { content: ''; position: absolute; right: 0; top: 20%; height: 60%; width: 1px; background: var(--border); }
        .stat-num { font-family: 'DM Serif Display', serif; font-size: 2rem; color: var(--accent); line-height: 1; margin-bottom: 0.3rem; }
        .stat-lbl { font-size: 0.7rem; font-weight: 500; color: var(--muted); letter-spacing: 0.04em; }

        /* TWO COL */
        .two-col { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; }

        .detail-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2rem;
        }

        /* SKILLS */
        .skills { display: flex; flex-direction: column; gap: 1.1rem; }
        .skill-top { display: flex; justify-content: space-between; margin-bottom: 0.4rem; }
        .skill-name { font-size: 0.83rem; font-weight: 500; }
        .skill-pct { font-size: 0.75rem; color: var(--accent); font-weight: 600; }
        .skill-bar { height: 5px; background: var(--surface2); border-radius: 3px; overflow: hidden; }
        .skill-fill { height: 100%; border-radius: 3px; background: linear-gradient(90deg, var(--accent), var(--accent2)); animation: grow 1s cubic-bezier(.4,0,.2,1) both; }
        @keyframes grow { from { width: 0 !important; } }

        /* INFO LIST */
        .info-list { display: flex; flex-direction: column; gap: 1rem; }
        .info-row { display: flex; align-items: center; gap: 1rem; }
        .info-icon {
            width: 34px; height: 34px;
            background: var(--surface2); border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            font-size: 0.9rem;
        }
        .info-key { font-size: 0.68rem; color: var(--muted); display: block; margin-bottom: 0.05rem; }
        .info-val { font-size: 0.84rem; font-weight: 500; }

        .social-row { display: flex; gap: 0.5rem; margin-top: 1.25rem; padding-top: 1.25rem; border-top: 1px solid var(--border); }
        .social-btn {
            width: 34px; height: 34px;
            border-radius: 8px;
            background: var(--surface2); border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.68rem; font-weight: 700; color: var(--muted);
            text-decoration: none; transition: all 0.2s;
        }
        .social-btn:hover { background: var(--accent); color: #0d0f14; border-color: var(--accent); }

        @media (max-width: 640px) {
            .profile-hero { flex-direction: column; }
            .stats-row { grid-template-columns: repeat(2,1fr); }
            .stat:nth-child(2)::after { display: none; }
            .two-col { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<nav>
    <a href="/" class="brand"><span class="brand-dot"></span>EduTrack</a>
    <ul class="nav-links">
        <li><a href="/">Beranda</a></li>
        <li><a href="/about">Tentang</a></li>
        <li><a href="/fitur">Fitur</a></li>
        <li><a href="/profile" class="active">Profil</a></li>
    </ul>
</nav>

<div class="page">

    @if(session('success'))
    <div class="alert-success">✓ {{ session('success') }}</div>
    @endif

    <!-- HERO -->
    <div class="profile-hero">
        <div class="avatar-wrap">
            <div class="avatar-circle">🎓</div>
            <div class="avatar-status"></div>
        </div>
        <div>
            <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.35rem;">
                <h1 class="profile-name">{{ session('profile_name', 'Pelajar EduTrack') }}</h1>
                <span class="active-badge">Aktif Belajar</span>
            </div>
            <p class="profile-role">
                {{ session('profile_role', 'Pelajar Aktif') }}
                <span class="role-dot"></span>
                {{ session('profile_institution', 'PENS') }}
            </p>
            <p class="profile-bio">{{ session('profile_bio', 'Pelajar yang semangat mendokumentasikan perjalanan belajar dan terus berkembang setiap harinya menggunakan EduTrack.') }}</p>
            <div class="profile-actions">
                <a href="/profile/edit" class="btn btn-primary">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    Edit Profil
                </a>
                <a href="/about" class="btn btn-ghost">Tentang EduTrack</a>
            </div>
        </div>
    </div>

    <!-- STATS -->
    <div class="stats-row">
        <div class="stat"><div class="stat-num">128</div><div class="stat-lbl">Hari Belajar</div></div>
        <div class="stat"><div class="stat-num">42</div><div class="stat-lbl">Materi Selesai</div></div>
        <div class="stat"><div class="stat-num">15</div><div class="stat-lbl">Target Tercapai</div></div>
        <div class="stat"><div class="stat-num">92%</div><div class="stat-lbl">Konsistensi</div></div>
    </div>

    <!-- TWO COL -->
    <div class="two-col">
        <div class="detail-card">
            <p class="sec-label">Progress Mata Pelajaran</p>
            <div class="skills">
                <div>
                    <div class="skill-top"><span class="skill-name">Matematika</span><span class="skill-pct">85%</span></div>
                    <div class="skill-bar"><div class="skill-fill" style="width:85%"></div></div>
                </div>
                <div>
                    <div class="skill-top"><span class="skill-name">Pemrograman</span><span class="skill-pct">90%</span></div>
                    <div class="skill-bar"><div class="skill-fill" style="width:90%;animation-delay:.08s"></div></div>
                </div>
                <div>
                    <div class="skill-top"><span class="skill-name">Basis Data</span><span class="skill-pct">78%</span></div>
                    <div class="skill-bar"><div class="skill-fill" style="width:78%;animation-delay:.15s"></div></div>
                </div>
                <div>
                    <div class="skill-top"><span class="skill-name">Jaringan</span><span class="skill-pct">70%</span></div>
                    <div class="skill-bar"><div class="skill-fill" style="width:70%;animation-delay:.22s"></div></div>
                </div>
                <div>
                    <div class="skill-top"><span class="skill-name">Bahasa Inggris</span><span class="skill-pct">80%</span></div>
                    <div class="skill-bar"><div class="skill-fill" style="width:80%;animation-delay:.29s"></div></div>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <p class="sec-label">Informasi Pelajar</p>
            <div class="info-list">
                <div class="info-row">
                    <div class="info-icon">👤</div>
                    <div><span class="info-key">Nama</span><span class="info-val">{{ session('profile_name', 'Pelajar EduTrack') }}</span></div>
                </div>
                <div class="info-row">
                    <div class="info-icon">✉️</div>
                    <div><span class="info-key">Email</span><span class="info-val">{{ session('profile_email', '—') }}</span></div>
                </div>
                <div class="info-row">
                    <div class="info-icon">📍</div>
                    <div><span class="info-key">Lokasi</span><span class="info-val">{{ session('profile_location', 'Indonesia') }}</span></div>
                </div>
                <div class="info-row">
                    <div class="info-icon">🏫</div>
                    <div><span class="info-key">Institusi</span><span class="info-val">{{ session('profile_institution', 'PENS') }}</span></div>
                </div>
                <div class="info-row">
                    <div class="info-icon">📅</div>
                    <div><span class="info-key">Bergabung</span><span class="info-val">01 Jan 2024</span></div>
                </div>
            </div>
            <div class="social-row">
                <a href="#" class="social-btn" title="GitHub">GH</a>
                <a href="#" class="social-btn" title="LinkedIn">in</a>
                <a href="#" class="social-btn" title="Twitter">tw</a>
                <a href="#" class="social-btn" title="Instagram">ig</a>
            </div>
        </div>
    </div>

</div>

</body>
</html>