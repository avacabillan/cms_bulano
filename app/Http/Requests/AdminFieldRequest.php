<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminFieldRequest extends FormRequest
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
            'birth_date' => 'bail|required|max:255',
            'address' => 'required',
            'hired_date' => 'required|numeric',
            'contact' => 'required|digits:11',
            'email' => 'required',
            'department' => 'required',
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
        ];
    }
}
