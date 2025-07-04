<?php

namespace App\Http\Requests;

use App\Models\Nav;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNavRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('nav_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'link' => [
                'string',
                'required',
            ],
            'position' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
