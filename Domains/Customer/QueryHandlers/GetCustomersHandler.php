<?php
namespace Domains\Customer\QueryHandlers;

use Domains\Customer\Exceptions\CustomerCreateException;
use Domains\Customer\Models\Customer;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GetCustomersHandler
{
    /**
     * @throws Exception
     */
    public function handle($command): Model|Collection|Builder|array|null
    {
        try {
            return $this->getCustomers($command);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    private function getCustomers($command): Model|Collection|Builder|array|null
    {
        return Customer::all();
    }
}
