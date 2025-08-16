<?php

namespace App\Http\Requests;

use App\Models\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_create');
    }

    public function rules()
    {
        return [
            'client_name' => [
                'string',
                'nullable',
            ],
            'client_phone_number' => [
                'string',
                'nullable',
            ],
            'client_address' => [
                'string',
                'nullable',
            ],
        ];
    }
}
