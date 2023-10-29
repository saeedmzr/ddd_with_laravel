<?php

namespace Domains\Customer\Http\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class CustomerFindRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], Response::HTTP_NOT_FOUND));
    }

    protected function prepareForValidation(): void
    {
        $this->merge(['id' => $this->route('customer')]);
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:customers,id',],
        ];
    }
}
