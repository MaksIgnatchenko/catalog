<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.12.18
 *
 */

namespace App\Modules\Supervisors\Http\Requests;

use App\Modules\Admins\Http\Requests\UniqueEntityExcept;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSupervisorRequest extends FormRequest
{
    use UniqueEntityExcept;

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
            'name' => 'string|min:5|max:50|unique:admins,name,' . $this->exceptId(),
            'email' => 'email|string|min:5|max:100|unique:admins,email,' . $this->exceptId(),
            'password' => 'nullable|string|min:6|max:50,confirmed',
            'password_confirmation' => 'nullable|string|max:100',
            'roles' => 'array',
            'roles.*' => 'exists:roles,id',
        ];
    }
}
