<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 24.01.19
 *
 */

namespace App\Modules\Companies\Http\Requests;

use App\Modules\Companies\Rules\CheckCurrentPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class CompanyOwnerUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => ['required', 'string', 'min:6', 'max:50', new CheckCurrentPasswordRule()],
            'password' => 'required|string|min:6|max:50,confirmed|different:current_password',
            'password_confirmation' => 'required|string|max:50|same:password',
        ];
    }
}