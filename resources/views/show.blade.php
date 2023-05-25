@extends('app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Capbois</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a class="nav-link" href="#">Log out</a>
      </div>
    </div>
  </div>
</nav>

<div class="row">
    <div class="col-md-12 col-md-offset-1">
        <h3>Members Table
            <button type="button" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> </button>
        </h3>
    </div>
</div>

<div class="row">
    <div class="col-md-6 offset-md-6 my-3">
        <form action="{{ route('members.index') }}" method="GET" class="d-flex justify-content-end">
            <input type="text" name="search" class="form-control me-2" placeholder="Search members">
            <button type="submit" class="btn btn-xs btn-primary">Search</button>
            <a href="{{ route('members.index') }}" class="btn btn-sm btn-secondary ms-2">Show All</a>
            <button class="btn btn-success ms-2" onclick="window.print()"><i class="fa fa-print"></i> Print</button> <!-- Print button -->
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-md-offset-1">
        <table class="table table-secondary table-responsive table-striped table-hover">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Gender</th>
                    <th>Birthdate</th> <!-- Added Birthdate column header -->
                    <th>Member Since</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{$member->firstname}}</td>
                        <td>{{$member->lastname}}</td>
                        <td>{{$member->gender}}</td>
                        <td>{{$member->birthdate}}</td> <!-- Added Birthdate column -->
                        <td>{{$member->created_at->format('m-d-Y')}}</td>
                        <td>
                            <span type="button" href="#edit{{$member->id}}" data-bs-toggle="modal" class="text-success"><i class='fa fa-edit'></i> </span> 
                            <span type="button" href="#delete{{$member->id}}" data-bs-toggle="modal" class="text-danger"><i class='fa fa-trash red'></i> </span>
                            @include('action')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
