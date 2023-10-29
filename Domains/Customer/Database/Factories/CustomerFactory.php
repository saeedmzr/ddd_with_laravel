<?php

namespace Domains\Customer\Database\Factories;

use Domains\Customer\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        $phoneNumber = $this->faker->unique()->phoneNumber();
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber); // Remove non-numeric characters
        $phoneNumberInt = (int) $phoneNumber;

        return [

            'Firstname' => $this->faker->name(),
            'Lastname' => $this->faker->lastName(),
            'DateOfBirth' => $this->faker->dateTimeBetween($startDate = '-20 years', $endDate = '-20 years', $timezone = null)->format('Y-m-d'),
            'PhoneNumber' => $phoneNumberInt,
            'Email' => $this->faker->unique()->safeEmail(),
            'BankAccountNumber' => $this->faker->numerify('####-####-####-####'),
        ];
    }

}
