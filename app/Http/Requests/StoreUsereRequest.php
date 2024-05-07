<?php

namespace App\Http\Requests;

use App\Models\Usere;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUsereRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('usere_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:2',
                'max:20',
                'nullable',
            ],
        ];
    }
}
