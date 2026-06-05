@extends('layouts.app')

@section('content')
<style>
    .dashboard-wrapper {
        background-color: #f8f9fa;
        min-height: 100vh;
        padding: 2rem;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
    }
    .page-title {
        color: #333;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.2rem;
    }
    .welcome-text {
        color: #666;
        font-size: 1.1rem;
        margin-bottom: 2rem;
        border-bottom: 2px solid #eaeaea;
        padding-bottom: 1rem;
    }
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }
    .stat-card {
        background-color: #ffffff;
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        border-left: 5px solid #9B2235; 
        transition: transform 0.2s ease-in-out;
    }
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .stat-label {
        font-size: 0.9rem;
        color: #888;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    .stat-value {
        font-size: 2.5rem;
        font-weight: 700;
        color: #222;
        margin-top: 0.5rem;
    }
    .content-section {
        background-color: #ffffff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .section-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 1.5rem;
    }
    .btn-maroon {
        background-color: #9B2235; 
        color: #ffffff;
        border: none;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.2s;
        display: inline-block;
        text-decoration: none;
        margin-top: 1rem;
    }
    .btn-maroon:hover {
        background-color: #7A1A2A; 
    }
    /* Styling tambahan untuk list penelitian agar senada */
    .research-item {
        border: 1px solid #eaeaea;
        padding: 1.25rem;
        margin-bottom: 1rem;
        border-radius: 6px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: background-color 0.2s;
    }
    .research-item:hover {
        background-color: #fcfcfc;
    }
    .research-title {
        font-weight: 600;
        color: #333;
        font-size: 1.1rem;
        margin-bottom: 0.25rem;
    }
    .research-meta {
        color: #666;
        font-size: 0.9rem;
    }
    .research-status {
        background-color: #f0f0f0;
        padding: 0.35rem 0.85rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        color: #555;
    }
</style>

<div class="dashboard-wrapper">
    <div class="dashboard-container">
        
        <!-- Header & Greeting -->
        <h1 class="page-title">Dashboard</h1>
        <p class="welcome-text">Selamat datang, <strong>{{ $user->name }}</strong>!</p>

        <!-- Stats Grid (Total, Aktif, Selesai) -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Penelitian</div>
                <div class="stat-value">{{ $total }}</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-label">Aktif</div>
                <div class="stat-value">{{ $aktif }}</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-label">Selesai</div>
                <div class="stat-value">{{ $selesai }}</div>
            </div>
        </div>

        <!-- Recent Research & Button -->
        <div class="content-section">
            <h2 class="section-title">Penelitian Terbaru</h2>
            
            @foreach($recent as $p)
            <div class="research-item">
                <div>
                    <div class="research-title">{{ $p->judul }}</div>
                    <div class="research-meta">{{ $p->anggota }} &bull; {{ $p->tahun }}</div>
                </div>
                <div class="research-status">{{ $p->status }}</div>
            </div>
            @endforeach

            <a href="{{ route('penelitian.create') }}" class="btn-maroon">+ Tambah Data Penelitian</a>
        </div>

    </div>
</div>
@endsection