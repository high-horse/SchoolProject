<?php

namespace App\Http\Requests\School;

use Illuminate\Foundation\Http\FormRequest;

class ExternalMonitoringStatusForm extends FormRequest
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
        return [
            "teaching_method_id" => "required",
            "child_club" => "sometimes",
            "external_monitoring_status_id.*" => 'required'
        ];
    }
}
