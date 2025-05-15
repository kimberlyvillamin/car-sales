<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            ['name' => 'Alice Johnson', 'email' => 'alice@example.com', 'phone' => '123-456-7890'],
            ['name' => 'Bob Smith', 'email' => 'bob@example.com', 'phone' => '234-567-8901'],
            ['name' => 'Carol Davis', 'email' => 'carol@example.com', 'phone' => '345-678-9012'],
            ['name' => 'David Wilson', 'email' => 'david@example.com', 'phone' => '456-789-0123'],
            ['name' => 'Eva Brown', 'email' => 'eva@example.com', 'phone' => '567-890-1234'],
            ['name' => 'Frank Garcia', 'email' => 'frank@example.com', 'phone' => '678-901-2345'],
        ];

        foreach ($customers as $customer) {
            Customer::updateOrInsert(
                ['email' => $customer['email']], // match by unique email
                $customer // insert or update with these values
            );
        }
    }
}
