<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 04.12.2018
 *
 */

namespace App\Modules\Admins\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSpecialityRequest extends FormRequest
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
			'name' => 'string|min:3|max:100',
			'description' => 'string|min:10|max:300'
		];
    }
}
