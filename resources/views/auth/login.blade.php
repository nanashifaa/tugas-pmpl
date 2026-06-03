@extends('layouts.app')

@section('content')
<div style="max-width:400px;margin:auto;margin-top:100px;">
    <h2 style="text-align:center;">Manajemen Data Penelitian Lab TEL</h2>

    @if ($errors->any())
        <div style="background:#f8d7da;color:#721c24;padding:10px;margin-bottom:10px;border-radius:5px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required style="width:100%;padding:8px;margin-bottom:10px;">
        <input type="password" name="password" placeholder="Password" required style="width:100%;padding:8px;margin-bottom:10px;">
        <button type="submit" style="width:100%;padding:10px;background:#ff4060;color:white;border:none;border-radius:5px;">Masuk</button>
    </form>
</div>
@endsection