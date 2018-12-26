<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.12.18
 *
 */

namespace App\Modules\Supervisors\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupervisorRequest extends FormRequest
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
            'name' => 'required|string|min:5|max:50|unique:admins,name',
            'email' => 'required|email|string|min:5|max:100|unique:admins,email',
            'password' => 'required|string|min:6|max:50,confirmed',
            'password_confirmation' => 'required|string|max:100',
            'roles' => 'array',
            'roles.*' => 'exists:roles,id',
        ];
    }
}
