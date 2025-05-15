<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Salesperson;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SaleSeeder extends Seeder
{
    public function run(): void
    {
        $entries = [
            ['date' => '2024-01-10', 'car_model' => 'Camry', 'customer_name' => 'Alice Johnson', 'salesperson_name' => 'Mike Thompson', 'sale_price' => 23500],
            ['date' => '2024-02-15', 'car_model' => 'Civic', 'customer_name' => 'Bob Smith', 'salesperson_name' => 'Sarah Lee', 'sale_price' => 21500],
            ['date' => '2024-03-20', 'car_model' => 'Focus', 'customer_name' => 'Carol Davis', 'salesperson_name' => 'Mike Thompson', 'sale_price' => 17500],
            ['date' => '2024-04-05', 'car_model' => 'Malibu', 'customer_name' => 'David Wilson', 'salesperson_name' => 'Sarah Lee', 'sale_price' => 25500],
            ['date' => '2024-05-12', 'car_model' => 'Altima', 'customer_name' => 'Eva Brown', 'salesperson_name' => 'Mike Thompson', 'sale_price' => 24500],
            ['date' => '2024-06-01', 'car_model' => 'Camry', 'customer_name' => 'Bob Smith', 'salesperson_name' => 'Sarah Lee', 'sale_price' => 24000],
            ['date' => '2024-06-15', 'car_model' => 'Civic', 'customer_name' => 'Carol Davis', 'salesperson_name' => 'Mike Thompson', 'sale_price' => 22000],
            ['date' => '2024-07-03', 'car_model' => 'Focus', 'customer_name' => 'David Wilson', 'salesperson_name' => 'Sarah Lee', 'sale_price' => 18000],
            ['date' => '2024-08-22', 'car_model' => 'Malibu', 'customer_name' => 'Eva Brown', 'salesperson_name' => 'Mike Thompson', 'sale_price' => 26000],
            ['date' => '2024-09-09', 'car_model' => 'Altima', 'customer_name' => 'Frank Garcia', 'salesperson_name' => 'Sarah Lee', 'sale_price' => 25000],
        ];

        // Car make, year, and price mapping
        $carDetails = [
            'Camry' => ['make' => 'Toyota', 'year' => 2022, 'price' => 24000],
            'Civic' => ['make' => 'Honda', 'year' => 2023, 'price' => 22000],
            'Focus' => ['make' => 'Ford', 'year' => 2021, 'price' => 18000],
            'Malibu' => ['make' => 'Chevrolet', 'year' => 2022, 'price' => 25000],
            'Altima' => ['make' => 'Nissan', 'year' => 2023, 'price' => 23000],
        ];

        foreach ($entries as $entry) {
            $carModel = $entry['car_model'];
            $details = $carDetails[$carModel] ?? ['make' => 'Unknown', 'year' => 2020, 'price' => 20000];

            $car = Car::firstOrCreate(
                ['model' => $carModel],
                [
                    'make' => $details['make'],
                    'year' => $details['year'],
                    'price' => $details['price'],
                ]
            );

            $customer = Customer::firstOrCreate(
                ['name' => $entry['customer_name']],
                [
                    'email' => strtolower(str_replace(' ', '', $entry['customer_name'])) . '@example.com',
                    'phone' => '000-000-0000'
                ]
            );

            $salesperson = Salesperson::firstOrCreate(['name' => $entry['salesperson_name']]);

            Sale::create([
                'car_id' => $car->id,
                'customer_id' => $customer->id,
                'salesperson_id' => $salesperson->id,
                'sale_date' => $entry['date'],
                'sale_price' => $entry['sale_price'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
