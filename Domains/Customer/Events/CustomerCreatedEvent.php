<?php

namespace Domains\Customer\Events;

use Illuminate\Support\Facades\Event;

class CustomerCreatedEvent extends Event
{
    public string $firstName;
    public string $lastName;
    public string $dateOfBirth;
    public string $email;
    public string $phoneNumber;
    public string $bankAccountNumber;

    function __construct($firstName, $lastName, $dateOfBirth, $email, $phoneNumber, $bankAccountNumber)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dateOfBirth = $dateOfBirth;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->bankAccountNumber = $bankAccountNumber;
    }
}
