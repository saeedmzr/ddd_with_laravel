<?php

namespace Domains\Customer\CommandHandlers;

use Domains\Customer\Exceptions\CustomerCreateException;
use Domains\Customer\Models\Customer;
use Domains\Customer\Services\EventStore;
use Illuminate\Support\Facades\DB;

class CreateCustomerHandler
{
    /**
     * @throws CustomerCreateException
     */
    public function handle($command)
    {
        DB::beginTransaction();
        try {
            $customer = $this->saveCustomer($command);
            DB::commit();
            EventStore::append('CreateCustomerCommand', (array)$command);
            return $customer;

        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomerCreateException($e->getMessage());
        }
    }

    private function saveCustomer($command)
    {
        return Customer::query()->create((array)$command);
    }
}
