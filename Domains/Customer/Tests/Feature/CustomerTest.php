<?php

namespace Domains\Customer\Tests\Feature;

use Domains\Customer\Models\Customer;
use Tests\TestCase;

class CustomerTest extends TestCase
{

    public function testCreateCustomer()
    {
        $customerData = [
            'Firstname' => 'John',
            'Lastname' => 'Doe',
            'Email' => 'johndoe@example.com',
            'PhoneNumber' => '09378196415',
            'BankAccountNumber' => '3232-2323-2323-2323',
            'DateOfBirth' => '2022-12-6',
        ];

        $response = $this->postJson('/api/customers', $customerData);


        $createdCustomer = Customer::query()->find($response->json('data')['id']);

        $this->assertEquals($customerData['Firstname'], $createdCustomer->Firstname);
        $this->assertEquals($customerData['Email'], $createdCustomer->Email);
        $response->assertStatus(201);

    }

    public function testUpdateCustomerDetails()
    {
        $customer = Customer::factory()->create(['Firstname' => 'John']);
        $updatedData = [
            'Firstname' => 'Jane',
        ];

        $response = $this->putJson('/api/customers/' . $customer->id, $updatedData);


        $updatedCustomer = Customer::query()->find($customer->id);
        $this->assertEquals($updatedData['Firstname'], $updatedCustomer->Firstname);
        $response->assertStatus(200);
    }

    public function testRetrieveCustomerDetails()
    {
        $customer = Customer::factory()->create();

        $response = $this->getJson('/api/customers/' . $customer->id);

        $retrievedCustomer = $response->json();
        $this->assertEquals($customer->Firstname, $retrievedCustomer['data']['Firstname']);
        $this->assertEquals($customer->Email, $retrievedCustomer['data']['Email']);
        $response->assertStatus(200);
    }

    public function testDeleteCustomer()
    {
        $customer = Customer::factory()->create();

        $response = $this->deleteJson('/api/customers/' . $customer->id);

        $this->assertSoftDeleted('customers', ['id' => $customer->id]);
        $response->assertStatus(200);
    }

    public function testInvalidIdDeleteCustomer()
    {
        $customer = Customer::factory()->create();

        $invalidId = '7777';
        $response = $this->deleteJson('/api/customers/' . $invalidId);

        $response->assertStatus(404);
    }

    // Acceptance Tests
    public function testCreateCustomerThroughApi()
    {
        $customerData = [
            'Firstname' => 'John',
            'Lastname' => 'Doe',
            'Email' => 'johndoe@example.com',
            'PhoneNumber' => '09378196415',
            'BankAccountNumber' => '3232-2323-2323-2323',
            'DateOfBirth' => '2022-12-6',
        ];

        $response = $this->postJson('/api/customers', $customerData);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [

                    'Firstname' => 'John',
                    'Lastname' => 'Doe',
                    'Email' => 'johndoe@example.com',
                    'PhoneNumber' => '09378196415',
                    'BankAccountNumber' => '3232-2323-2323-2323',
                    'DateOfBirth' => '2022-12-6',

                ]

            ]);
    }

    public function testUpdateCustomerDetailsThroughApi()
    {
        $customer = Customer::factory()->create(['Firstname' => 'John', 'Lastname' => 'Doe']);
        $updatedData = [
            'Lastname' => 'Smith',
        ];

        $response = $this->putJson('/api/customers/' . $customer->id, $updatedData);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [

                    'id' => $customer->id,
                    'Firstname' => $customer->Firstname,
                    'Lastname' => 'Smith',
                    'DateOfBirth' => $customer->DateOfBirth,
                    'Email' => $customer->Email,
                    'PhoneNumber' => $customer->PhoneNumber,
                    'BankAccountNumber' => $customer->BankAccountNumber,

                ]
            ]);
    }

    public function testRetrieveCustomerDetailsThroughApi()
    {
        $customer = Customer::factory()->create();

        $response = $this->getJson('/api/customers/' . $customer->id);

        $response->assertStatus(200)
            ->assertJson([
                'data' =>
                    [

                        'id' => $customer->id,
                        'Firstname' => $customer->Firstname,
                        'Lastname' => $customer->Lastname,
                        'DateOfBirth' => $customer->DateOfBirth,
                        'Email' => $customer->Email,
                        'PhoneNumber' => $customer->PhoneNumber,
                        'BankAccountNumber' => $customer->BankAccountNumber,

                    ]
            ]);
    }

    public function testDeleteCustomerThroughApi()
    {
        $customer = Customer::factory()->create();

        $response = $this->deleteJson('/api/customers/' . $customer->id);

        $response->assertStatus(200);
        $this->assertSoftDeleted('customers', ['id' => $customer->id]);
    }

    // Failure Tests
    public function testCreateCustomerWithInvalidData()
    {
        $invalidData = [
            'Email' => 'zxc',
        ];

        $response = $this->postJson('/api/customers', $invalidData);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['Email']);
    }

    public function testUpdateCustomerWithInvalidData()
    {
        $customer = Customer::factory()->create(['Firstname' => 'John Doe']);
        $invalidData = [
            'Email' => 'zxcawewe', // Invalid name
        ];

        $response = $this->putJson('/api/customers/' . $customer->id, $invalidData);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['Email']);
    }

    public function testRetrieveNonExistentCustomer()
    {
        $nonExistentCustomerId = '9999';

        $response = $this->getJson('/api/customers/' . $nonExistentCustomerId);

        $response->assertStatus(404);
    }

}
