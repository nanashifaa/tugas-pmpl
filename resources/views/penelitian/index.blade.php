@extends('layouts.app')

@section('content')
<style>
    .index-wrapper {
        background-color: #f8f9fa;
        min-height: 100vh;
        padding: 2rem;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .index-container {
        max-width: 1000px;
        margin: 0 auto;
    }
    .page-header {
        background-color: #9B2235; /* Warna Maroon */
        color: #ffffff;
        padding: 2rem;
        text-align: center;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .page-header h1 {
        margin: 0;
        font-size: 1.8rem;
        font-weight: 700;
    }
    .page-header p {
        margin: 0.5rem 0 0 0;
        opacity: 0.9;
    }
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        padding: 1rem 1.25rem;
        border-radius: 6px;
        border-left: 5px solid #28a745;
        margin-bottom: 1.5rem;
        font-weight: 500;
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
        margin-bottom: 1.5rem;
    }
    .btn-maroon:hover {
        background-color: #7A1A2A;
    }
    .research-card {
        background-color: #ffffff;
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        border: 1px solid #eaeaea;
        margin-bottom: 1rem;
        transition: transform 0.2s ease;
    }
    .research-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .research-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 1rem;
        border-bottom: 1px solid #eaeaea;
        padding-bottom: 0.5rem;
    }
    .research-detail {
        margin-bottom: 0.5rem;
        color: #444;
    }
    .research-detail strong {
        color: #222;
        display: inline-block;
        width: 80px;
    }
    .status-badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }
    .status-draft { background-color: #e2e3e5; color: #383d41; }
    .status-aktif { background-color: #cce5ff; color: #004085; }
    .status-selesai { background-color: #d4edda; color: #155724; }
</style>

<div class="index-wrapper">
    {{-- TAMBAHAN: tombol back ke dashboard --}}
    <div style="max-width: 800px; margin: 0 auto 1rem;">
        <a href="/dashboard" style="font-size: 0.875rem; font-weight: 600; color: #9B2235; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
            &#8592; Kembali ke Dashboard
        </a>
    </div> 
    
    <div class="index-container">
        
        <div class="page-header">
            <h1>Daftar Penelitian</h1>
            <p>Sistem Manajemen Data Penelitian Lab TEL</p>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('penelitian.create') }}" class="btn-maroon">+ Tambah Data Penelitian</a>

        @foreach($penelitian as $p)
        <div class="research-card">
            <div class="research-title">{{ $p->judul }}</div>
            <div class="research-detail"><strong>Anggota</strong>: {{ $p->anggota }}</div>
            <div class="research-detail"><strong>Tema</strong>: {{ $p->tema }}</div>
            <div class="research-detail"><strong>Tahun</strong>: {{ $p->tahun }}</div>
            <div class="research-detail"><strong>Hibah</strong>: {{ $p->hibah }}</div>
            <div class="research-detail"><strong>Luaran</strong>: {{ $p->luaran }}</div>
            
            <div class="research-detail" style="margin-top: 1rem;">
                <strong>Status</strong>: 
                <span class="status-badge 
                    {{ strtolower($p->status) == 'draft' ? 'status-draft' : '' }}
                    {{ strtolower($p->status) == 'aktif' ? 'status-aktif' : '' }}
                    {{ strtolower($p->status) == 'selesai' ? 'status-selesai' : '' }}
                ">
                    {{ $p->status }}
                </span>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection