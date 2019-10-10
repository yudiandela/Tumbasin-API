<?php

namespace App\Http\Resources;

use App\Brand;
use App\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'slug'              => $this->slug,
            'category'          => new CategoryResource(Category::find($this->category->id)),
            'brand'             => new BrandResource(Brand::find($this->brand->id)),
            'short_description' => $this->short_description,
            'description'       => $this->description,
            'image'             => $this->image,
            'price'             => $this->price,
            'unit'              => $this->unit,
            'stock'             => $this->stock,
            'weight'            => $this->weight,
            'length'            => $this->length,
            'width'             => $this->width,
            'height'            => $this->height
        ];
    }
}
