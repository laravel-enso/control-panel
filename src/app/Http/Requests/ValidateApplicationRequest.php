<?php

namespace LaravelEnso\ControlPanel\App\Http\Requests;

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
            'forge' => 'required',
            'envoyer' => 'required',
            'gitlab' => 'required',
            'sentry' => 'required',
            'description' => 'nullable',
            'token' => 'required',
            'order_index' => 'numeric|required',
            'is_active' => 'required|boolean',
        ];
    }
}
