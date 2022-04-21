<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssocFieldRequest extends FormRequest
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
            'assoc_name' => 'bail|required|max:255',
            'assoc_email' => 'required',
            'assoc_sss' => 'required|numeric',
            'assoc_contact' => 'required|numeric',
            'assoc_birthdate' => 'required',
            'assoc_address' => 'required',
            'username' => 'required',
            'position' => 'required',
            'hired_date' => 'required',
        ];
    }
}
