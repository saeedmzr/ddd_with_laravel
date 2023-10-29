<?php

namespace Domains\Customer\Services;


use Domains\Customer\CommandHandlers\CreateCustomerHandler;
use Domains\Customer\CommandHandlers\DeleteCustomerHandler;
use Domains\Customer\CommandHandlers\UpdateCustomerHandler;
use Domains\Customer\Commands\CreateCustomerCommand;
use Domains\Customer\Commands\DeleteCustomerCommand;
use Domains\Customer\Commands\UpdateCustomerCommand;
use Domains\Customer\Queries\GetCustomerByIdQuery;
use Domains\Customer\Queries\GetCustomersQuery;
use Domains\Customer\QueryHandlers\GetCustomerByIdHandler;
use Domains\Customer\QueryHandlers\GetCustomersHandler;
use Illuminate\Contracts\Container\BindingResolutionException;
use Joselfonseca\LaravelTactician\CommandBusInterface;


class CustomerService
{
    private CommandBusInterface $bus;

    public function __construct()
    {
        $this->bus = app(CommandBusInterface::class);
    }

    public function createCustomer(array $payload)
    {
        $this->bus->addHandler(CreateCustomerCommand::class, CreateCustomerHandler::class);
        return $this->bus->dispatch(CreateCustomerCommand::class, $payload);
    }

    public function updateCustomer(array $payload , $customerId)
    {
        $this->bus->addHandler(UpdateCustomerCommand::class, UpdateCustomerHandler::class);
        return $this->bus->dispatch(UpdateCustomerCommand::class, ['customerId'=> $customerId , 'payload' =>$payload] );
    }

    public function deleteCustomer($customerId)
    {
        $this->bus->addHandler(DeleteCustomerCommand::class, DeleteCustomerHandler::class);
        return $this->bus->dispatch(DeleteCustomerCommand::class, ['customerId'=>$customerId]);
    }

    public function getCustomer(array $array)
    {
        $this->bus->addHandler(GetCustomerByIdQuery::class, GetCustomerByIdHandler::class);
        return $this->bus->dispatch(GetCustomerByIdQuery::class, $array);
    }

    /**
     * @throws BindingResolutionException
     * @throws \Exception
     */
    public function getCustomers()
    {
        $this->bus->addHandler(GetCustomersQuery::class, GetCustomersHandler::class);
        return $this->bus->dispatch(GetCustomersQuery::class);
    }
}
