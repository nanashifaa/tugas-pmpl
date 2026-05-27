@extends('layouts.app')

@section('content')
    <div class="header">
        <h2>Daftar Penelitian</h2>
        <p>Sistem Manajemen Data Penelitian Lab TEL</p>
    </div>

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="top-action">
        <a href="{{ route('penelitian.create') }}" class="btn btn-primary">
            + Tambah Data Penelitian
        </a>
    </div>

    @forelse ($penelitian as $item)
        <div class="card">
            <h3 class="data-title">{{ $item->judul }}</h3>

            <p><strong>Anggota:</strong> {{ $item->anggota }}</p>
            <p><strong>Tema:</strong> {{ $item->tema }}</p>
            <p><strong>Tahun:</strong> {{ $item->tahun }}</p>
            <p><strong>Hibah:</strong> {{ $item->hibah }}</p>
            <p><strong>Luaran:</strong> {{ $item->luaran }}</p>
            <p><strong>Status:</strong> <span class="badge">{{ $item->status }}</span></p>
        </div>
    @empty
        <div class="card">
            <p>Belum ada data penelitian.</p>
        </div>
    @endforelse
@endsection