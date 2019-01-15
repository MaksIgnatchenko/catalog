<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.01.19
 *
 */

namespace App\Modules\Languages\Rules;

use App\Modules\Languages\Enums\LanguagesEnum;
use Illuminate\Contracts\Validation\Rule;

class HasDefaultTranslationRule implements Rule
{
    public function passes($attribute, $value)
    {
        foreach (LanguagesEnum::getAvailable() as $language) {
            if ($value[$language] ?? null) {
                return true;
            } ;
        }

        return false;
    }

    public function message()
    {
        return 'At least one language is required';
    }
}