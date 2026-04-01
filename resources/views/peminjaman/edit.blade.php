<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CRUD Peminjaman') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h4 class="font-semibold text-xl text-gray-800 leading-tight">Edit Data Peminjaman</h4>
                    <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Peminjam</label>
                            <input type="text" name="nama_peminjam" class="form-control" value="{{ $peminjaman->nama_peminjam }}" required>
                        </div>

                        <div class="form-group">
                            <label>Alat</label>
                            <select name="id_alat" class="form-control" required>
                                @foreach ($alat as $a)
                                    <option value="{{ $a->id }}" {{ $peminjaman->id_alat == $a->id ? 'selected' : '' }}>
                                        {{ $a->nama_alat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="date" name="tgl_pinjam" class="form-control" value="{{ $peminjaman->tgl_pinjam }}" required>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="date" name="tgl_kembali" class="form-control" value="{{ $peminjaman->tgl_kembali }}" required>
                        </div>

                        <button class="btn btn-primary mt-3">Update</button>
                        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</x-app-layout>