<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuanganLab extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    // Misalnya, enum ruangan lab di database
    const Lokasi = [
        'U' => 'U',
        'SRC' => 'SRC',
        'Kontainer' => 'Kontainer'
    ];

    // Metode untuk mendapatkan nilai enum
    public static function getLokasi()
    {
        return self::Lokasi;
    }
}
