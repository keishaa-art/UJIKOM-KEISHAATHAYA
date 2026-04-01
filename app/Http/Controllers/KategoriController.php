<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::get();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|max:255',
        ]);

        $kategori = Kategori::create($validated);

        session()->flash('log', [
            now() . " - Menambahkan kategori: " . $kategori->nama_kategori
        ]);

        return redirect()->route('kategori.index');
    }

    public function show(Kategori $kategori)
    {
        //
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|max:255',
        ]);

        $kategori->update($validated);

        session()->flash('log', [
            now() . " - Mengedit kategori: " . $kategori->nama_kategori
        ]);

        return redirect()->route('kategori.index');
    }

    public function destroy(Kategori $kategori)
    {
        $nama = $kategori->nama_kategori;
        $kategori->delete();

        session()->flash('log', [
            now() . " - Menghapus kategori: " . $nama
        ]);

        return redirect()->route('kategori.index');
    }
}