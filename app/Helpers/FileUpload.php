<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUpload
{
    /**
     * Mendapatkan data file uploads
     *
     * @return  String
     */
    public static function uploadFile($request, $input = 'image', $url = true, $uniqueName = 'tumbasin')
    {
        $image_url = null;

        if ($request->hasFile($input)) {
            $image            = $request->file($input);
            $originalFileName = $image->getClientOriginalName();
            $extension        = $image->getClientOriginalExtension();
            $fileNameOnly     = pathinfo($originalFileName, PATHINFO_FILENAME);
            $fileName         = Str::slug($uniqueName . '-' . $fileNameOnly . '-' . time()) . '.' . $extension;
            $image_url        = $image->storeAs('public', $fileName);
            if ($url) {
                return url(Storage::url($image_url));
            }
        }
        return $image_url;
    }
}
