<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cafe;

class CafeSeeder extends Seeder
{
    public function run(): void
    {
        Cafe::insert([
            [
                'mahallah_id' => 1,
                'cafe_name' => 'Zubair Café',
                'cafe_num' => 'C01',
            ],
            [
                'mahallah_id' => 2,
                'cafe_name' => 'Ali Café',
                'cafe_num' => 'C02',
            ],
            [
                'mahallah_id' => 3,
                'cafe_name' => 'Faruq Café',
                'cafe_num' => 'C03',
            ],
        ]);
    }
}
