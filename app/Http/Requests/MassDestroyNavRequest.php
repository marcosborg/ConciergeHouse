<?php

namespace App\Http\Requests;

use App\Models\Nav;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNavRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('nav_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:navs,id',
        ];
    }
}
