<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'productName' => [
                'required',
                'string',
            ],
            'shortDescription' => [
                'required',
                'string',
            ],
            'fullDescription' => [
                'nullable',
            ],
            'sku' => [
                'nullable',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'manufacturer' => [
                'nullable',
                'integer',
            ],
            'productType' => [
                'nullable',
            ],
            // 'productAttribute' => [
            //     'nullable',
            //     'integer',
            // ],
            'displayOrder' => [
                'nullable',
            ],
            'price' => [
                'required',
                'integer',
            ],
            'oldPrice' => [
                'nullable',
                'integer',
            ],
            'productCost' => [
                'nullable',
                'integer',
            ],
            'inventoryMethod' => [
                'nullable',
            ],
            'stockQuantity' => [
                'required',
                'integer',
            ],
            'warehouse' => [
                'nullable',
            ],
            'minCartQuantity' => [
                'nullable',
                'integer',
            ],
            'maxCartQuantity' => [
                'nullable',
                'integer',
            ],
            'seoPageName' => [
                'required',
                'string',
            ],
            'metaTitle' => [
                'nullable',
            ],
            'metaKeywords' => [
                'nullable',
            ],
            'metaDescription' => [
                'nullable',
            ],
            'image' => [
                'nullable',
                // 'image|mimes:jpg,jpeg,png',
            ],
            'imageTitle' => [
                'nullable',
            ],
            'imageAlt' => [
                'nullable',
            ],
            // 'imageDisplayOrder' => [
            //     'nullable',
            // ],
        ];
    }
}
