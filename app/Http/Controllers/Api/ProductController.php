<?php

namespace App\Http\Controllers\Api;

use App\Product;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Action\ProductAction;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = ProductAction::store($request);

        return response()->json([
            'status' => [
                'code' => 201,
                'description' => 'Created'
            ],
            'result' => new ProductResource($product)
        ], 201);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        ProductAction::update($request, $product);
        return response()->json([
            'status' => [
                'code' => 201,
                'description' => 'Updated'
            ],
            'result' => new ProductResource($product)
        ], 201);
    }

    /**
     * Destroy the specified resource in storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        ProductAction::destroy($product);
        return response()->json([
            'status' => [
                'code' => 200,
                'description' => 'Deleted'
            ],
            'result' => [
                'message' => 'Product deleted'
            ]
        ]);
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
