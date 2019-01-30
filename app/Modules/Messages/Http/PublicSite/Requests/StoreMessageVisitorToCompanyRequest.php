<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 29.01.19
 *
 */

namespace App\Modules\Messages\Http\PublicSite\Requests;

use App\Helpers\PostgresConstraints;
use App\Modules\Messages\AbstractRequests\StoreMessageRequestAbstract;

class StoreMessageVisitorToCompanyRequest extends StoreMessageRequestAbstract
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'recipientable_id' => 'int|min:0|max:' . PostgresConstraints::MAX_ID_VALUE . '|exists:companies,id',
            'purpose' => 'nullable',
        ];
        return array_merge(parent::rules(), $rules);
    }
}