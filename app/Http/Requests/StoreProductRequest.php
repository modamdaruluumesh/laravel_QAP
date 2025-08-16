<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_create');
    }

    public function rules()
    {
        return [
            'product_name' => [
                'string',
                'nullable',
            ],
            'product_image' => [
               
                'nullable',
            ],
            'product_code' => [
                'string',
                'nullable',
            ],
            'product_price' => [
                'string',
                'nullable',
            ],
            'product_breif_info' => [
                'string',
                'nullable',
            ],
        ];
    }
}
