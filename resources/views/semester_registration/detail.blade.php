@extends('adminlte::page')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>Deparment Details </h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <strong>Department Name: </strong> {{$department->department_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Start Year: </strong> {{$department->department_code}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Faculty: </strong> {{$department->faculty->name}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('departments.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection