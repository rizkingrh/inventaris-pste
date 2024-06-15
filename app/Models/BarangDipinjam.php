<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangDipinjam extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    public function inventaris() {
        return $this->belongsTo(BarangInventaris::class, 'inventaris_id', 'id');
    }
    public function peminjaman() {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id', 'id');
    }
}
