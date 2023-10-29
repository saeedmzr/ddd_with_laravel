<?php
namespace Domains\Customer\Queries;

class GetCustomerByIdQuery
{

    public string $customerId;

    function __construct($customerId)
    {
        $this->customerId = $customerId;
    }

}
