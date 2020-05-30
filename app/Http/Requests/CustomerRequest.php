<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

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
            'name' => 'required|min:5|max:25',
            'age' => 'required|min:1|max:3',
            'mail' => 'required|email'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => trans('customer.errors.name.required'),
            'name.max' => trans('customer.errors.name.max'),
            'name.min' => trans('customer.errors.name.min'),
            'age.required' => trans('customer.errors.age.required'),
            'age.max' => trans('customer.errors.age.max'),
            'age.min' => trans('customer.errors.age.min'),
            'mail.required' => trans('customer.errors.mail.required'),
            'mail.email' => trans('customer.errors.mail.email'),
        ];
    }
    // public function failedValidation(Validator $validator){
    //     dd($validator);
    // }
}
