<?php

namespace LaravelEnso\ControlPanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use LaravelEnso\ControlPanel\Enums\ApplicationTypes;
use LaravelEnso\Helpers\Traits\FiltersRequest;

class ValidateApplicationRequest extends FormRequest
{
    use FiltersRequest;

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
            'forge_url' => 'nullable|string',
            'envoyer_url' => 'nullable|string',
            'gitlab_project_id' => 'nullable|numeric',
            'sentry_project_uri' => 'nullable|string',
            'description' => 'nullable',
            'token' => $this->token(),
            'order_index' => 'numeric|required',
            'is_active' => 'required|boolean',
        ];
    }

    private function nameUnique()
    {
        return Rule::unique('applications', 'name')
            ->ignore(optional($this->route('application'))->id);
    }

    private function token()
    {
        return $this->method() === 'POST'
            ? 'required'
            : 'nullable';
    }
}
