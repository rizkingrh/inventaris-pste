<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function kategoribarang() {
        return $this->belongsTo(KategoriBarang::class, 'kategori_id', 'id');
    }
}
