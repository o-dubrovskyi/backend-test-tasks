<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

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

            /** @var Order $order */
            $order = Order::factory()->createOne([
                'price' => $orderPrice,
            ]);

            $order->products()->attach(
                $orderProducts->pluck('id')->toArray()
            );
        }
    }
}
