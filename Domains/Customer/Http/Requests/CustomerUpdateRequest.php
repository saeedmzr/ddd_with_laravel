<?php

namespace Domains\Customer\Http\Requests;

use Domains\Customer\Http\Rules\ValidPhoneNumberRole;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class CustomerUpdateRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        if (!empty($validator->errors()->messages()['id'])) {
            throw new HttpResponseException(response()->json(['errors' => $validator->errors()->messages()['id']], Response::HTTP_NOT_FOUND));
        } else {
            throw new HttpResponseException(response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY));
        }
    }

    protected function prepareForValidation(): void
    {
        $this->merge(['id' => $this->route('customer')]);
    }


    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:customers,id',],
            'Firstname' => 'nullable|max:60',
            'Lastname' => 'nullable|string|max:60',
            'DateOfBirth' => 'nullable|date',
            'PhoneNumber' => ['nullable', 'regex:/^\+1 \d{3}-\d{3}-\d{4}$/', new ValidPhoneNumberRole],
            'Email' => 'nullable|email|unique:customers,email,' . $this->id,
            'BankAccountNumber' => 'nullable|alpha_dash|max:32',
        ];
    }

}
