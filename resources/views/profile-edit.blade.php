<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil — EduTrack</title>
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
            --danger: #f87171;
            --danger-bg: rgba(248,113,113,0.08);
        }

        body { font-family: 'DM Sans', sans-serif; background: var(--bg); color: var(--ink); min-height: 100vh; }

        nav { padding: 1.2rem 2.5rem; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid var(--border); position: sticky; top: 0; background: rgba(13,15,20,0.85); backdrop-filter: blur(12px); z-index: 100; }
        .brand { font-family: 'DM Serif Display', serif; font-size: 1.25rem; color: var(--ink); text-decoration: none; display: flex; align-items: center; gap: 0.4rem; }
        .brand-dot { width: 7px; height: 7px; border-radius: 50%; background: var(--accent); }
        .nav-links { display: flex; gap: 0.2rem; list-style: none; }
        .nav-links a { font-size: 0.82rem; font-weight: 500; color: var(--muted); text-decoration: none; padding: 0.45rem 0.9rem; border-radius: 6px; transition: all 0.2s; }
        .nav-links a:hover, .nav-links a.active { color: var(--ink); background: var(--surface2); }

        .page { max-width: 860px; margin: 4rem auto; padding: 0 2rem; display: flex; flex-direction: column; gap: 2rem; }

        .sec-label { font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.12em; color: var(--muted); margin-bottom: 0.5rem; }

        /* HEADER CARD */
        .header-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2rem 2.5rem;
            display: flex; align-items: center; justify-content: space-between; gap: 1.5rem;
        }
        .header-left h1 { font-family: 'DM Serif Display', serif; font-size: 1.6rem; letter-spacing: -0.02em; margin-bottom: 0.25rem; }
        .header-left h1 em { font-style: italic; color: var(--accent); }
        .header-left p { font-size: 0.83rem; color: var(--muted); }

        .back-btn {
            display: inline-flex; align-items: center; gap: 0.4rem;
            font-size: 0.82rem; font-weight: 500; color: var(--muted);
            text-decoration: none; padding: 0.55rem 1rem;
            border: 1px solid var(--border); border-radius: 8px;
            transition: all 0.2s; flex-shrink: 0;
        }
        .back-btn:hover { color: var(--ink); background: var(--surface2); }
        .back-btn svg { width: 14px; height: 14px; }

        /* FORM CARD */
        .form-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2.5rem;
        }

        .alert-success {
            background: rgba(110,231,183,0.08);
            border: 1px solid rgba(110,231,183,0.25);
            color: var(--accent);
            padding: 0.9rem 1.25rem;
            border-radius: 10px;
            font-size: 0.83rem;
            margin-bottom: 2rem;
        }

        /* AVATAR SECTION */
        .avatar-section {
            display: flex; align-items: center; gap: 1.5rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid var(--border);
            margin-bottom: 2rem;
        }
        .avatar-circle {
            width: 72px; height: 72px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(110,231,183,0.2), rgba(56,189,248,0.2));
            border: 2px solid rgba(110,231,183,0.3);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.75rem;
            flex-shrink: 0;
        }
        .avatar-info h3 { font-size: 0.9rem; font-weight: 600; margin-bottom: 0.2rem; }
        .avatar-info p { font-size: 0.78rem; color: var(--muted); line-height: 1.6; }
        .avatar-note {
            display: inline-flex; align-items: center; gap: 0.3rem;
            margin-top: 0.5rem;
            font-size: 0.72rem;
            color: var(--muted);
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 6px; padding: 0.25rem 0.7rem;
        }

        /* FORM */
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; }
        .form-group { display: flex; flex-direction: column; gap: 0.4rem; }
        .form-group.full { grid-column: 1 / -1; }

        label { font-size: 0.74rem; font-weight: 600; color: var(--ink); letter-spacing: 0.02em; }
        .required::after { content: ' *'; color: var(--danger); }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 0.65rem 0.95rem;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.85rem;
            color: var(--ink);
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 9px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        input:focus, textarea:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(110,231,183,0.1);
        }
        input::placeholder, textarea::placeholder { color: var(--muted); }
        textarea { resize: vertical; min-height: 90px; line-height: 1.6; }
        .field-hint { font-size: 0.71rem; color: var(--muted); }

        .section-divider {
            display: flex; align-items: center; gap: 1rem;
            margin: 2rem 0;
        }
        .section-divider hr { flex: 1; border: none; border-top: 1px solid var(--border); }
        .section-divider span {
            font-size: 0.68rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.1em;
            color: var(--muted); white-space: nowrap;
        }

        .form-actions {
            display: flex; align-items: center; justify-content: space-between; gap: 1rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
            margin-top: 2rem;
        }

        .btn { padding: 0.65rem 1.35rem; font-family: 'DM Sans', sans-serif; font-size: 0.83rem; font-weight: 600; border: none; cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; gap: 0.4rem; border-radius: 9px; transition: all 0.2s; }
        .btn svg { width: 14px; height: 14px; }
        .btn-primary { background: var(--accent); color: #0d0f14; }
        .btn-primary:hover { background: #4ade80; }
        .btn-ghost { background: transparent; color: var(--muted); border: 1px solid var(--border); }
        .btn-ghost:hover { background: var(--surface2); color: var(--ink); }

        @media (max-width: 640px) {
            .form-grid { grid-template-columns: 1fr; }
            .form-group.full { grid-column: 1; }
            .header-card { flex-direction: column; align-items: flex-start; }
            .avatar-section { flex-direction: column; align-items: flex-start; }
            .form-actions { flex-direction: column; align-items: stretch; }
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

    <!-- HEADER -->
    <div class="header-card">
        <div class="header-left">
            <p class="sec-label">Pengaturan Akun</p>
            <h1>Edit <em>Profil Saya</em></h1>
            <p>Perbarui informasi akun dan data belajarmu.</p>
        </div>
        <a href="/profile" class="back-btn">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
            Kembali
        </a>
    </div>

    <!-- FORM -->
    <div class="form-card">

        @if(session('success'))
        <div class="alert-success">✓ {{ session('success') }}</div>
        @endif

        <!-- AVATAR (no upload, display only) -->
        <div class="avatar-section">
            <div class="avatar-circle">🎓</div>
            <div class="avatar-info">
                <h3>Avatar Profil</h3>
                <p>Identitas visual akun belajarmu di EduTrack.</p>
                <div class="avatar-note">🔒 Avatar dihasilkan otomatis oleh sistem</div>
            </div>
        </div>

        <form method="POST" action="/profile/update">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group">
                    <label for="name" class="required">Nama Lengkap</label>
                    <input type="text" id="name" name="name"
                           value="{{ session('profile_name', '') }}"
                           placeholder="Nama lengkap" required>
                </div>
                <div class="form-group">
                    <label for="email" class="required">Email</label>
                    <input type="email" id="email" name="email"
                           value="{{ session('profile_email', '') }}"
                           placeholder="email@contoh.com" required>
                </div>
                <div class="form-group">
                    <label for="role">Status / Role</label>
                    <input type="text" id="role" name="role"
                           value="{{ session('profile_role', '') }}"
                           placeholder="Contoh: Pelajar Aktif">
                </div>
                <div class="form-group">
                    <label for="institution">Institusi</label>
                    <input type="text" id="institution" name="institution"
                           value="{{ session('profile_institution', '') }}"
                           placeholder="Contoh: PENS">
                </div>
                <div class="form-group">
                    <label for="location">Lokasi</label>
                    <input type="text" id="location" name="location"
                           value="{{ session('profile_location', '') }}"
                           placeholder="Contoh: Surabaya, Indonesia">
                </div>
                <div class="form-group">
                    <label for="website">Website / Portfolio</label>
                    <input type="text" id="website" name="website"
                           value="{{ session('profile_website', '') }}"
                           placeholder="https://portofolio.com">
                </div>
                <div class="form-group full">
                    <label for="bio">Bio Singkat</label>
                    <textarea id="bio" name="bio" placeholder="Ceritakan sedikit tentang tujuan belajarmu...">{{ session('profile_bio', '') }}</textarea>
                    <span class="field-hint">Maksimal 200 karakter.</span>
                </div>
            </div>

            <div class="section-divider">
                <hr><span>Ganti Password</span><hr>
            </div>

            <div class="form-grid">
                <div class="form-group full">
                    <label for="current_password">Password Saat Ini</label>
                    <input type="password" id="current_password" name="current_password"
                           placeholder="Kosongkan jika tidak ingin mengubah password">
                </div>
                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="password" id="password" name="password" placeholder="Min. 8 karakter">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password Baru</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password baru">
                </div>
            </div>

            <div class="form-actions">
                <a href="/profile" class="btn btn-ghost">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</div>

</body>
</html>