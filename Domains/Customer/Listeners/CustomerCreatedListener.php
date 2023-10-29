<?php

namespace Domains\Customer\Listeners;

use Domains\Customer\Events\CustomerCreatedEvent;
use Domains\Customer\Services\EventStore;
use Illuminate\Queue\Listener;

class CustomerCreatedListener extends Listener
{
    public function handle(CustomerCreatedEvent $customerCreatedEvent)
    {
        $data = [
            'Firstname' => $customerCreatedEvent->firstName,
            'Lastname' => $customerCreatedEvent->lastName,
            'Email' => $customerCreatedEvent->email,
            'PhoneNumber' => $customerCreatedEvent->phoneNumber,
            'DateOfBirth' => $customerCreatedEvent->dateOfBirth,
            'BankAccountNumber' => $customerCreatedEvent->bankAccountNumber,
        ] ;



    }
}
