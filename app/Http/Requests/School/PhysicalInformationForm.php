<?php

namespace App\Http\Requests\School;

use Illuminate\Foundation\Http\FormRequest;

class PhysicalInformationForm extends FormRequest
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
            "school_location" => "required",
            "ropani" => "present",
            "aana" => "present",
            "paisa" => "present",
            "daam" => "present",
            "biggha" => "present",
            "kattha" => "present",
            "dhur" => "present",
            "total_no_of_computer" => "required",
            "computers_for_teaching" => "present",
            "computer_for_admin" => "present",
            "is_internet" => "required",
            "isp_id" => "present",
            "internet_speed" => "present",
            "isp_contact_no" => "present"
        ];
    }
}
