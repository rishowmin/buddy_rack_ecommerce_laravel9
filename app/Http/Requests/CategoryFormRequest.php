<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
            'categoryName' => [
                'required',
                'string'
            ],
            'description' => [
                'required'
            ],
            'image' => [
                'nullable',
                'mimes:jpg,jpeg,png',
            ],
            'parentCategory' => [
                'nullable'
            ],
            'displayOrder' => [
                'nullable'
            ],
            'seoPageName' => [
                'required',
                'string'
            ],
            'metaTitle' => [
                'required',
                'string'
            ],
            'metaKeywords' => [
                'required',
                'string'
            ],
            'metaDescription' => [
                'required',
                'string'
            ],
        ];
    }
}
