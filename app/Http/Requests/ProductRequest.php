<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name'=>['required','unique:Customers,product_name'],
            'specification'=>['required'],
            'hsn'=>['required','max:6','integer'],
            'suppliers'=>['required'],
            'category'=>['required'],
            'selling_price'=>['required','integer'],
            'eoq'=>['required','integer'],
            'danger_level'=>['required','integer']

        ];
    }
}
