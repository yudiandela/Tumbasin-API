<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Helpers\UrlCheck;
use App\Helpers\FileUpload;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
        return view('brand.index', compact('brands'));
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
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,svg,gif,bmp']
        ]);

        // Check Request Image
        // $image = UrlCheck::isUrl($request->image) ?? $request->image;
        $image = FileUpload::uploadFile($request);

        Brand::create([
            'name'  => strtoupper($request->name),
            'slug'  => Str::slug($request->name),
            'image' => $image
        ]);

        return redirect()->route('brand.index')->with('success', 'menambahkan data brand baru');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Brand $brand
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
     * @param  Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'image' => ['mimes:jpg,jpeg,png,svg,gif,bmp']
        ]);

        // Check Request Image
        // $image = UrlCheck::isUrl($request->image) ?? $request->image;
        $image = FileUpload::uploadFile($request);

        if ($image === null) {
            $image = $brand->image;
        } else {
            $imageDel = explode('/', $brand->image);
            Storage::delete('public/' . Arr::last($imageDel));
        }

        $brand->name  = $request->name;
        $brand->slug  = Str::slug($request->name);
        $brand->image = $image;
        $brand->save();

        return redirect()->route('brand.index')->with('success', 'mengubah data brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brand.index')->with('success', 'menghapus data brand');
    }
}
