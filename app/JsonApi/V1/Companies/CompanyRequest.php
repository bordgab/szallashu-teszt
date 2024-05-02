<?php

namespace App\JsonApi\V1\Companies;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class CompanyRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'companyName' => ['required', 'string', 'max:255'],
            'companyRegistrationNumber' => ['required', 'string', 'max:255'],
            'companyFoundationDate' => ['required', 'date_format:Y.m.d'],
            'country' => ['required', 'string', 'max:128'],
            'zipCode' => ['required', 'string', 'max:32'],
            'city' => ['required', 'string', 'max:128'],
            'streetAddress' => ['required', 'string', 'max:255'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'companyOwner' => ['required', 'string', 'max:128'],
            'employees' => ['required', 'numeric', 'integer'],
            'activity' => ['required', 'string', 'max:128'],
            'active' => ['required', 'boolean'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'max:255'],
        ];
    }

}
