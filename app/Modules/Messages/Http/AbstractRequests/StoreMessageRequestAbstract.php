<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 29.01.2019
 *
 */

namespace App\Modules\Messages\AbstractRequests;

use App\Modules\Messages\Enums\MessagePurposeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

abstract class StoreMessageRequestAbstract extends FormRequest
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
            'purpose' => ['required', 'string', 'min:3', 'max:20', Rule::in(MessagePurposeEnum::getAvailable())],
            'message' => 'string|max:10000',
            'file' => 'max:' . config('app_config.file_max_size'),
        ];
    }
}
