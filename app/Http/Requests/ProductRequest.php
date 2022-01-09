<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:200',
            'slug' => 'required|max:500',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|max:1000',
            'price' => 'required|numeric',
            'image' => 'mimes:jpeg,png,jpg,gif|max:10048|nullable',
        ];
    }
}
