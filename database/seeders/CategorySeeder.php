<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Appliances',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Apps & Games',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Arts, Crafts, & Sewing',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Automotive Parts & Accessories',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Baby',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Beauty & Personal Care',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Books',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'CDs & Vinyl',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Cell Phones & Accessories',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Clothing, Shoes and Jewelry',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Collectibles & Fine Art',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Computers',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Electronics',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Garden & Outdoor',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Grocery & Gourmet Food',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Handmade',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Health, Household & Baby Care',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Home & Kitchen',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Industrial & Scientific',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Kindle',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Luggage & Travel Gear',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Movies & TV',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Musical Instruments',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Office Products',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Pet Supplies',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Sports & Outdoors',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Tools & Home Improvement',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Toys & Games',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Video Games',
            'updated_at' => new \DateTime(),
            'created_at' => new \DateTime(),
        ]);
    }
}
