<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

namespace App\Modules\Advertisement\Http\Requests;

use App\Modules\Advertisement\Enums\AdblockPositionsEnum;
use App\Modules\Advertisement\Enums\AdblockTypesEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAdblockRequest extends FormRequest
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
            'type' => ['bail', 'required', Rule::in(AdblockTypesEnum::getPositions())],
            'position' => ['bail', 'required', Rule::in(AdblockPositionsEnum::getPositions($this->type))],
            'url' => 'required|url|max:255',
            'image' => 'required|image|mimes:jpeg,png,bmp,gif|max:5120',
            'country_id' => 'nullable|integer|exists:geography_countries,id',
            'city_id' => 'nullable|integer|exists:geography_cities,id',
            'description' => 'required|string|min:10|max:300',
            'appear_start' => 'required|date|after:yesterday',
            'appear_finish' => 'required|int|min:1|max:10000',
        ];
    }
}
