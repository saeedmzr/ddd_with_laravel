<?php
namespace Domains\Customer\Commands;

class UpdateCustomerCommand
{

    public int $customerId;
    public array $payload;

    function __construct($customerId, $payload)
    {
        $this->customerId = $customerId;
        $this->payload = $payload;
    }

}
