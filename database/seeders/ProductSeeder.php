<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Product::truncate();
        DB::table('products')->insert([
            [
                'name' => 'Water',
                'price' => 500,
                'cost' => 300,
                'unit' => 'ml',
                'weight' => 500,
                'image_url' => json_encode(['https://w7.pngwing.com/pngs/728/915/png-transparent-mineral-water-bottles-mineral-water-bottles-mineral-water-pure-water-thumbnail.png', 'https://w7.pngwing.com/pngs/728/915/png-transparent-mineral-water-bottles-mineral-water-bottles-mineral-water-pure-water-thumbnail.png', 'https://w7.pngwing.com/pngs/728/915/png-transparent-mineral-water-bottles-mineral-water-bottles-mineral-water-pure-water-thumbnail.png']),
                'description' => 'water',
                'catalog_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Milk',
                'price' => 250,
                'cost' => null,
                'unit' => 'ml',
                'weight' => 1000,
                'image_url' => 'https://image.similarpng.com/very-thumbnail/2020/09/Milk-bottle-on-transparent-background-PNG.png',
                'description' => 'milk',
                'catalog_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Rice',
                'price' => 1000,
                'cost' => null,
                'unit' => 'g',
                'weight' => 1000,
                'image_url' => 'https://w7.pngwing.com/pngs/334/795/png-transparent-basmati-idli-parboiled-rice-white-rice-rice-food-superfood-rice.png',
                'description' => 'rice',
                'catalog_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
