<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 24.01.19
 *
 */

namespace App\Modules\Companies\Rules;


use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CheckCurrentPasswordRule implements Rule
{
    public function passes($attribute, $value)
    {
        return Hash::check($value, Auth::user()->password);
    }

    public function message()
    {
        return 'Incorrect password';
    }
}