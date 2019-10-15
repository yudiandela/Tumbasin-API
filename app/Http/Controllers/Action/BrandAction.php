<?php

namespace App\Http\Controllers\Action;

use App\Brand;
use App\Helpers\UrlCheck;
use App\Helpers\FileUpload;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BrandAction
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        return Brand::all();
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
            'name'  => ['required', 'string', 'max:255'],
            'image' => ['required']
        ]);

        // Check Request Image
        if (UrlCheck::isUrl($request->image)) {
            $image = $request->image;
        } else {
            $image = FileUpload::uploadFile($request);
        }

        return Brand::create([
            'name'  => strtoupper($request->name),
            'slug'  => Str::slug($request->name),
            'image' => $image
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Brand $brand
     * @return \Illuminate\Http\Response
     */
    public static function update($request, $brand)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        // Check Request Image
        if (UrlCheck::isUrl($request->image)) {
            $image = $request->image;
        } else {
            $image = FileUpload::uploadFile($request);
            if ($image === null) {
                $image = $brand->image;
            } else {
                $imageDel = explode('/', $brand->image);
                Storage::delete('public/' . Arr::last($imageDel));
            }
        }

        return Brand::where('id', $brand->id)->update([
            'name'  => strtoupper($request->name),
            'slug'  => Str::slug($request->name),
            'image' => $image,
        ]);
    }
}
