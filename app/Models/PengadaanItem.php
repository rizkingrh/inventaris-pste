<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengadaanItem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    public function pengadaan() {
        return $this->belongsTo(Pengadaan::class, 'pengadaan_id', 'id');
    }

    public function barang() {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
}
