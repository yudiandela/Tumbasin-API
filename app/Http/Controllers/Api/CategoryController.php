<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Helpers\UrlCheck;
use App\Http\Controllers\Action\CategoryAction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryAction::index();
        // Tampilkan data berupa JSON
        return (CategoryResource::collection($categories))->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CategoryAction::store($request);
        // Tampilkan data berupa JSON
        return (new CategoryResource($category))->response()->setStatusCode(201);
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
        return (new CategoryResource($category))->response()->setStatusCode(200);
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
            'image' => ['string']
        ]);

        $category->name  = strtoupper($request->name);
        $category->slug  = Str::slug($request->name);
        $category->image = UrlCheck::isUrl($request->image) ? $request->image : $category->image;
        $category->save();

        // Tampilkan data berupa JSON
        return (new CategoryResource($category))->response()->setStatusCode(201);
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
