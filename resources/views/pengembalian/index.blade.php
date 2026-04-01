<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CRUD Pengembalian') }}
        </h2>
    </x-slot>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="d-flex justify-content-between">
                    <h4 class="font-semibold text-xl text-gray-800 leading-tight">Data Pengembalian</h4>
                    <a href="{{ route('pengembalian.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>

                @if(session('log'))
                    <div class="alert alert-success mt-3">
                        @foreach (session('log') as $l)
                            <div>{{ $l }}</div>
                        @endforeach
                    </div>

                    @php
                        session()->forget('log');
                    @endphp
                @endif

                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peminjam</th>
                            <th>Kondisi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengembalian as $no => $p)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $p->peminjaman->nama_peminjam ?? '-' }}</td>
                            <td>{{ $p->kondisi }}</td>
                            <td>{{ $p->status }}</td>
                            <td>
                                <form action="{{ route('pengembalian.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('pengembalian.edit', $p->id) }}" class="btn btn-primary">Edit</a>
                                    <button class="btn btn-secondary">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</x-app-layout>

