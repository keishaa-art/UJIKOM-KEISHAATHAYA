<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Alat;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with('alat')->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $alat = Alat::all();
        return view('peminjaman.create', compact('alat'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_peminjam' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'id_alat' => 'required|exists:alats,id',
        ]);

        Peminjaman::create($validated);

        session()->flash('log', [
            now() . " - Menambahkan data"
        ]);

        return redirect()->route('peminjaman.index');
    }

    public function show(Peminjaman $peminjaman)
    {
        //
    }

    public function edit(Peminjaman $peminjaman)
    {
        $alat = Alat::all();
        return view('peminjaman.edit', compact('peminjaman', 'alat'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'nama_peminjam' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'id_alat' => 'required|exists:alats,id',
        ]);

        $peminjaman->update($validated);

        session()->flash('log', [
            now() . " - Mengedit data"
        ]);

        return redirect()->route('peminjaman.index');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();


        session()->flash('log', [
            now() . " - Menghapus data"
        ]);

        return redirect()->route('peminjaman.index');
    }
}