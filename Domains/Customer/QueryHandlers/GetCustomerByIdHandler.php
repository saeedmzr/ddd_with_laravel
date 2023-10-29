<?php
namespace Domains\Customer\QueryHandlers;

use Domains\Customer\Exceptions\CustomerCreateException;
use Domains\Customer\Models\Customer;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GetCustomerByIdHandler
{
    /**
     * @throws Exception
     */
    public function handle($command): Model|Collection|Builder|array|null
    {
        try {
            return $this->getCustomer($command);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    private function getCustomer($command): Model|Collection|Builder|array|null
    {
        $customerId = $command->customerId;

        return Customer::query()->find($customerId);

    }
}
