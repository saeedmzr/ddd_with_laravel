<?php

namespace Domains\Customer\Repositories;


use App\Models\User;
use Domains\Customer\Models\Customer;

class CustomerRepository
{
    public function __construct(protected Customer $model)
    {
    }

}
