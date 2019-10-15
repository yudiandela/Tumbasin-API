<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\Category;
use App\Helpers\UrlCheck;
use App\Helpers\FileUpload;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
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
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::orderBy('name', 'ASC')->get();
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('product.create', compact('brands', 'categories'));
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

        Product::create([
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

        return redirect()->route('product.index')->with('success', 'menambahkan product baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::orderBy('name', 'ASC')->get();
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('product.edit', compact('product', 'brands', 'categories'));
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

        Product::where('id', $product->id)->update([
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

        return redirect()->route('product.index')->with('success', 'mengubah data product');
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
        return redirect()->route('product.index')->with('success', 'menghapus data product');
    }
}
