<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class Regrequest extends FormRequest
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
            'email'             =>'required|email|unique:landlord_registrations',
            'firstname'         =>'required',
            'lastname'          =>'required',
            'zip'               =>'required',
            'city'              =>'required',
            'address'           =>'required',
            'telephone'         =>'required'
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
            'email.required'        => __('landlord/regrequest.VALIDATION.EMAIL'),
            'email.unique'          => __('landlord/regrequest.VALIDATION.EMAIL_UNIQUE'),
            'email.email'           => __('landlord/regrequest.VALIDATION.EMAIL_VALID'),
            'firstname.required'    => __('landlord/regrequest.VALIDATION.FIRST_NAME'),
            'lastname.required'     => __('landlord/regrequest.VALIDATION.LAST_NAME'),
            'address.required'      => __('landlord/regrequest.VALIDATION.ADDRESS'),
            'zip.required'          => __('landlord/regrequest.VALIDATION.ZIP'),
            'city.required'         => __('landlord/regrequest.VALIDATION.CITY'),
            'telephone.required'        => __('landlord/regrequest.VALIDATION.TELEPHONE')
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
