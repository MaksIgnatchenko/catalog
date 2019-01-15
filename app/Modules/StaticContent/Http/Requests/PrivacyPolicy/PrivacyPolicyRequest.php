<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 02.01.19
 *
 */

namespace App\Modules\StaticContent\Http\Requests\WhoWeAre;

use App\Modules\Languages\Rules\HasDefaultTranslationRule;
use App\Modules\Languages\Rules\LanguageRule;
use App\Modules\StaticContent\Enums\ContentTypeEnum;
use App\Modules\StaticContent\Enums\StaticContentStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PrivacyPolicyRequest extends FormRequest
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
            'status' => ['required', 'string', 'min:1', 'max:100', Rule::in(StaticContentStatusEnum::getAvailable())],
            'content_type' => ['required', 'string', 'min:1', 'max:100', Rule::in(ContentTypeEnum::getAvailable())],
            'payload' => ['required', 'array', new LanguageRule(), new HasDefaultTranslationRule()],
            'payload.*' => 'nullable|string|max:1000',
        ];
    }

    /**
     * Get all of the input and files for the request.
     *
     * @param  array|mixed  $keys
     * @return array
     */
    public function all($keys = null) : array
    {
        $inputFields = parent::all();
        $inputFields['status'] = $inputFields['status'] ?? StaticContentStatusEnum::BLOCK;
        return $inputFields;
    }

}