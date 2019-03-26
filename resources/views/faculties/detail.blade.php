@extends('adminlte::page')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Faculty Details </h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <strong>Faculty Name: </strong> {{$faculty->name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Level: </strong> {{$faculty->level}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Description: </strong> {{$faculty->description}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('faculties.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection