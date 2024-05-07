<?php

namespace App\Http\Requests;

use App\Models\UserProduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_product_edit');
    }

    public function rules()
    {
        return [
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
