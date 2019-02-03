<?php

namespace LaravelEnso\ControlPanel\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'type' => 'required',
            'url' => 'required',
            'description' => 'nullable',
            'token' => 'required',
            'order_index' => 'numeric|required',
        ];
    }
}
