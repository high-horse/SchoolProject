<?php

namespace App\Http\Requests\setting;

use Illuminate\Foundation\Http\FormRequest;

class MedicalFacilityForm extends FormRequest
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
            "first_aid_service" => "required",
            "transport_facility" => "present",
            "urinal_teacher" => "required",
            "urinal_boy" => "required",
            "no_of_toilet_boy" => "required",
            "no_of_toilet_girl" => "required",
            "no_of_toilet_teacher" => "required",
            "no_of_toilet_with_water_facility" => "required"
        ];
    }
}
