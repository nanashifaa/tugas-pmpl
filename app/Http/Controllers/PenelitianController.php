<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use Illuminate\Http\Request;

class PenelitianController extends Controller
{
    public function index()
    {
        $penelitian = Penelitian::latest()->get();

        return view('penelitian.index', compact('penelitian'));
    }

    public function create()
    {
        return view('penelitian.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'anggota' => 'required|string|max:255',
            'tema' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2000|max:2026',
            'hibah' => 'required|string|max:255',
            'luaran' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ], [
            'judul.required' => 'Judul penelitian wajib diisi.',
            'anggota.required' => 'Anggota penelitian wajib diisi.',
            'tema.required' => 'Tema penelitian wajib diisi.',
            'tahun.required' => 'Tahun penelitian wajib diisi.',
            'tahun.integer' => 'Tahun penelitian harus berupa angka.',
            'tahun.min' => 'Tahun penelitian tidak valid.',
            'tahun.max' => 'Tahun penelitian tidak valid.',
            'hibah.required' => 'Hibah penelitian wajib diisi.',
            'luaran.required' => 'Luaran penelitian wajib diisi.',
            'status.required' => 'Status penelitian wajib diisi.',
        ]);

        // Simulasi dosen yang sedang login.
        // Karena Modul 7 hanya fokus implementasi satu fitur utama.
        $validatedData['id_user'] = 1;

        Penelitian::create($validatedData);

        return redirect()
            ->route('penelitian.index')
            ->with('success', 'Data penelitian berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penelitian = Penelitian::findOrFail($id);
        return view('penelitian.edit', compact('penelitian'));
    }

    public function update(Request $request, $id)
    {
        $penelitian = Penelitian::findOrFail($id);

        $request->validate([
            'judul'   => 'required|string|max:255',
            'anggota' => 'required|string|max:255',
            'tahun'   => 'required|integer|min:2000|max:2099',
            'status'  => 'required|in:Aktif,Selesai',
        ]);

        $penelitian->update($request->only(['judul', 'anggota', 'tahun', 'status']));

        return redirect()->route('dashboard')->with('success', 'Penelitian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Penelitian::findOrFail($id)->delete();
        return redirect()->route('dashboard')->with('success', 'Penelitian berhasil dihapus.');
    }
}