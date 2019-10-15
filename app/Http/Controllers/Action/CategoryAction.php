<?php

namespace App\Http\Controllers\Action;

use App\Category;
use App\Helpers\UrlCheck;
use App\Helpers\FileUpload;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryAction
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        return Category::all();
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

        return Category::create([
            'name'  => strtoupper($request->name),
            'slug'  => Str::slug($request->name),
            'image' => $image
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public static function update($request, $category)
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
                $image = $category->image;
            } else {
                $imageDel = explode('/', $category->image);
                Storage::delete('public/' . Arr::last($imageDel));
            }
        }

        return Category::where('id', $category->id)->update([
            'name'  => strtoupper($request->name),
            'slug'  => Str::slug($request->name),
            'image' => $image,
        ]);
    }
}
