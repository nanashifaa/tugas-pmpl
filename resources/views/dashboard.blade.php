@extends('layouts.app')

@section('content')
<h2>Dashboard</h2>
<p>Selamat datang, {{ $user->name }}!</p>

<div style="display:flex;gap:20px;margin-bottom:20px;">
    <div style="background:#ff4060;color:white;padding:20px;border-radius:10px;">Total: {{ $total }}</div>
    <div style="background:#ffc0cb;color:white;padding:20px;border-radius:10px;">Aktif: {{ $aktif }}</div>
    <div style="background:#ff9f9f;color:white;padding:20px;border-radius:10px;">Selesai: {{ $selesai }}</div>
</div>

<h3>Penelitian Terbaru</h3>
@foreach($recent as $p)
<div style="border:1px solid #ddd;padding:10px;margin-bottom:10px;border-radius:5px;display:flex;justify-content:space-between;">
    <div>
        <strong>{{ $p->judul }}</strong><br>
        {{ $p->anggota }} • {{ $p->tahun }}
    </div>
    <div>{{ $p->status }}</div>
</div>
@endforeach

<a href="{{ route('penelitian.create') }}" style="display:inline-block;padding:10px 15px;background:#ff4060;color:white;border-radius:5px;text-decoration:none;">+ Tambah Data Penelitian</a>
@endsection