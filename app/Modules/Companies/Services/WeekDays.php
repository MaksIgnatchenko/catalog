<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.01.2019
 *
 */

namespace App\Modules\Companies\Services;

class WeekDays
{
    /**
     * @var array
     */
    private $days;

    /**
     * WeekDays constructor.
     */
    public function __construct()
    {
        $this->days = [
            ['abbreviation' => 'mon', 'name' => 'Monday'],
            ['abbreviation' => 'tue', 'name' => 'Tuesday'],
            ['abbreviation' => 'wed', 'name' => 'Wednesday'],
            ['abbreviation' => 'thu', 'name' => 'Thursday'],
            ['abbreviation' => 'fri', 'name' => 'Friday'],
            ['abbreviation' => 'sat', 'name' => 'Saturday'],
            ['abbreviation' => 'sun', 'name' => 'Sunday'],
        ];
    }

    /**
     * @return array
     */
    public function getDays() : array
    {
        return $this->days;
    }
}