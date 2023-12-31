<?php

namespace App\Http\Requests\WalkInApp;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'mother_name' => 'required',
            'father_name' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'age' => 'required',
            'type_consult' => 'required',
            'date_consultation' => 'required',
            'time_consultation' => 'required',
        ];
    }
}
