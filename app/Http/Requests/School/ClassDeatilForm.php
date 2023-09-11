<?php

namespace App\Http\Requests\School;

use Illuminate\Foundation\Http\FormRequest;

class ClassDeatilForm extends FormRequest
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
            "no_of_male.*" => 'required',
            "no_of_female.*" => 'required',
            "extra_class_room_id.*" => 'required'
        ];
    }
}
