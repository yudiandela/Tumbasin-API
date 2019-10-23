<?php

namespace App\Http\Controllers\Api;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Action\BrandAction;
use App\Http\Resources\BrandResource;

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
}
