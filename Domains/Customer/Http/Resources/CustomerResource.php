<?php

namespace Domains\Customer\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'Firstname' => $this->Firstname,
            'Lastname' => $this->Lastname,
            'DateOfBirth' => $this->DateOfBirth,
            'Email' => $this->Email,
            'PhoneNumber' => $this->PhoneNumber,
            'BankAccountNumber' => $this->BankAccountNumber,
        ];
    }
}
