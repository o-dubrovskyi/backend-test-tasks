<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use App\Services\ProductPriceService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private ProductPriceService $productPriceService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return ProductCollection
     */
    public function index(Request $request): ProductCollection
    {
        $targetCurrency = $request->get('currency');

        return new ProductCollection(
            Product::all()->map(function (Product $product) use ($targetCurrency) {
                $price = $product->offsetGet('price');
                $sourceCurrency = $product->offsetGet('currency_code');

                if ($targetCurrency
                    && $targetCurrency !== $sourceCurrency
                ) {
                    $targetPrice = $this->productPriceService->calculate($price, $sourceCurrency, $targetCurrency);

                    return array_replace_recursive($product->toArray(), [
                        'price' => $targetPrice,
                        'currency_code' => $targetCurrency,
                    ]);
                }

                return $product->toArray();
            })
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Request $request)
    {
        $targetCurrency = $request->get('currency');
        $sourceCurrency = $product->offsetGet('currency_code');
        $price = $product->offsetGet('price');

        $productArr = $product->toArray();

        if ($targetCurrency
            && $targetCurrency !== $sourceCurrency
        ) {
            $targetPrice = $this->productPriceService->calculate($price, $sourceCurrency, $targetCurrency);

            $preparedProduct = array_replace_recursive($productArr, [
                'price' => $targetPrice,
                'currency_code' => $targetCurrency,
            ]);

            return response($preparedProduct);
        }

        return response($productArr);
    }
}
