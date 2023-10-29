<?php

namespace Domains\Customer\Database\Seeders;

use Domains\Customer\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Customer::factory()->count(100)->create();
    }
}
