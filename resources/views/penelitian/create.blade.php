@extends('layouts.app')

@section('content')
    <div class="header">
        <h2>Form Tambah Data Penelitian</h2>
        <p>Masukkan data penelitian baru</p>
    </div>

    <div class="card">
        <form action="{{ route('penelitian.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="judul">Judul Penelitian</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul') }}">
                @error('judul')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="anggota">Anggota</label>
                <input type="text" name="anggota" id="anggota" value="{{ old('anggota') }}">
                @error('anggota')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tema">Tema</label>
                <input type="text" name="tema" id="tema" value="{{ old('tema') }}">
                @error('tema')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="number" name="tahun" id="tahun" value="{{ old('tahun') }}">
                @error('tahun')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="hibah">Hibah</label>
                <input type="text" name="hibah" id="hibah" value="{{ old('hibah') }}">
                @error('hibah')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="luaran">Luaran</label>
                <input type="text" name="luaran" id="luaran" value="{{ old('luaran') }}">
                @error('luaran')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="">-- Pilih Status --</option>
                    <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="Draft" {{ old('status') == 'Draft' ? 'selected' : '' }}>Draft</option>
                </select>
                @error('status')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('penelitian.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection