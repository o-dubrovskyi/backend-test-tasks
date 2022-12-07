<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderProductRequest;
use App\Http\Resources\OrderProductCollection;
use App\Models\Order;
use App\Models\OrdersProduct;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $orderId
     * @return OrderProductCollection
     */
    public function index(int $orderId)
    {
        return new OrderProductCollection(
            OrdersProduct::all()
                ->where('order_id', '=', $orderId)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderProductRequest $request)
    {
        $validated = $request->validated();
        $orderProduct = OrdersProduct::create([
            'order_id' => $validated['order_id'],
            'product_id' => $validated['product_id'],
        ]);

        $this->updateOrderPrice($validated['order_id']);

        return response($orderProduct);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrdersProduct $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $orderId, int $productId)
    {
        $query = OrdersProduct::query();
        $query->where([
            'order_id' => $orderId,
            'product_id' => $productId,
        ])->delete();

        $this->updateOrderPrice($orderId);

        return response(null, 204);
    }

    /**
     * @param int $orderId
     * @return void
     */
    private function updateOrderPrice(int $orderId): void
    {
        $orderProducts = OrdersProduct::query()
            ->where(['order_id' => $orderId])
            ->rightJoin('products', 'orders_products.product_id', '=', 'products.id')
            ->get()
            ->toArray();

        $orderQuery = Order::query();

        if (!count($orderProducts)) {
            $orderQuery->where(['id' => $orderId])
                ->delete();
        }

        $orderPrice = 0;
        foreach ($orderProducts as $orderProd) {
            $orderPrice += $orderProd['price'];
        }

        $orderQuery->where(['id' => $orderId])
            ->update(['price' => $orderPrice]);
    }
}
