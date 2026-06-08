@extends('layouts.app')

@section('content')
<style>
    .form-wrapper {
        background-color: #f8f9fa;
        min-height: 100vh;
        padding: 2rem;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .form-container {
        max-width: 800px;
        margin: 0 auto;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        overflow: hidden;
    }
    .form-header {
        background-color: #9B2235;
        color: #ffffff;
        padding: 2rem;
        text-align: center;
    }
    .form-header h2 {
        margin: 0;
        font-size: 1.75rem;
        font-weight: 700;
    }
    .form-header p {
        margin: 0.5rem 0 0 0;
        font-size: 1rem;
        opacity: 0.9;
    }
    .form-body { padding: 2.5rem; }
    .form-group { margin-bottom: 1.5rem; }
    .form-group label {
        display: block;
        font-weight: 600;
        color: #333;
        margin-bottom: 0.5rem;
    }
    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 1rem;
        transition: border-color 0.2s, box-shadow 0.2s;
        box-sizing: border-box;
        background-color: #fff;
    }
    .form-control:focus {
        outline: none;
        border-color: #9B2235;
        box-shadow: 0 0 0 3px rgba(155, 34, 53, 0.1);
    }
    .form-control.is-invalid {
        border-color: #dc3545;
        background-color: #fff8f8;
    }
    .error-text {
        color: #dc3545;
        font-size: 0.85rem;
        margin-top: 0.4rem;
        font-weight: 500;
    }
    .btn-container {
        display: flex;
        gap: 1rem;
        margin-top: 2.5rem;
    }
    .btn-submit {
        background-color: #9B2235;
        color: #ffffff;
        border: none;
        padding: 0.85rem 1.5rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.2s;
        flex: 1;
        text-align: center;
    }
    .btn-submit:hover { background-color: #7A1A2A; }
    .btn-cancel {
        background-color: #ffffff;
        color: #555;
        border: 1px solid #ccc;
        padding: 0.85rem 1.5rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s;
        text-decoration: none;
        text-align: center;
        flex: 1;
    }
    .btn-cancel:hover {
        background-color: #f1f1f1;
        color: #333;
    }
</style>

<div class="form-wrapper">
    <div style="max-width: 800px; margin: 0 auto 1rem;">
        <a href="{{ route('dashboard') }}" style="font-size: 0.875rem; font-weight: 600; color: #9B2235; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
            &#8592; Kembali ke Dashboard
        </a>
    </div>

    <div class="form-container">
        <div class="form-header">
            <h2>Edit Data Penelitian</h2>
            <p>Perbarui data penelitian yang sudah ada</p>
        </div>

        <div class="form-body">
            <form action="{{ route('penelitian.update', $penelitian->id_penelitian) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="judul">Judul Penelitian</label>
                    <input type="text" name="judul" id="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul', $penelitian->judul) }}">
                    @error('judul')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="anggota">Anggota</label>
                    <input type="text" name="anggota" id="anggota"
                        class="form-control @error('anggota') is-invalid @enderror"
                        value="{{ old('anggota', $penelitian->anggota) }}">
                    @error('anggota')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tema">Tema</label>
                    <input type="text" name="tema" id="tema"
                        class="form-control @error('tema') is-invalid @enderror"
                        value="{{ old('tema', $penelitian->tema) }}">
                    @error('tema')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="number" name="tahun" id="tahun"
                        class="form-control @error('tahun') is-invalid @enderror"
                        value="{{ old('tahun', $penelitian->tahun) }}">
                    @error('tahun')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="hibah">Hibah</label>
                    <input type="text" name="hibah" id="hibah"
                        class="form-control @error('hibah') is-invalid @enderror"
                        value="{{ old('hibah', $penelitian->hibah) }}">
                    @error('hibah')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="luaran">Luaran</label>
                    <input type="text" name="luaran" id="luaran"
                        class="form-control @error('luaran') is-invalid @enderror"
                        value="{{ old('luaran', $penelitian->luaran) }}">
                    @error('luaran')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status"
                        class="form-control @error('status') is-invalid @enderror">
                        <option value="">-- Pilih Status --</option>
                        <option value="Aktif"   {{ old('status', $penelitian->status) == 'Aktif'   ? 'selected' : '' }}>Aktif</option>
                        <option value="Selesai" {{ old('status', $penelitian->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="Draft"   {{ old('status', $penelitian->status) == 'Draft'   ? 'selected' : '' }}>Draft</option>
                    </select>
                    @error('status')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="btn-container">
                    <a href="{{ route('dashboard') }}" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection