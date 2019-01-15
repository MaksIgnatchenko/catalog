<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.01.19
 *
 */

namespace App\Modules\Images\Helpers;

class ImageTag
{
    /**
     * @param string $src
     * @param array $attributes
     * @return string
     */
    public static function get(string $src, array $attributes = []) : string
    {
        $attributesString = '';
        foreach($attributes as $key => $value) {
            $attributesString .= $key . '=' . '"' . $value . '" ';
        }
        return "<img src='" . $src . "' " . $attributesString . ">";
    }

}