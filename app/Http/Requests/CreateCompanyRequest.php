<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'companyName' => 'required|string|max:255',
            'companyRegistrationNumber' => 'required|string|max:255',
            'companyFoundationDate' => 'required|date_format:Y.m.d',
            'country' => 'required|string|max:128',
            'zipCode' => 'required|string|max:32',
            'city' => 'required|string|max:128',
            'streetAddress' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'companyOwner' => 'required|string|max:128',
            'employees' => 'required|numeric|integer',
            'activity' => 'required|string|max:128',
            'active' => 'required|boolean',
            'email' => 'required|email',
            'password' => 'required|string|max:255',
        ];
    }
}
