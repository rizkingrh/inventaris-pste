<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    public function kategoribarang() {
        return $this->belongsTo(KategoriBarang::class, 'kategori_id', 'id');
    }

    public function baranginventaris() {
        return $this->hasOne(BarangInventaris::class);
    }
}
