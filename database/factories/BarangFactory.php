<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Barang;

class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Barang::class;
    
    public function definition()
    {
        static $brg = 1;
        static $ktg = 1;
        
        return [
            'kode_barang' => 'BRG' . str_pad($brg++, 3, '0', STR_PAD_LEFT),
            'nama_barang' => ucfirst($this->faker->word),
            'keterangan' => $this->faker->randomElement(['Rusak', 'Baru', 'Hibah', 'Pengecekan']),
            'merk' => ucfirst($this->faker->word),
            'jumlah' => $this->faker->numberBetween(1, 50),
            'satuan' => $this->faker->randomElement(['Unit', 'Pcs', 'Box']),
            'kategori_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
