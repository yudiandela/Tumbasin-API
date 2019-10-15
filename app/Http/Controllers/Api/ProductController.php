<?php

namespace App\Http\Controllers\Api;

use App\Order;
use App\Product;
use App\Helpers\UrlCheck;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Controllers\Action\ProductAction;

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

        // return data berupa object
        return (ProductResource::collection($products))
            ->response()
            ->setStatusCode(200);
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
        // return data berupa object
        return (new ProductResource($product))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // return data berupa object
        return (new ProductResource($product))
            ->response()
            ->setStatusCode(200);
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
        $product = ProductAction::update($request, $product);
        // return data berupa object
        return (new ProductResource($product))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        // return data berupa object
        return response()->json([
            'message' => 'deleted'
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
        // Menampilkan data Product Collection
        return (ProductResource::collection($products))
            ->response()
            ->setStatusCode(200);
    }
}
