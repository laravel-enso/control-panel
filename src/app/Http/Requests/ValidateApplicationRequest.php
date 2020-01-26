<?php

namespace LaravelEnso\ControlPanel\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
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
            'name' => ['required', $this->nameUnique()],
            'type' => 'required|in:'.ApplicationTypes::keys()->implode(','),
            'url' => 'required',
            'forge_url' => 'required',
            'envoyer_url' => 'required',
            'gitlab_project_id' => 'required',
            'sentry_project_uri' => 'required',
            'description' => 'nullable',
            'token' => 'required',
            'order_index' => 'numeric|required',
            'is_active' => 'required|boolean',
        ];
    }

    private function nameUnique()
    {
        return Rule::unique('applications', 'name')
            ->ignore(optional($this->route('application'))->id);
    }
}
