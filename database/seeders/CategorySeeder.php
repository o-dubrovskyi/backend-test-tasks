<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->createOne([
            'name' => 'Appliances',
        ]);
        Category::factory()->createOne([
            'name' => 'Apps & Games',
        ]);
        Category::factory()->createOne([
            'name' => 'Arts, Crafts, & Sewing',
        ]);
        Category::factory()->createOne([
            'name' => 'Automotive Parts & Accessories',
        ]);
        Category::factory()->createOne([
            'name' => 'Baby',
        ]);
        Category::factory()->createOne([
            'name' => 'Beauty & Personal Care',
        ]);
        Category::factory()->createOne([
            'name' => 'Books',
        ]);
        Category::factory()->createOne([
            'name' => 'CDs & Vinyl',
        ]);
        Category::factory()->createOne([
            'name' => 'Cell Phones & Accessories',
        ]);
        Category::factory()->createOne([
            'name' => 'Clothing, Shoes and Jewelry',
        ]);
        Category::factory()->createOne([
            'name' => 'Collectibles & Fine Art',
        ]);
        Category::factory()->createOne([
            'name' => 'Computers',
        ]);
        Category::factory()->createOne([
            'name' => 'Electronics',
        ]);
        Category::factory()->createOne([
            'name' => 'Garden & Outdoor',
        ]);
        Category::factory()->createOne([
            'name' => 'Grocery & Gourmet Food',
        ]);
        Category::factory()->createOne([
            'name' => 'Handmade',
        ]);
        Category::factory()->createOne([
            'name' => 'Health, Household & Baby Care',
        ]);
        Category::factory()->createOne([
            'name' => 'Home & Kitchen',
        ]);
        Category::factory()->createOne([
            'name' => 'Industrial & Scientific',
        ]);
        Category::factory()->createOne([
            'name' => 'Kindle',
        ]);
        Category::factory()->createOne([
            'name' => 'Luggage & Travel Gear',
        ]);
        Category::factory()->createOne([
            'name' => 'Movies & TV',
        ]);
        Category::factory()->createOne([
            'name' => 'Musical Instruments',
        ]);
        Category::factory()->createOne([
            'name' => 'Office Products',
        ]);
        Category::factory()->createOne([
            'name' => 'Pet Supplies',
        ]);
        Category::factory()->createOne([
            'name' => 'Sports & Outdoors',
        ]);
        Category::factory()->createOne([
            'name' => 'Tools & Home Improvement',
        ]);
        Category::factory()->createOne([
            'name' => 'Toys & Games',
        ]);
        Category::factory()->createOne([
            'name' => 'Video Games',
        ]);
    }
}
