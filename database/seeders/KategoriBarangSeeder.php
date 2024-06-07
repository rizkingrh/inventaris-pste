<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriBarang;

class KategoriBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoriBarangs = [
            ['kode_kategori' => 'KTG001', 'nama_kategori' => 'Elektronik'],
            ['kode_kategori' => 'KTG002', 'nama_kategori' => 'Furnitur'],
            ['kode_kategori' => 'KTG003', 'nama_kategori' => 'Komponen'],
            // ['kode_kategori' => 'KTG004', 'nama_kategori' => 'Buku'],
            // ['kode_kategori' => 'KTG005', 'nama_kategori' => 'ATK'],
        ];

        foreach ($kategoriBarangs as $item) {
            KategoriBarang::create($item);
        }
    }
}
