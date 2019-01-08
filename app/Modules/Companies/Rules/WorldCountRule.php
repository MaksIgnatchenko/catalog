<?php
/**
* Created by Maksym Ignatchenko, Appus Studio LP on 04.01.2019
*
*/

namespace App\Modules\Companies\Rules;

use Illuminate\Contracts\Validation\Rule;

class WorldCountRule implements Rule
{
    private $minWordCount;

    public function __construct(int $minWordCount)
    {
        $this->minWordCount = $minWordCount;
    }


    public function passes($attribute, $value)
    {
        return count(explode(' ', $value)) >= $this->minWordCount;
    }

    public function message()
    {
        return 'Should contain at least ' . $this->minWordCount . ' words';
    }

}