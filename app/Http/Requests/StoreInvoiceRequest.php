<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'outlet' => [
                'required',
                'exists:outlets,id'
            ],
            'period' => [
                'required',
                'string'
            ]
        ];
    }
}
