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
            'name' => 'Kamar Bronze',
            'price' => '550000',
            'description' => 'include almari, kasur, meja, kursi, kipas angin',
        ]);

        Price::create([
            'name' => 'Kamar Silver',
            'price' => '650000',
            'description' => 'include almari, kasur, meja, kursi, kipas angin, AC',
        ]);
    }
}
