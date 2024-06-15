<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenempatanItem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    const Status = [
        'Aktif' => 'Aktif',
        'Tidak Aktif' => 'Tidak Aktif',
    ];

    // Metode untuk mendapatkan nilai enum
    public static function getStatus()
    {
        return self::Status;
    }

    public function inventaris() {
        return $this->belongsTo(BarangInventaris::class, 'inventaris_id', 'id');
    }
    public function penempatan() {
        return $this->belongsTo(Penempatan::class, 'penempatan_id', 'id');
    }
}
