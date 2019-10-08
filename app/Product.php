<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    /**
     * Data yang tidak di perbolehkan masuk ke dalam database
     * melalui form inputan dengan eloquent
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Data yang tidak di tampilkan didalam data json
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * Menyambungkan relasi ke tabel category
     *
     * @return  Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Menyambungkan relasi ke tabel brands
     *
     * @return  Brand
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Mengambil data gambar
     *
     * @return  String
     */
    public function getImageUrlAttribute()
    {
        $image = $this->images;

        if (filter_var($image, FILTER_VALIDATE_URL)) {
            return $image;
        }

        return Storage::url($image);
    }
}
