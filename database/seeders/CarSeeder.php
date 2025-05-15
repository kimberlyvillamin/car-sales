<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::insert([
            ['model' => 'Camry', 'make' => 'Toyota', 'year' => 2022, 'price' => 24000],
            ['model' => 'Civic', 'make' => 'Honda', 'year' => 2021, 'price' => 22000],
            ['model' => 'Accord', 'make' => 'Honda', 'year' => 2020, 'price' => 21000],
            ['model' => 'Model S', 'make' => 'Tesla', 'year' => 2023, 'price' => 75000],
            ['model' => 'Mustang', 'make' => 'Ford', 'year' => 2022, 'price' => 26000],
            ['model' => 'Corolla', 'make' => 'Toyota', 'year' => 2021, 'price' => 20000],
            ['model' => 'Altima', 'make' => 'Nissan', 'year' => 2022, 'price' => 23000],
            ['model' => 'Charger', 'make' => 'Dodge', 'year' => 2021, 'price' => 28000],
            ['model' => 'RAV4', 'make' => 'Toyota', 'year' => 2023, 'price' => 27000],
            ['model' => 'CR-V', 'make' => 'Honda', 'year' => 2022, 'price' => 25000],
        ]);
    }
}
