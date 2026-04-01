<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CRUD Alat') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="d-flex justify-content-between">
                    <h4 class="font-semibold text-xl text-gray-800 leading-tight">Data Alat</h4>
                    <a href="{{ route('alat.create') }}" class="btn btn-primary">
                        Tambah Data
                    </a>
                </div>

                @if(session('log'))
                    <div class="alert alert-success mt-3">
                        @foreach (session('log') as $l)
                            <div>{{ $l }}</div>
                        @endforeach
                    </div>
                @endif

                <table class="mt-3 table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Alat</th>
                            <th>Deskripsi</th>
                            <th>Kondisi</th>
                            <th>Status</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alat as $no => $a)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $a->nama_alat }}</td>
                            <td>{{ $a->deskripsi }}</td>
                            <td>{{ $a->kondisi }}</td>
                            <td>{{ $a->status }}</td>
                            <td>{{ $a->kategori->nama_kategori ?? '-' }}</td>
                            <td>
                                <form action="{{ route('alat.destroy', $a->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('alat.edit', $a->id) }}" class="btn btn-primary">Edit</a>
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