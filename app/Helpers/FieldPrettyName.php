<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.12.18
 *
 */

namespace App\Helpers;

class FieldPrettyName
{
    /**
     * @param string $name
     * @return string
     */
    public static function transform(string $name) : string
    {
        return str_replace('_', ' ', ucfirst($name));
    }
}