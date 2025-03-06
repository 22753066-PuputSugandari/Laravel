@extends('backend.app')

@section('content')

<div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Tables</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Tables</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Basic Tables</a>
                </li>
              </ul>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Hoverable Table</div>
                  </div>
                  <div class="card-body">
                    <table class="table table-head-bg-info table-hover">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                    </tr>
                </thead>
            
                      @foreach ($users as $user)
                <tr>
                        <td>{{ $user->id}}
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
            @endforeach
                    </table>
                  </div>
                </div>
            <table>
               
        </table>
</div>
</div>
</div>
        @endsection