<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();

        for ($i = 0; $i < 50; $i++) {
            $orderProducts = $products->random(rand(1, 7));
            $orderPrice = 0;

            foreach ($orderProducts as $orderProduct) {
                $orderPrice += $orderProduct->price;
            }

            DB::table('orders')->insert([
                'price' => $orderPrice,
                'updated_at' => new \DateTime(),
                'created_at' => new \DateTime(),
            ]);

            $order = Order::all()->last();
            $order->products()->attach(
                $orderProducts->pluck('id')->toArray()
            );
        }
    }
}
