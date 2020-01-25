<?php

namespace LaravelEnso\ControlPanel\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LaravelEnso\ControlPanel\App\Enums\ApplicationTypes;

class ValidateApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:applications,name',
            'type' => 'required|in:'.ApplicationTypes::keys()->implode(','),
            'url' => 'required',
            'forge_url' => 'required',
            'envoyer_url' => 'required',
            'gitlab_project_id' => 'required',
            'sentry_project_slug' => 'required',
            'description' => 'nullable',
            'token' => 'required',
            'order_index' => 'numeric|required',
            'is_active' => 'required|boolean',
        ];
    }
}
