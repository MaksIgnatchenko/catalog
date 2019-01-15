<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.01.19
 *
 */

namespace App\Modules\Languages\Rules;

use App\Modules\Languages\Enums\LanguagesEnum;
use Illuminate\Contracts\Validation\Rule;

class LanguageRule implements Rule
{
    public function passes($attribute, $value)
    {
        $languages = array_keys($value);
        return !array_diff($languages, LanguagesEnum::getAvailable());
    }

    public function message()
    {
        return 'At least one translation is not supported';
    }

}