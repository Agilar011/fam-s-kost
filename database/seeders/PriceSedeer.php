<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Price;

class PriceSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Price::create([
            'name' => 'Kamar Standard',
            'price' => '800000',
            'description' => 'Kamar Mandi Luar, (include lemari, kasur, meja, kursi, kipas angin, wifi)',
        ]);

        Price::create([
            'name' => 'Kamar Suite',
            'price' => '1000000',
            'description' => 'Kamar mandi dalam, kamar lebih luas (include lemari, kasur, meja, kursi, kipas angin, wifi',
        ]);
    }
}
