<?php

namespace App\Http\Requests;

use App\Models\Sale;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSaleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sale_create');
    }

    public function rules()
    {
        return [
            'product_name' => [
                'string',
                'nullable',
            ],
            
            'price.*'        => ['numeric', 'nullable'],
            'quantity.*'     => ['numeric', 'nullable'],
            'total_amount.*' => ['numeric', 'nullable'],

            'sub_total' => [
                'string',
                'nullable',
            ],
            'discount' => [
                'string',
                'nullable',
            ],
            'tax_rate' => [
                'string',
                'nullable',
            ],
            'total_payable' => [
                'string',
                'nullable',
            ],
            'amount_payable' => [
                'string',
                'nullable',
            ],
        ];
    }
}
