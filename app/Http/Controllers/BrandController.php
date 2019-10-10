<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Helpers\FileUpload;
use App\Http\Resources\BrandResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
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
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,bmp,svg']
        ]);

        $brand = Brand::create([
            'name'        => strtoupper($request->name),
            'slug'        => Str::slug($request->name),
            'image'       => url(Storage::url(FileUpload::uploadFile($request)))
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('brand.edit', compact('brand'));
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
            'name'        => ['required', 'string', 'max:255'],
            'image'       => ['image', 'mimes:jpg,jpeg,png,gif,bmp']
        ]);

        $brand->name  = strtoupper($request->name);
        $brand->slug  = Str::slug($request->name);
        $brand->image = $request->hasFile('image') ? url(Storage::url(FileUpload::uploadFile($request))) : $brand->image;
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
