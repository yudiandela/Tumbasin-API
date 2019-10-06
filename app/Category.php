<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    /**
     * Data yang di perbolehkan masuk ke dalam database
     * melalui form inputan dengan eloquent
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'image', 'description'
    ];

    /**
     * Mengambil data image dari category
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
