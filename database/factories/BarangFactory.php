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
        return [
            'kode_barang' => $this->faker->unique()->numerify('BRG####'),
            'nama_barang' => $this->faker->sentence(2),
            'keterangan' => $this->faker->sentence(2),
            'merk' => $this->faker->word,
            'jumlah' => $this->faker->numberBetween(1, 100),
            'satuan' => $this->faker->randomElement(['kg', 'gram', 'pcs', 'box']),
            'kode_kategori' => $this->faker->numerify('KTG###')
        ];
    }
}
