<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.12.2018
 *
 */

namespace App\Helpers;

use Illuminate\Support\Facades\Request;

class CustomUrl
{
    public static function getFull(string $url)
    {
        if (strpos($url, 'http') === false) {
            $scheme = Request::secure() ? 'https://' : 'http://';
            return $scheme . $url;
        }
        return $url;
    }
}
