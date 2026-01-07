<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahallah;

class MahallahSeeder extends Seeder
{
    public function run(): void
    {
        Mahallah::insert([
            ['name' => 'Zubair'],
            ['name' => 'Ali'],
            ['name' => 'Faruq'],
        ]);
    }
}
