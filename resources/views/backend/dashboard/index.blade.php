@extends('backend.app')

@section('content')
<div class="container">
    <h1 class="my-3" style="font-size: 2rem; font-weight: 600; color: #333;">Dashboard</h1>

    <div class="row mb-3">
        <!-- Users Card -->
        <div class="col-md-3 mb-3">
            <a href="{{ route('user') }}" class="text-decoration-none">
                <div class="card shadow-sm text-dark bg-light rounded border-0" style="height: 150px;">
                    <div class="card-body text-center py-3">
                        <i class="fas fa-users fa-2x" style="color: #4682B4;"></i>
                        <h5 class="card-title mt-2" style="font-size: 1rem;">Users</h5>
                        <h3 style="font-size: 1.5rem;">{{ $users->total() }}</h3>
                    </div>
                </div>
            </a>
        </div>

        <!-- Students Card -->
        <div class="col-md-3 mb-3">
            <a href="{{ route('student') }}" class="text-decoration-none">
                <div class="card shadow-sm text-dark bg-light rounded border-0" style="height: 150px;">
                    <div class="card-body text-center py-3">
                        <i class="fas fa-user-graduate fa-2x" style="color: #4CAF50;"></i>
                        <h5 class="card-title mt-2" style="font-size: 1rem;">Students</h5>
                        <h3 style="font-size: 1.5rem;">{{ $students->total() }}</h3>
                    </div>
                </div>
            </a>
        </div>

        <!-- Teachers Card -->
        <div class="col-md-3 mb-3">
            <a href="{{ route('techer') }}" class="text-decoration-none">
                <div class="card shadow-sm text-dark bg-light rounded border-0" style="height: 150px;">
                    <div class="card-body text-center py-3">
                        <i class="fas fa-chalkboard-teacher fa-2x" style="color: #17A2B8;"></i>
                        <h5 class="card-title mt-2" style="font-size: 1rem;">Teachers</h5>
                        <h3 style="font-size: 1.5rem;">{{ $teachers->total() }}</h3>
                    </div>
                </div>
            </a>
        </div>

        <!-- Mapel Card -->
        <div class="col-md-3 mb-3">
            <a href="{{ route('mapel') }}" class="text-decoration-none">
                <div class="card shadow-sm text-dark bg-light rounded border-0" style="height: 150px;">
                    <div class="card-body text-center py-3">
                        <i class="fas fa-book fa-2x" style="color: #FFC107;"></i>
                        <h5 class="card-title mt-2" style="font-size: 1rem;">Mapel</h5>
                        <h3 style="font-size: 1.5rem;">{{ $mapels->total() }}</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Chart 1: Distribusi Nilai -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm rounded border-0">
                <div class="card-header bg-light" style="font-size: 1.1rem; font-weight: 600;">
                    Distribusi Nilai Siswa
                </div>
                <div class="card-body p-3">
                    <canvas id="studentGradesChart" style="height: 250px;"></canvas>
                </div>
            </div>
        </div>

        <!-- Chart 2: Pie Chart Distribusi Data -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm rounded border-0">
                <div class="card-header bg-light" style="font-size: 1.1rem; font-weight: 600;">
                    Distribusi Data
                </div>
                <div class="card-body p-3">
                    <canvas id="dataPieChart" style="height: 250px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Script untuk Pie Chart -->
<script>
    var ctxPie = document.getElementById('dataPieChart').getContext('2d');
    var dataPieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: {!! json_encode($pieLabels) !!},
            datasets: [{
                data: {!! json_encode($pieData) !!},
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',  // Blue
                    'rgba(75, 192, 192, 0.6)',  // Green
                    'rgba(255, 206, 86, 0.6)',  // Yellow
                    'rgba(255, 99, 132, 0.6)'   // Red
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        font: {
                            family: 'Arial, sans-serif',
                            size: 12
                        }
                    }
                }
            }
        }
    });
</script>

<!-- Script untuk Bar Chart -->
<script>
    var ctx = document.getElementById('studentGradesChart').getContext('2d');
    var studentGradesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($nilaiLabels) !!},
            datasets: [{
                label: 'Frekuensi Nilai',
                data: {!! json_encode($nilaiFrequencies) !!},
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',  // Blue
                    'rgba(75, 192, 192, 0.6)',  // Green
                    'rgba(255, 206, 86, 0.6)',  // Yellow
                    'rgba(255, 159, 64, 0.6)',  // Orange
                    'rgba(255, 99, 132, 0.6)'   // Red
                ],
                borderColor: 'rgba(0, 0, 0, 0.6)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        precision: 0
                    },
                    title: {
                        display: true,
                        text: 'Frekuensi'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Kategori Nilai'
                    }
                }
            }
        }
    });
</script>

@endsection
