<?php

namespace App\Helpers;

class UrlCheck
{
    /**
     * Pengecekan string URL
     *
     * @param   $url
     * @return  Boolean
     */
    public static function isUrl($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return true;
        }

        return false;
    }
}
