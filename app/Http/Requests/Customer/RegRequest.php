<?php

namespace App\Http\Requests\Customer;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class RegRequest extends FormRequest
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
            'email'             =>'required|email|unique:customer_registrations',
            'firstname'         =>'required',
            'lastname'          =>'required',
            'day'               =>'required',
            'month'             =>'required',
            'year'              =>'required',
            'mobile'            =>'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'email.required'        => __('customer/regrequest.VALIDATION.EMAIL'),
            'email.unique'          => __('customer/regrequest.VALIDATION.EMAIL_UNIQUE'),
            'email.email'           => __('customer/regrequest.VALIDATION.EMAIL_VALID'),
            'firstname.required'    => __('customer/regrequest.VALIDATION.FIRSTNAME'),
            'lastname.required'     => __('customer/regrequest.VALIDATION.LASTNAME'),
            'day.required'      => __('customer/regrequest.VALIDATION.DAY'),
            'month.required'          => __('customer/regrequest.VALIDATION.MONTH'),
            'year.required'         => __('customer/regrequest.VALIDATION.YEAR'),
            'mobile.required'        => __('customer/regrequest.VALIDATION.TELEPHONE')
        ];
    }

    public function failedValidation(Validator $validator)
    {

        $response = response()->json([
                'status' => 1,
                'error' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ], 422);

        throw new ValidationException($validator,$response);


    }

}
