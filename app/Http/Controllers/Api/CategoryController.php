<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Action\CategoryAction;
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

        return response()->json([
            'status' => [
                'code' => 200,
                'description' => 'OK'
            ],
            'result' => CategoryResource::collection($categories)
        ], 200);
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
}
