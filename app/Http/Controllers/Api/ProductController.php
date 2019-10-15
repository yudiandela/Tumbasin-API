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

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

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
        $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image'       => ['string'],
            'brand_id'    => ['required', 'numeric'],
            'price'       => ['required', 'numeric'],
            'unit'        => ['required', 'string'],
            'stock'       => ['required', 'numeric'],
            'weight'      => ['required', 'string'],
            'length'      => ['required', 'string'],
            'width'       => ['required', 'string'],
            'height'      => ['required', 'string']
        ]);

        $product = Product::create([
            'category_id'       => $request->category_id,
            'name'              => $request->name,
            'slug'              => Str::slug($request->name),
            'short_description' => Str::limit($request->description),
            'description'       => $request->description,
            'image'             => UrlCheck::isUrl($request->image) ? $request->image : '',
            'brand_id'          => $request->brand_id,
            'price'             => $request->price,
            'unit'              => $request->unit,
            'stock'             => $request->stock,
            'weight'            => $request->weight,
            'length'            => $request->length,
            'width'             => $request->width,
            'height'            => $request->height
        ]);

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
        $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image'       => ['string'],
            'brand_id'    => ['required', 'numeric'],
            'price'       => ['required', 'numeric'],
            'unit'        => ['required', 'string'],
            'stock'       => ['required', 'numeric'],
            'weight'      => ['required', 'string'],
            'length'      => ['required', 'string'],
            'width'       => ['required', 'string'],
            'height'      => ['required', 'string']
        ]);

        $product->category_id       = $request->category_id;
        $product->name              = $request->name;
        $product->slug              = Str::slug($request->name);
        $product->short_description = Str::limit($request->description);
        $product->description       = $request->description;
        $product->image             = UrlCheck::isUrl($request->image) ? $request->image : $product->image;
        $product->brand_id          = $request->brand_id;
        $product->price             = $request->price;
        $product->unit              = $request->unit;
        $product->stock             = $request->stock;
        $product->weight            = $request->weight;
        $product->length            = $request->length;
        $product->width             = $request->width;
        $product->height            = $request->height;
        $product->save();

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
    public function getBestSelling()
    {
        $orders = Order::select('product_id', DB::raw('count(product_id) as count'))
            ->where('status', '>', 1)
            ->orderBy('count', 'DESC')
            ->groupBy('product_id');

        $products = Product::joinSub($orders, 'orders', function ($join) {
            $join->on('products.id', '=', 'orders.product_id');
        })->get();

        // Menampilkan data Product Collection
        return (ProductResource::collection($products))
            ->response()
            ->setStatusCode(200);
    }
}
