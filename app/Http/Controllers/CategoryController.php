<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        return view('category.index', compact('categories'));
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
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,bmp']
        ]);

        $image_url = '';

        if ($request->hasFile('image')) {
            $image            = $request->file('image');
            $originalFileName = $image->getClientOriginalName();
            $extension        = $image->getClientOriginalExtension();
            $fileNameOnly     = pathinfo($originalFileName, PATHINFO_FILENAME);
            $fileName         = Str::slug('tumbasin-image-' . $fileNameOnly . '-' . time()) . '.' . $extension;
            $image_url        = $image->storeAs('public', $fileName);
        }

        Category::create([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name),
            'image' => $image_url
        ]);

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
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
            'name'  => ['required', 'string', 'max:255'],
            'image' => ['image', 'mimes:jpg,jpeg,png,gif,bmp']
        ]);

        $image_url = null;

        if ($request->hasFile('image')) {
            $image            = $request->file('image');
            $originalFileName = $image->getClientOriginalName();
            $extension        = $image->getClientOriginalExtension();
            $fileNameOnly     = pathinfo($originalFileName, PATHINFO_FILENAME);
            $fileName         = Str::slug('tumbasin-image-' . $fileNameOnly . '-' . time()) . '.' . $extension;
            $image_url        = $image->storeAs('public', $fileName);
        }

        $category->name  = $request->name;
        $category->slug  = Str::slug($request->name);
        $category->image = $image_url ?: $category->image;
        $category->save();

        return redirect()->route('category.index');
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
        return redirect()->route('category.index');
    }
}
