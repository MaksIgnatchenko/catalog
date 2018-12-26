<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.12.2018
 *
 */

namespace App\Helpers;

use Illuminate\Http\Request;

class CustomUrl
{
    public static function getFull(string $url)
    {
        if (strpos($url, 'http') === false) {
            $scheme = \Illuminate\Support\Facades\Request::secure() ? 'https://' : 'http://';
            return $scheme . $url;
        }
        return $url;
    }
}
