@extends('backend.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <div class="row">
        <!-- Users Card -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-2x"></i>
                    <h5 class="card-title">Users</h5>
                    <h3>{{ $users->total() }}</h3>
                </div>
            </div>
        </div>

        <!-- Students Card -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body text-center">
                    <i class="fas fa-user-graduate fa-2x"></i>
                    <h5 class="card-title">Students</h5>
                    <h3>{{ $students->total() }}</h3>
                </div>
            </div>
        </div>

        <!-- Teachers Card -->
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-body text-center">
                    <i class="fas fa-chalkboard-teacher fa-2x"></i>
                    <h5 class="card-title">Teachers</h5>
                    <h3>{{ $teachers->total() }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
