<?php

namespace App\Http\Controllers\Api;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Action\BrandAction;
use App\Http\Resources\BrandResource;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = BrandAction::index();

        return response()->json([
            'status' => [
                'code' => 200,
                'description' => 'OK'
            ],
            'result' => BrandResource::collection($brands)
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = BrandAction::store($request);

        return response()->json([
            'status' => [
                'code' => 201,
                'description' => 'Created'
            ],
            'result' => new BrandResource($brand)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return response()->json([
            'status' => [
                'code' => 200,
                'description' => 'OK'
            ],
            'result' => new BrandResource($brand)
        ], 200);
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
        BrandAction::update($request, $brand);
        return response()->json([
            'status' => [
                'code' => 201,
                'description' => 'Updated'
            ],
            'result' => [
                'message' => 'Brand updated'
            ]
        ], 201);
    }

    /**
     * Destroy the specified resource in storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return response()->json([
            'status' => [
                'code' => 200,
                'description' => 'Deleted'
            ],
            'result' => [
                'message' => 'Brand deleted'
            ]
        ], 200);
    }
}
