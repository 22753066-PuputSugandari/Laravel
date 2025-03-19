@extends('backend.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('user') }}" class="text-decoration-none">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body text-center">
                        <i class="fas fa-users fa-2x"></i>
                        <h5 class="card-title">Users</h5>
                        <h3>{{ $users->total() }}</h3>
                    </div>
                </div>
            </a>
        </div>
        <!-- Students Card -->
        <div class="col-md-3">
            <a href="{{ route('student') }}" class="text-decoration-none">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body text-center">
                        <i class="fas fa-user-graduate fa-2x"></i>
                        <h5 class="card-title">Students</h5>
                        <h3>{{ $students->total() }}</h3>
                    </div>
                </div>
            </a>
        </div>

        <!-- Teachers Card -->
        <div class="col-md-3">
            <a href="{{ route('techer') }}" class="text-decoration-none">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body text-center">
                        <i class="fas fa-chalkboard-teacher fa-2x"></i>
                        <h5 class="card-title">Teachers</h5>
                        <h3>{{ $teachers->total() }}</h3>
                    </div>
                </div>
            </a>
        </div>
        <!-- Mapel Card -->
        <div class="col-md-3">
            <a href="{{ route('mapel') }}" class="text-decoration-none">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body text-center">
                        <i class="fas fa-book fa-2x"></i>
                        <h5 class="card-title">Mapel</h5>
                        <h3>{{ $mapels->total() }}</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Row untuk Chart -->
    <div class="row">
        <!-- Chart 1: Distribusi Nilai -->
        <div class="col-md-6">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Distribusi Nilai Siswa</div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="studentGradesChart" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>

        <!-- Chart 2: Pie Chart Distribusi Data -->
        <div class="col-md-6">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Distribusi Data</div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="dataPieChart" style="height: 300px;"></canvas>
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
                    'rgba(54, 162, 235, 0.6)',  // Biru
                    'rgba(75, 192, 192, 0.6)',  // Hijau
                    'rgba(255, 206, 86, 0.6)',  // Kuning
                    'rgba(255, 99, 132, 0.6)'   // Merah
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
            labels: {!! json_encode($nilaiLabels) !!}, // Kategori A, B, C, D, E
            datasets: [{
                label: 'Frekuensi Nilai',
                data: {!! json_encode($nilaiFrequencies) !!}, 
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',  
                    'rgba(75, 192, 192, 0.6)',  
                    'rgba(255, 206, 86, 0.6)',  
                    'rgba(255, 159, 64, 0.6)',  
                    'rgba(255, 99, 132, 0.6)'   
                ],
                borderColor: 'rgba(0, 0, 0, 0.8)',
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
