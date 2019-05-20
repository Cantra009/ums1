@extends('adminlte::page')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Instructor Details </h3>
        <hr>
      </div>
    </div>
    <div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Personal Details</h3>
            </div>
            <!-- /.box-header -->
             
            <!-- form start -->
          <div class="box-body">
            <table class="table table-striped">
            <tr><th>Student Full Name: </th><td> {{$instructor->full_name}}</td></tr>
            <tr><th>Email: </th><td> {{$instructor->email}}</td></tr>
            <tr><th>gender: </th><td> {{$instructor->gender}}</td></tr>
            <tr><th>Qualification: </th><td> {{$instructor->qualification}}</td></tr>
            <tr><th>Title: </th><td> {{$instructor->title}}</td></tr>
            <tr><th>Phone: </th><td> {{$instructor->phone}}</td></tr>
            <tr><th>Type: </th><td> {{$instructor->type}}</td></tr>
            <tr><th>Department: </th><td> {{$instructor->department->department_code}}</td></tr>
            </table>

          </div>
          <!-- /.box -->
          </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('instructors.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection