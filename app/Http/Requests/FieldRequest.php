<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FieldRequest extends FormRequest
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
        'ocn' => 'bail|required|max:255',
        'client_name' => 'required|min:5',
        'email' => 'required|email|unique:users',
        'tin' => 'required|numeric',
        'client_contact' => 'required|numeric',
        'tin_no' => 'required|numeric',
        'reg_date' => 'required',
        'trade_name' => 'required',
        'corporate' => 'required',
        'assoc' => 'required',
        'mode' => 'required',
        'unit_house_no' => 'required',
        'street' => 'required',
        'client_city' => 'required',
        'client_province' => 'required',
        'client_postal' => 'required',
        'taxesChecked[]' =>'required',
        ];
    }
}
