<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Alat extends Model
{
    protected $table = 'alats';
    protected $fillable = [
        'nama_alat',
        'deskripsi',
        'kondisi',
        'status',
        'id_kategori',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

     public function peminjaman(): HasMany
    {
        return $this->hasMany(Peminjaman::class);
    }
}
