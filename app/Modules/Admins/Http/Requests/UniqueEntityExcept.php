<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 10.12.2018
 *
 */

namespace App\Modules\Admins\Http\Requests;

trait UniqueEntityExcept
{
    /**
     * @param int $segmentNumber
     * @return int
     */
    public function exceptId(int $segmentNumber = 1) : int
    {
        $segmentValues = $this->segments();

        return $segmentValues[$segmentNumber];
    }
}