<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    public function run(): void
    {
        $gitar = Category::create([
            'name' => 'Gitar',
            'description' => 'Instrumen petik akustik dan elektrik',
        ]);

        $keyboard = Category::create([
            'name' => 'Keyboard',
            'description' => 'Instrumen tuts elektrik dan synthesizer',
        ]);

        Product::create([
            'category_id' => $gitar->id,
            'sku' => 'GTR-001',
            'name' => 'Yamaha F310 Akustik',
            'description' => 'Gitar akustik pemula',
            'price' => 1250000,
            'stock' => 10,
        ]);

        Product::create([
            'category_id' => $keyboard->id,
            'sku' => 'KBD-001',
            'name' => 'Roland XPS-10',
            'description' => 'Synthesizer keyboard panggung',
            'price' => 7800000,
            'stock' => 4,
        ]);
    }
}
