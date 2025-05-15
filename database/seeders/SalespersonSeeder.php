<?php

namespace Database\Seeders;

use App\Models\Salesperson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalespersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Salesperson::insert([
    ['name' => 'Mike Thompson'],
    ['name' => 'Sarah Lee'],
]);

    }
}
