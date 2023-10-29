<?php
namespace Domains\Customer\CommandHandlers;

use Domains\Customer\Exceptions\CustomerCreateException;
use Domains\Customer\Models\Customer;
use Domains\Customer\Services\EventStore;
use Illuminate\Support\Facades\DB;

class DeleteCustomerHandler
{
    /**
     * @throws CustomerCreateException
     */
    public function handle($command): void
    {
        DB::beginTransaction();
        try {
            $this->deleteCustomer($command);
            DB::commit();
            EventStore::append('DeleteCustomerCommand',(array)$command);

        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomerCreateException($e->getMessage());
        }
    }

    private function deleteCustomer($command): void
    {
        $customerId = $command->customerId;

        $customer = Customer::query()->find($customerId);
        $customer->delete();
    }
}
