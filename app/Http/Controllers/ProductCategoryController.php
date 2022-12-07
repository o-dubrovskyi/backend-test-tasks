<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Resources\ProductCategoryCollection;
use App\Models\ProductsCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $productId
     * @return ProductCategoryCollection
     */
    public function index(int $productId)
    {
        return new ProductCategoryCollection(
            ProductsCategory::all()
            ->where('product_id', '=', $productId)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCategoryRequest $request)
    {
        $validated = $request->validated();
        $product = ProductsCategory::create([
            'product_id' => $validated['product_id'],
            'category_id' => $validated['category_id'],
        ]);

        return response($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductsCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $productId, int $categoryId)
    {
        $query = ProductsCategory::query();
        $query->where([
            'product_id' => $productId,
            'category_id' => $categoryId,
        ])->delete();

        return response(null, 204);
    }
}
