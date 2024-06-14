<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangInventaris extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    // Misalnya, enum ruangan lab di database
    const Status = [
        'Baik' => 'Baik',
        'Rusak Ringan' => 'Rusak Ringan',
        'Rusak Berat' => 'Rusak Berat'
    ];

    // Metode untuk mendapatkan nilai enum
    public static function getStatus()
    {
        return self::Status;
    }

    public function barang() {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
}
