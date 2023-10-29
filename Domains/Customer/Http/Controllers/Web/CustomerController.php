<?php

namespace Domains\Customer\Http\Controllers\Web;

use Domains\Customer\Http\Requests\CustomerDeleteRequest;
use Domains\Customer\Http\Requests\CustomerFindRequest;
use Domains\Customer\Http\Requests\CustomerStoreRequest;
use Domains\Customer\Http\Requests\CustomerUpdateRequest;
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
        return view('customer::admin.customer.all', compact('customers'));
    }

    public function create()
    {
        return view('customer::admin.customer.new');
    }

    public function edit(CustomerFindRequest $request)
    {
        $customer = $this->customerService->getCustomer(['customerId' => $request->id]);
        return view('customer::admin.customer.edit', compact('customer'));
    }

    public function store(CustomerStoreRequest $request)
    {
        $this->customerService->createCustomer($request->validated());
        return redirect()->route('customers.index');

    }

    public function update(CustomerUpdateRequest $request, $customerId)
    {
        $this->customerService->updateCustomer($request->validated(),$customerId);
        return redirect()->route('customers.index');
    }

    public function destroy(CustomerDeleteRequest $request )
    {
        $this->customerService->deleteCustomer($request->id);
        return redirect()->route('customers.index');
    }
}
