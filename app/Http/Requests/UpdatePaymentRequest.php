<?php

namespace App\Http\Requests;

use App\Models\Payment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_edit');
    }

    public function rules()
    {
        return [
            'product_name' => [
                'string',
                'nullable',
            ],
            'invoice' => [
                'string',
                'nullable',
            ],
            'amount_paid' => [
                'string',
                'nullable',
            ],
            'payment_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
