<?php

namespace App\Models;

use App\Models\Alat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';
    protected $fillable = [
        'nama_peminjam',
        'tgl_pinjam',
        'tgl_kembali',
        'id_alat',
    ];

    public function alat(): BelongsTo
    {
        return $this->belongsTo(Alat::class, 'id_alat');
    }

    public function pengembalian(): HasMany
    {
        return $this->hasMany(Pengembalian::class);
    }
}
