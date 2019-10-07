<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class FileUpload
{
    /**
     * Mendapatkan data file uploads
     *
     * @return  String
     */
    public static function uploadFile($request, $uniqueName = 'tumbasin')
    {
        $image_url = null;

        if ($request->hasFile('image')) {
            $image            = $request->file('image');
            $originalFileName = $image->getClientOriginalName();
            $extension        = $image->getClientOriginalExtension();
            $fileNameOnly     = pathinfo($originalFileName, PATHINFO_FILENAME);
            $fileName         = Str::slug($uniqueName . '-' . $fileNameOnly . '-' . time()) . '.' . $extension;
            $image_url        = $image->storeAs('public', $fileName);
        }

        return $image_url;
    }
}
