<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Action\CategoryAction;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

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

        return response()->json([
            'status' => [
                'code' => 200,
                'description' => 'OK'
            ],
            'result' => CategoryResource::collection($categories)
        ], 200);
    }

    public function store(Request $request)
    {
        $category = CategoryAction::store($request);

        return response()->json([
            'status' => [
                'code' => 201,
                'description' => 'Created'
            ],
            'result' => new CategoryResource($category)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json([
            'status' => [
                'code' => 200,
                'description' => 'OK'
            ],
            'result' => new CategoryResource($category)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        CategoryAction::update($request, $category);
        return response()->json([
            'status' => [
                'code' => 201,
                'description' => 'Updated'
            ],
            'result' => [
                'message' => 'Category updated'
            ]
        ], 201);
    }

    /**
     * Destroy the specified resource in storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        CategoryAction::destroy($category);
        return response()->json([
                'status' => [
                    'code' => 200,
                    'description' => 'Deleted'
                ],
                'result' => [
                    'message' => 'Category deleted'
                ]
            ], 200);
    }
}
