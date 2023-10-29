<?php

namespace Domains\Customer\CommandHandlers;

use Domains\Customer\Exceptions\CustomerCreateException;
use Domains\Customer\Models\Customer;
use Domains\Customer\Services\EventStore;
use Illuminate\Support\Facades\DB;

class UpdateCustomerHandler
{
    /**
     * @throws CustomerCreateException
     */
    public function handle($command): void
    {
        DB::beginTransaction();
        try {
            $this->updateCustomer($command);
            DB::commit();
            EventStore::append('UpdateCustomerCommand', (array)$command);
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomerCreateException($e->getMessage());
        }
    }

    private function updateCustomer($command): void
    {
        $customerId = $command->customerId;
        $payload = $command->payload;

        $customer = Customer::query()->find($customerId);
        $customer->update($payload);
    }
}
