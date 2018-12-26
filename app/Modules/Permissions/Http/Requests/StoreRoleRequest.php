<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.12.18
 *
 */

namespace App\Modules\Permissions\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:20',
            'description' => 'required|string|min:10|max:300',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ];
    }
}
