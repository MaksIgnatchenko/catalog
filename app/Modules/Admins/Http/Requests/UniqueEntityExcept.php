<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 10.12.2018
 *
 */

namespace App\Modules\Admins\Http\Requests;

trait UniqueEntityExcept
{
    /**
     * @return int
     */
    public function exceptId() : int
    {
        $paramName = $this->segment(1);
        return $this->route($paramName)->id;
    }
}