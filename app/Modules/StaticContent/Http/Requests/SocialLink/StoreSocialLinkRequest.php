<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 09.12.18
 *
 */

namespace App\Modules\StaticContent\Http\Requests\SocialLink;

use App\Modules\StaticContent\Enums\SocialResourceEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSocialLinkRequest extends FormRequest
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
            'social_resource' => ['required', 'string', Rule::in(SocialResourceEnum::getAvailable()), 'unique:social_links,social_resource'],
            'url' => 'required|max:1000|url',
            'alt' => 'string|max:100'
        ];
    }

}