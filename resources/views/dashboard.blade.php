@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-5 text-center fw-bold display-5">Car Sales Dashboard</h1>

    <!-- Summary Cards -->
    <div class="row mb-5 g-4">
        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center p-5">
                    <div class="mb-3">
                        <i class="bi bi-cash fs-1 text-primary"></i>
                    </div>
                    <h6 class="text-muted">Total Sales</h6>
                    <h2 class="fw-bold text-primary">{{ $totalSales }}</h2>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center p-5">
                    <div class="mb-3">
                        <i class="bi bi-car-front fs-1 text-success"></i>
                    </div>
                    <h6 class="text-muted">Total Cars</h6>
                    <h2 class="fw-bold text-success">{{ $totalCars }}</h2>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center p-5">
                    <div class="mb-3">
                        <i class="bi bi-person-bounding-box fs-1 text-info"></i>
                    </div>
                    <h6 class="text-muted">Total Customers</h6>
                    <h2 class="fw-bold text-info">{{ $totalCustomers }}</h2>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center p-5">
                    <div class="mb-3">
                        <i class="bi bi-person-fill fs-1 text-warning"></i>
                    </div>
                    <h6 class="text-muted">Total Salespersons</h6>
                    <h2 class="fw-bold text-warning">{{ $totalSalespersons }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row g-4">
    <div class="col-lg-6">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-light text-center fw-bold fs-5 py-3">
            Total Stock by Car Make
        </div>
        <div class="card-body">
            <canvas id="stockPerCarMakeChart" height="200"></canvas>
        </div>
    </div>
</div>

        <div class="col-lg-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-light text-center fw-bold fs-5 py-3">
                    Sales Revenue Trend
                </div>
                <div class="card-body">
                    <canvas id="salesPerMonthChart" height="200"></canvas> <!-- Larger chart -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"/>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Total Stock by Car Make (Bar Chart)
    new Chart(document.getElementById('stockPerCarMakeChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($stocksPerCarMake->keys()) !!},
            datasets: [{
                label: 'Total Stock',
                data: {!! json_encode($stocksPerCarMake->values()) !!},
                backgroundColor: '#4caf50',
                borderRadius: 8,
                fill: true,
                tension: 0.4,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

// Sales Revenue Trend (Line Chart)
new Chart(document.getElementById('salesPerMonthChart'), {
    type: 'line',
    data: {
        labels: {!! json_encode($salesPerMonth->pluck('month')) !!},
        datasets: [{
            label: 'Total Sales',
            data: {!! json_encode($salesPerMonth->pluck('total_sales')) !!},
            backgroundColor: 'rgba(0, 123, 255, 0.2)',  // Light blue
            borderColor: 'rgba(0, 123, 255, 1)',        // Blue
            pointBackgroundColor: 'rgba(0, 123, 255, 1)',
            fill: true,
            tension: 0.4,
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' }
        },
        scales: {
            x: {
                ticks: {
                    autoSkip: true,
                    maxRotation: 45,
                    minRotation: 45,
                }
            },
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endsection
