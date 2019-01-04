<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 04.01.2019
 *
 */

namespace App\Modules\Companies\Rules;

use Illuminate\Contracts\Validation\Rule;

class WorkDaysRule implements Rule
{
    public function passes($attribute, $value)
    {
        foreach ($value as $day) {
            $isWork = $day['is_work'] ?? null;
            $from = $day['from'] ?? null;
            $to = $day['to'] ?? null;
            if ($isWork && !($from && $to)) {
                return false;
            }
        }
    }

    public function message()
    {
        return 'Working hours is required for working day';
    }

}