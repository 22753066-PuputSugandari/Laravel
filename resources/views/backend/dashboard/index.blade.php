@extends('backend.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <div class="row">
        <!-- Users Card -->
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
        <!-- //mapel -->
        <div class="col-md-3">
            <a href="{{ route('mapel') }}" class="text-decoration-none">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body text-center">
                        <i class="fas fa-book fa-2x"></i>
                        <h5 class="card-title">Mapel</h5>
                        <h3>{{ $mapels->total() }}</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection