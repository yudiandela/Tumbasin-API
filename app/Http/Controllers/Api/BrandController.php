<?php

namespace App\Http\Controllers\Api;

use App\Brand;
use App\Helpers\UrlCheck;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();

        // Tampilkan data berupa JSON
        return (BrandResource::collection($brands))->response()->setStatusCode(200);
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
            'name'  => ['required', 'string', 'max:255'],
            'image' => ['required', 'string']
        ]);

        $brand = Brand::create([
            'name'  => strtoupper($request->name),
            'slug'  => Str::slug($request->name),
            'image' => UrlCheck::isUrl($request->image) ? $request->image : ''
        ]);

        // Tampilkan data berupa JSON
        return (new BrandResource($brand))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        // Tampilkan data berupa JSON
        return (new BrandResource($brand))->response()->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'image' => ['string']
        ]);

        $brand->name  = strtoupper($request->name);
        $brand->slug  = Str::slug($request->name);
        $brand->image = UrlCheck::isUrl($request->image) ? $request->image : $brand->image;
        $brand->save();

        // Tampilkan data berupa JSON
        return (new BrandResource($brand))->response()->setStatusCode(201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        // Tampilkan data berupa JSON
        return response()->json([
            'message' => 'deleted'
        ], 200);
    }
}
