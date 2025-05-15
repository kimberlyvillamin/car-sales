<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Salesperson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // --- Cards Data ---

        // Total number of sales
        $totalSales = Sale::count();

        // Total number of unique cars
        $totalCars = Car::count();

        // Total number of customers
        $totalCustomers = Customer::count();

        // Total number of salespersons
        $totalSalespersons = Salesperson::count();

        // --- Charts Data ---

        // Total stock per car make (bar chart)
        $stocksPerCarMake = Car::select('make', DB::raw('count(*) as stock_count'))
            ->groupBy('make')
            ->pluck('stock_count', 'make');

        // Sales revenue trend by month (line chart)
        $salesPerMonth = Sale::select(
                DB::raw("DATE_FORMAT(sale_date, '%Y-%m') as month"),
                DB::raw('SUM(sale_price) as total_sales')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('dashboard', compact(
            'totalSales',
            'totalCars',
            'totalCustomers',
            'totalSalespersons',
            'stocksPerCarMake',
            'salesPerMonth'
        ));
    }
}
