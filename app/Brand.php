<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Brand extends Model
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
