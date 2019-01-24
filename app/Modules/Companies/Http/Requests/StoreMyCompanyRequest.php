<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 21.01.19
 *
 */

namespace App\Modules\Companies\Http\Requests;

class StoreMyCompanyRequest extends StoreCompanyRequestAbstract
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string|min:1|max:100|unique:companies,name',
            'terms_accept' => 'accepted',
            'policy_accept' => 'accepted',
        ];

        return array_merge(parent::rules(), $rules);
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        $defaultMessages = parent::messages();
        $otherMessages = [
            'terms_accept.accepted' => 'You have to read and accept terms and conditions',
            'policy_accept.accepted' => 'You have to read and accept privacy policy',
        ];
        return array_merge($defaultMessages, $otherMessages);
    }
}
