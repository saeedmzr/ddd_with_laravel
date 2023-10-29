<?php

namespace Domains\Customer\Events;

use Illuminate\Support\Facades\Event;

class CustomerDeletedEvent extends Event
{
    public int $customerId;

    function __construct($customerId)
    {
        $this->customerId = $customerId;
    }

}
