@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

    * { box-sizing: border-box; }

    .dashboard-wrapper {
        background-color: #f5f4f0;
        min-height: 100vh;
        padding: 2rem;
        font-family: 'Plus Jakarta Sans', 'Segoe UI', sans-serif;
    }

    .dashboard-container {
        max-width: 1100px;
        margin: 0 auto;
    }

    /* ── Topbar ── */
    .topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.75rem;
    }
    .topbar-brand {
        font-size: 0.85rem;
        font-weight: 600;
        color: #9B2235;
        text-transform: uppercase;
        letter-spacing: 1.5px;
    }
    .topbar-date {
        font-size: 0.8rem;
        color: #888;
    }

    /* ── Welcome Banner ── */
    .welcome-banner {
        background-color: #9B2235;
        border-radius: 14px;
        padding: 1.75rem 2rem;
        margin-bottom: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        overflow: hidden;
    }
    .welcome-banner::before {
        content: '';
        position: absolute;
        right: -40px;
        top: -40px;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255,255,255,0.06);
    }
    .welcome-banner::after {
        content: '';
        position: absolute;
        right: 60px;
        bottom: -60px;
        width: 130px;
        height: 130px;
        border-radius: 50%;
        background: rgba(255,255,255,0.04);
    }
    .welcome-text-main {
        color: #ffffff;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.3rem;
    }
    .welcome-text-sub {
        color: rgba(255,255,255,0.7);
        font-size: 0.875rem;
    }
    .welcome-badge {
        background: rgba(255,255,255,0.15);
        border: 1px solid rgba(255,255,255,0.25);
        border-radius: 10px;
        padding: 0.6rem 1rem;
        text-align: center;
        color: #fff;
        font-size: 0.78rem;
        line-height: 1.4;
        z-index: 1;
        white-space: nowrap;
    }
    .welcome-badge strong {
        display: block;
        font-size: 1.4rem;
        font-weight: 700;
    }

    /* ── Stat Cards ── */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
        margin-bottom: 2rem;
    }
    .stat-card {
        background-color: #ffffff;
        padding: 1.25rem 1.5rem;
        border-radius: 12px;
        border: 1px solid #eaeaea;
        position: relative;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.07);
    }
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 4px;
        height: 100%;
        border-radius: 12px 0 0 12px;
    }
    .stat-card.total::before   { background: #9B2235; }
    .stat-card.aktif::before   { background: #1D9E75; }
    .stat-card.selesai::before { background: #378ADD; }

    .stat-icon {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        margin-bottom: 1rem;
    }
    .stat-card.total .stat-icon   { background: #f8e8ea; color: #9B2235; }
    .stat-card.aktif .stat-icon   { background: #e1f5ee; color: #0F6E56; }
    .stat-card.selesai .stat-icon { background: #e6f1fb; color: #185FA5; }

    .stat-label {
        font-size: 0.75rem;
        color: #888;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.6px;
        margin-bottom: 0.3rem;
    }
    .stat-value {
        font-size: 2.2rem;
        font-weight: 700;
        color: #1a1a1a;
        line-height: 1;
    }
    .stat-sub {
        font-size: 0.75rem;
        color: #aaa;
        margin-top: 0.3rem;
    }

    /* ── Content Section ── */
    .content-section {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #eaeaea;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.25rem;
    }
    .section-title {
        font-size: 1rem;
        font-weight: 700;
        color: #1a1a1a;
    }

    /* ── Empty State ── */
    .empty-state {
        text-align: center;
        padding: 2.5rem 1rem;
        border: 1.5px dashed #e0e0e0;
        border-radius: 10px;
        color: #aaa;
    }
    .empty-state svg {
        width: 40px;
        height: 40px;
        margin: 0 auto 0.75rem;
        display: block;
        opacity: 0.35;
    }
    .empty-state p {
        font-size: 0.9rem;
        margin-bottom: 0.25rem;
        color: #999;
    }
    .empty-state small {
        font-size: 0.8rem;
        color: #bbb;
    }

    /* ── Research Items ── */
    .research-item {
        border: 1px solid #f0f0f0;
        background: #fafafa;
        padding: 1rem 1.25rem;
        margin-bottom: 0.75rem;
        border-radius: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: background-color 0.2s;
    }
    .research-item:last-of-type { margin-bottom: 0; }
    .research-item:hover { background-color: #f0f0ee; }
    .research-title {
        font-weight: 600;
        color: #222;
        font-size: 0.95rem;
        margin-bottom: 0.2rem;
    }
    .research-meta {
        color: #888;
        font-size: 0.82rem;
    }
    .research-status {
        background-color: #f0f0f0;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.78rem;
        font-weight: 600;
        color: #555;
        white-space: nowrap;
        flex-shrink: 0;
    }
    .research-status.aktif   { background: #e1f5ee; color: #0F6E56; }
    .research-status.selesai { background: #e6f1fb; color: #185FA5; }

    /* ── Buttons ── */
    .btn-maroon {
        background-color: #9B2235;
        color: #ffffff;
        border: none;
        padding: 0.6rem 1.25rem;
        font-size: 0.875rem;
        font-weight: 600;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.2s, transform 0.1s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
    }
    .btn-maroon:hover {
        background-color: #7A1A2A;
        color: #fff;
        text-decoration: none;
    }
    .btn-maroon:active { transform: scale(0.98); }

    .btn-action {
        height: 30px;
        padding: 0 0.75rem;
        border-radius: 7px;
        border: 1px solid #eee;
        background: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.78rem;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.15s, border-color 0.15s;
    }
    .btn-action.edit   { color: #b07d00; }
    .btn-action.delete { color: #c0392b; }
    .btn-action.edit:hover   { background: #fff8e1; border-color: #f0c040; }
    .btn-action.delete:hover { background: #fdecea; border-color: #e57373; }

    @media (max-width: 768px) {
        .stats-grid    { grid-template-columns: 1fr; }
        .welcome-badge { display: none; }
    }
</style>

<div class="dashboard-wrapper">
    <div class="dashboard-container">

        {{-- Topbar --}}
        <div class="topbar">
            <span class="topbar-brand">Sistem Manajemen Penelitian</span>
            <div style="display: flex; align-items: center; gap: 1rem;">
                <span class="topbar-date" id="js-date"></span>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" style="background: none; border: 1px solid #ddd; border-radius: 6px; padding: 0.3rem 0.75rem; font-size: 0.8rem; color: #888; cursor: pointer; font-family: inherit;">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        {{-- Welcome Banner --}}
        <div class="welcome-banner">
            <div>
                <div class="welcome-text-main">Selamat datang, {{ $user->name }}!</div>
                <div class="welcome-text-sub">Kelola dan pantau data penelitian Anda di sini.</div>
            </div>
            <div class="welcome-badge">
                <strong id="js-day">—</strong>
                <span id="js-month-year">—</span>
            </div>
        </div>

        {{-- Stat Cards --}}
        <div class="stats-grid">
            <div class="stat-card total">
                <div class="stat-icon">📋</div>
                <div class="stat-label">Total Penelitian</div>
                <div class="stat-value">{{ $total }}</div>
                <div class="stat-sub">Semua data penelitian</div>
            </div>
            <div class="stat-card aktif">
                <div class="stat-icon">🟢</div>
                <div class="stat-label">Aktif</div>
                <div class="stat-value">{{ $aktif }}</div>
                <div class="stat-sub">Sedang berjalan</div>
            </div>
            <div class="stat-card selesai">
                <div class="stat-icon">✅</div>
                <div class="stat-label">Selesai</div>
                <div class="stat-value">{{ $selesai }}</div>
                <div class="stat-sub">Telah diselesaikan</div>
            </div>
        </div>

        {{-- Penelitian Terbaru --}}
        <div class="content-section">
            <div class="section-header">
                <span class="section-title">Penelitian Terbaru</span>
                @if(auth()->user()->role === 'dosen')
                    <a href="{{ route('penelitian.create') }}" class="btn-maroon">+ Tambah</a>
                @endif
            </div>

            @forelse($recent as $p)
            <div class="research-item">
                <div style="flex: 1; min-width: 0;">
                    <div class="research-title">{{ $p->judul }}</div>
                    <div class="research-meta">{{ $p->anggota }} &bull; {{ $p->tahun }}</div>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem; margin-left: 1rem; flex-shrink: 0;">
                    <span class="research-status {{ strtolower($p->status) }}">{{ $p->status }}</span>

                    @if(auth()->user()->role === 'dosen')
                        {{-- Tombol Edit --}}
                        <a href="{{ route('penelitian.edit', $p->id_penelitian) }}" class="btn-action edit">Edit</a>

                         {{-- Tombol Delete --}}
                        <form action="{{ route('penelitian.destroy', $p->id_penelitian) }}" method="POST" onsubmit="return confirm('Hapus penelitian ini?')" style="margin: 0;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action delete">Delete</button>
                        </form>
                        @endif
                </div>
            </div>
            @empty
            <div class="empty-state">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-3-3v6M4.5 19.5l15-15M19.5 4.5l-15 15"/>
                    <rect x="3" y="3" width="18" height="18" rx="3"/>
                </svg>
                <p>Belum ada data penelitian</p>
                <small>Klik "Tambah" untuk memulai</small>
            </div>
            @endforelse

        </div>

    </div>
</div>

<script>
    const now = new Date();
    const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    document.getElementById('js-date').textContent =
        days[now.getDay()] + ', ' + now.getDate() + ' ' + months[now.getMonth()] + ' ' + now.getFullYear();
    document.getElementById('js-day').textContent = String(now.getDate()).padStart(2,'0');
    document.getElementById('js-month-year').textContent = months[now.getMonth()] + ' ' + now.getFullYear();
</script>
@endsection