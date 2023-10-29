<?php

namespace Domains\Customer\Http\Requests;


use Domains\Customer\Http\Rules\ValidPhoneNumberRole;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class CustomerStoreRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY));
    }

    public function rules(): array
    {

        return [
            'Firstname' => 'required|string|max:60',
            'Lastname' => 'required|string|max:60',
            'DateOfBirth' => 'nullable|date',
            'BankAccountNumber' => 'nullable|alpha_dash|max:32',
            'PhoneNumber' => ['required', new ValidPhoneNumberRole],
            'Email' => ['required', 'email', 'unique:customers,email'],
        ];
    }
}
