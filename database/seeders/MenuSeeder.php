<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cafe;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $zubair = Cafe::where('cafe_name', 'Zubair Café')->first();
        $ali    = Cafe::where('cafe_name', 'Ali Café')->first();
        $faruq  = Cafe::where('cafe_name', 'Faruq Café')->first();

        if ($zubair) {
            Menu::insert([
                ['cafe_id' => $zubair->id, 'name' => 'Nasi Lemak', 'description' => 'Classic Malaysian dish', 'price' => 5.00],
                ['cafe_id' => $zubair->id, 'name' => 'Mee Goreng', 'description' => 'Spicy fried noodles', 'price' => 6.00],
                ['cafe_id' => $zubair->id, 'name' => 'Fried Rice', 'description' => 'Egg fried rice', 'price' => 5.50],
                ['cafe_id' => $zubair->id, 'name' => 'Chicken Curry', 'description' => 'With rice', 'price' => 7.00],
                ['cafe_id' => $zubair->id, 'name' => 'Teh Tarik', 'description' => 'Pulled tea', 'price' => 2.00],
            ]);
        }

        if ($ali) {
            Menu::insert([
                ['cafe_id' => $ali->id, 'name' => 'Burger Ayam', 'description' => 'Chicken burger', 'price' => 4.50],
                ['cafe_id' => $ali->id, 'name' => 'Burger Daging', 'description' => 'Beef burger', 'price' => 5.00],
                ['cafe_id' => $ali->id, 'name' => 'French Fries', 'description' => 'Crispy fries', 'price' => 3.00],
                ['cafe_id' => $ali->id, 'name' => 'Hotdog', 'description' => 'Grilled sausage', 'price' => 4.00],
                ['cafe_id' => $ali->id, 'name' => 'Cola', 'description' => 'Cold drink', 'price' => 2.00],
            ]);
        }

        if ($faruq) {
            Menu::insert([
                ['cafe_id' => $faruq->id, 'name' => 'Spaghetti', 'description' => 'Chicken bolognese', 'price' => 7.50],
                ['cafe_id' => $faruq->id, 'name' => 'Lasagna', 'description' => 'Cheesy layers', 'price' => 8.00],
                ['cafe_id' => $faruq->id, 'name' => 'Garlic Bread', 'description' => 'Toasted bread', 'price' => 3.00],
                ['cafe_id' => $faruq->id, 'name' => 'Mushroom Soup', 'description' => 'Creamy soup', 'price' => 4.00],
                ['cafe_id' => $faruq->id, 'name' => 'Lemon Tea', 'description' => 'Fresh drink', 'price' => 2.50],
            ]);
        }
    }
}
