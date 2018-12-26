<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.12.18
 *
 */

namespace App\Modules\Permissions\Http\Requests;

use App\Modules\Admins\Http\Requests\UniqueEntityExcept;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
            'name' => 'string|min:3|max:20|unique:roles,display_name,' . $this->exceptId(),
            'description' => 'string|min:10|max:300',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ];
    }
}
