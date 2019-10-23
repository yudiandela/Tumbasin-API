<?php

namespace App\Http\Controllers\Api;

use App\Product;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Action\ProductAction;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductAction::index();

        return response()->json([
            'status' => [
                'code' => 200,
                'description' => 'OK'
            ],
            'result' => ProductResource::collection($products)
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json([
            'status' => [
                'code' => 200,
                'description' => 'OK'
            ],
            'result' => new ProductResource($product)
        ], 200);
    }

    /**
     * Mengambil data produk terlaris
     *
     * @return  JSON
     */
    public function topSeller()
    {
        $products = ProductAction::topSeller();

        return response()->json([
            'status' => [
                'code' => 200,
                'description' => 'OK'
            ],
            'result' => ProductResource::collection($products)
        ], 200);
    }
}
