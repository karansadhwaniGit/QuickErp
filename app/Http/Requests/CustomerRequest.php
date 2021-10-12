<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'first_name'=>['min:3','string','required'],
            'last_name'=>['min:3','string','required'],
            'email'=>['required','email'],
            'gst_no'=>['required','min:15','max:15','unique:customers,gst_no'],
            'phone_no'=>['min:10','max:10','required'],
        ];
    }
}
