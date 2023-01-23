<?php

namespace App\Http\Requests\Admin\Items;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'item_category_id' => ['required'],
            'unit_id' => ['required'],
            'name' => ['required'],
            'price' => ['required'],
            'unit_value_of_price' => ['required'],
            'special_discount' => ['nullable'],
            'description' => ['nullable'],
            'enabled' => ['nullable'],
            'out_of_stock' => ['nullable'],
            'photo' => ['nullable'],
        ];
    }
}
