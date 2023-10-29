<?php
namespace Domains\Customer\Commands;

class DeleteCustomerCommand
{

    public int $customerId;

    function __construct($customerId)
    {
        $this->customerId = $customerId;
    }

}
