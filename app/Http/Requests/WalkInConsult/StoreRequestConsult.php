<?php

namespace App\Http\Requests\WalkInConsult;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestConsult extends FormRequest
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
            'medication_intake' => 'required',
            'medical_history' => 'required',
            'vaccine_received' => 'required',
            'diagnosis' => 'required'
        ];
    }
}
