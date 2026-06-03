@extends('layouts.app')

@section('content')
<div style="max-width:400px;margin:auto;margin-top:100px;">
    <h2 style="text-align:center;">Manajemen Data Penelitian Lab TEL</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" class="btn" style="width:100%;background-color:#ff4060;">Masuk</button>
    </form>
</div>
@endsection