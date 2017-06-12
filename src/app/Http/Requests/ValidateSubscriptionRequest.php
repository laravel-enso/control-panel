<?php

namespace LaravelEnso\AppStatisticsClient\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSubscriptionRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        return [

            'client_id'   => 'required',
            'secret'      => 'required',
            'name'        => 'required',
            'description' => 'required',
        ];
    }
}
