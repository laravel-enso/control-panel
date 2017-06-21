<?php

namespace LaravelEnso\ControlPanel\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAppSubscriptionRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $clientId = 'nullable';

        if (request()->has('type') && request()->get('type') == 2) {
            $clientId = 'required';
        }

        return [

            'client_id'   => $clientId,
            'url'         => 'required',
            'type'        => 'required',
            'secret'      => 'required',
            'name'        => 'required',
            'description' => 'nullable',
        ];
    }
}
