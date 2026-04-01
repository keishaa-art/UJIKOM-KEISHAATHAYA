<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index()
    {
        $alat = Alat::with('kategori')->get();
        return view('alat.index', compact('alat'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('alat.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_alat'=> 'required|max:255',
            'deskripsi' => 'required',
            'kondisi' => 'required',
            'status' => 'required',
            'id_kategori' => 'required|exists:kategoris,id',
        ]);

        $alat = Alat::create($validated);

        session()->flash('log', [
            now() . " - Menambahkan alat: " . $alat->nama_alat
        ]);

        return redirect()->route('alat.index');
    }

    public function edit(Alat $alat)
    {
        $kategori = Kategori::all();
        return view('alat.edit', compact('alat', 'kategori'));
    }

    public function update(Request $request, Alat $alat)
    {
        $validated = $request->validate([
            'nama_alat' => 'required|max:255',
            'deskripsi' => 'required',
            'kondisi' => 'required',
            'status' => 'required',
            'id_kategori' => 'required|exists:kategoris,id',
        ]);

        $alat->update($validated);

        session()->flash('log', [
            now() . " - Mengedit alat: " . $alat->nama_alat
        ]);

        return redirect()->route('alat.index');
    }

    public function destroy(Alat $alat)
    {
        $nama = $alat->nama_alat;
        $alat->delete();

        session()->flash('log', [
            now() . " - Menghapus alat: " . $nama
        ]);

        return redirect()->route('alat.index');
    }
}