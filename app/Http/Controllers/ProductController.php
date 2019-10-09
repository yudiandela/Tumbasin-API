<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Category;
use App\Helpers\FileUpload;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $categories = $category->orderBy('name', 'ASC')->get();
        return view('product.create', compact('categories'));
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
            'image'       => ['required', 'image', 'mimes:jpg,jpeg,png,gif,bmp,svg'],
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
            'image'             => url(Storage::url(FileUpload::uploadFile($request))),
            'price'             => $request->price,
            'unit'              => $request->unit,
            'stock'             => $request->stock,
            'weight'            => $request->weight,
            'length'            => $request->length,
            'width'             => $request->width,
            'height'            => $request->height
        ]);

        // return data berupa object
        return (ProductResource::collection($product))
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
        return (ProductResource::collection($product))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Category $category)
    {
        $categories = $category->orderBy('name', 'ASC')->get();
        return view('product.edit', compact('product', 'categories'));
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
            'image'       => ['image', 'mimes:jpg,jpeg,png,gif,bmp,svg'],
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
        $product->image             = $request->hasFile('image') ? url(Storage::url(FileUpload::uploadFile($request))) : $product->image;
        $product->price             = $request->price;
        $product->unit              = $request->unit;
        $product->stock             = $request->stock;
        $product->weight            = $request->weight;
        $product->length            = $request->length;
        $product->width             = $request->width;
        $product->height            = $request->height;
        $product->save();

        // return data berupa object
        return (ProductResource::collection($product))
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
