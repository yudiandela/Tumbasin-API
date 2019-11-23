<?php

namespace App\Http\Controllers\Action;

use App\Order;
use App\Product;
use App\Helpers\UrlCheck;
use App\Helpers\FileUpload;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductAction
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store($request)
    {
        $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category_id' => ['required', 'numeric'],
            'image'       => ['required'],
            'brand_id'    => ['required', 'numeric'],
            'price'       => ['required', 'numeric'],
            'unit'        => ['required', 'string'],
            'stock'       => ['required', 'numeric'],
            'weight'      => ['required', 'string'],
            'length'      => ['required', 'string'],
            'width'       => ['required', 'string'],
            'height'      => ['required', 'string']
        ]);

        // Check Request Image
        if (UrlCheck::isUrl($request->image)) {
            $image = $request->image;
        } else {
            $image = FileUpload::uploadFile($request);
        }

        return Product::create([
            'category_id'       => $request->category_id,
            'name'              => $request->name,
            'slug'              => Str::slug($request->name),
            'short_description' => Str::limit($request->description),
            'description'       => $request->description,
            'image'             => $image,
            'brand_id'          => $request->brand_id,
            'price'             => $request->price,
            'unit'              => $request->unit,
            'stock'             => $request->stock,
            'weight'            => $request->weight,
            'length'            => $request->length,
            'width'             => $request->width,
            'height'            => $request->height
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public static function update($request, $product)
    {
        $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category_id' => ['required', 'numeric'],
            'brand_id'    => ['required', 'numeric'],
            'price'       => ['required', 'numeric'],
            'unit'        => ['required', 'string'],
            'stock'       => ['required', 'numeric'],
            'weight'      => ['required', 'string'],
            'length'      => ['required', 'string'],
            'width'       => ['required', 'string'],
            'height'      => ['required', 'string']
        ]);

        // Check Request Image
        if (UrlCheck::isUrl($request->image)) {
            $image = $request->image;
        } else {
            $image = FileUpload::uploadFile($request);
            if ($image === null) {
                $image = $product->image;
            } else {
                $imageDel = explode('/', $product->image);
                Storage::delete('public/' . Arr::last($imageDel));
            }
        }

        return Product::where('id', $product->id)->update([
            'category_id'       => $request->category_id,
            'name'              => $request->name,
            'slug'              => Str::slug($request->name),
            'short_description' => Str::limit($request->description),
            'description'       => $request->description,
            'image'             => $image,
            'brand_id'          => $request->brand_id,
            'price'             => $request->price,
            'unit'              => $request->unit,
            'stock'             => $request->stock,
            'weight'            => $request->weight,
            'length'            => $request->length,
            'width'             => $request->width,
            'height'            => $request->height
        ]);
    }

    /**
     * Destroy the specified resource in storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public static function destroy($product)
    {
        return $product->delete();
    }

    /**
     * Mengambil data product berdasarkan Orderan terbanyak
     *
     * @return \Illuminate\Http\Response
     */
    public static function topSeller()
    {
        $orders = Order::select('product_id', DB::raw('count(product_id) as count'))
            ->where('status', '>', 1)
            ->orderBy('count', 'DESC')
            ->groupBy('product_id');

        return Product::joinSub($orders, 'orders', function ($join) {
            $join->on('products.id', '=', 'orders.product_id');
        })->get();
    }
}
