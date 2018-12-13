<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 12.12.2018
 *
 */

namespace App\Modules\Geography\Models;

use Illuminate\Database\Eloquent\Model;

class GeographyCity extends Model implements GeographyInterface
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}