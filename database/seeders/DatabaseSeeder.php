<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CarSeeder::class,
            CustomerSeeder::class,
            SaleSeeder::class,
            SalespersonSeeder::class,
        ]);
    }
}

