@extends('app')
 
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Capbois</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup ">
      <div class="navbar-nav ms-auto">
        <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
        <a class="nav-link" href="#">Data Tables</a>
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
    <div class="col-md-12 col-md-offset-1">
        <table class="table table-secondary table-responsive table-striped table-hover">
            <thead>
                <th>Fisrtname</th>
                <th>Lastname</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{$member->firstname}}</td>
                        <td>{{$member->lastname}}</td>
                        <td>
                            <span type = "button" href="#edit{{$member->id}}" data-bs-toggle="modal" class = "text-success"><i class='fa fa-edit'></i> </span> 
                            <span type = "button" href="#delete{{$member->id}}" data-bs-toggle="modal" class = "text-danger" ><i class='fa fa-trash red'></i> </span>
                            @include('action')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection