<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    /**
     * Data yang di perbolehkan masuk ke dalam database
     * melalui form inputan dengan eloquent
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',
        'image',
        'price',
        'unit',
        'stock'
    ];

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
     * Mengambil data gambar
     *
     * @return  String
     */
    public function getImageUrlAttribute()
    {
        $image = $this->image;

        if (filter_var($image, FILTER_VALIDATE_URL)) {
            return $image;
        }

        return Storage::url($image);
    }
}
