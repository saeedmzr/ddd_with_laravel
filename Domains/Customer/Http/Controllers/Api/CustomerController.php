<?php

namespace Domains\Customer\Http\Controllers\Api;

use Domains\Customer\Http\Requests\CustomerDeleteRequest;
use Domains\Customer\Http\Requests\CustomerFindRequest;
use Domains\Customer\Http\Requests\CustomerStoreRequest;
use Domains\Customer\Http\Requests\CustomerUpdateRequest;
use Domains\Customer\Http\Resources\CustomerResource;
use Domains\Customer\Services\CustomerService;
use Illuminate\Contracts\Container\BindingResolutionException;

class CustomerController extends BaseController
{

    public function __construct(private readonly CustomerService $customerService)
    {
    }

    /**
     * @throws BindingResolutionException
     */
    public function index()
    {
        $customers = $this->customerService->getCustomers();
        return self::successResponse(
            CustomerResource::collection($customers),
            'Customers List has been generated successfully.',
        );
    }

    public function show(CustomerFindRequest $request)
    {
        $customer = $this->customerService->getCustomer(['customerId' => $request->id]);
        return self::successResponse(
            new CustomerResource($customer),
            'Customer show has been generated successfully.',
        );
    }

    public function store(CustomerStoreRequest $request)
    {
        $customer = $this->customerService->createCustomer($request->validated());

        return self::successResponse(
            new CustomerResource($customer),
            'Customer has been created successfully.', 201);
    }

    public function update(CustomerUpdateRequest $request, $customerId)
    {
        $this->customerService->updateCustomer($request->validated(), $customerId);
        $customer = $this->customerService->getCustomer(['customerId' => $customerId]);
        return self::successResponse(
            new CustomerResource($customer),
            'Customer has been updated successfully.');
    }

    public function destroy(CustomerDeleteRequest $request)
    {
        $customer = $this->customerService->getCustomer(['customerId' => $request->id]);
        $this->customerService->deleteCustomer($request->id);
        return self::successResponse(
            new CustomerResource($customer),
            'Customer has been deleted successfully.');
    }
}
