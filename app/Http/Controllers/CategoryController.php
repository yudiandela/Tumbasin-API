<?php

namespace App\Http\Controllers;

use App\Category;
use App\Helpers\FileUpload;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        // Tampilkan data berupa JSON
        return response()->json($categories, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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

        $category = Category::create([
            'name'        => strtoupper($request->name),
            'slug'        => Str::slug($request->name),
            'image'       => url(Storage::url(FileUpload::uploadFile($request)))
        ]);

        // Tampilkan data berupa JSON
        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // Tampilkan data berupa JSON
        return response()->json($category, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'image'       => ['image', 'mimes:jpg,jpeg,png,gif,bmp']
        ]);

        $category->name  = $request->name;
        $category->slug  = Str::slug($request->name);
        $category->image = $request->hasFile('image') ? url(Storage::url(FileUpload::uploadFile($request))) : $category->image;
        $category->save();

        // Tampilkan data berupa JSON
        return response()->json($category, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        // Tampilkan data berupa JSON
        return response()->json([
            'message' => 'deleted'
        ], 200);
    }
}
