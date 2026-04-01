<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengembalian = Pengembalian::with('peminjaman')->get();
        return view('pengembalian.index', compact('pengembalian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $peminjaman = Peminjaman::all();
        return view('pengembalian.create', compact('peminjaman'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'kondisi' => 'required',
            'status' => 'required',
            'id_peminjaman' => 'required|exists:peminjamans,id',
        ]);

        Pengembalian::create($validated);

        session()->flash('log', [
            now() . " - Menambahkan data"
        ]);

        return redirect()->route('pengembalian.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(pengembalian $pengembalian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pengembalian $pengembalian)
    {
        $peminjaman = Peminjaman::all();
        return view('pengembalian.edit', compact('pengembalian', 'peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pengembalian $pengembalian)
    {
         $validated = $request->validate([
            'kondisi' => 'required',
            'status' => 'required',
            'id_peminjaman' => 'required|exists:peminjamans,id',
        ]);

        $pengembalian->update($validated);

        session()->flash('log', [
            now() . " - Mengedit data"
        ]);

        return redirect()->route('pengembalian.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pengembalian $pengembalian)
    {
        $pengembalian->delete();


        session()->flash('log', [
            now() . " - Menghapus data"
        ]);

        return redirect()->route('pengembalian.index');
    }
}
